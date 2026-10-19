<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use RuntimeException;
use ZipArchive;

class DataPipSeeder extends Seeder
{
    /** Import ADM_Data_PIP from storage/app/imports/data-pip.xlsx. */
    public function run(): void
    {
        $path = storage_path('app/imports/data-pip.xlsx');

        if (! is_file($path)) {
            throw new RuntimeException("File sumber tidak ditemukan: {$path}");
        }

        $zip = new ZipArchive;
        if ($zip->open($path) !== true) {
            throw new RuntimeException('File sumber bukan workbook Excel yang valid.');
        }

        $sharedStrings = $this->sharedStrings($zip->getFromName('xl/sharedStrings.xml'));
        $sheet = simplexml_load_string($zip->getFromName('xl/worksheets/sheet4.xml'));
        $bulanPerSk = $this->bulanPerSk($zip->getFromName('xl/worksheets/sheet7.xml'), $sharedStrings);

        if ($sheet === false) {
            throw new RuntimeException('Sheet ADM_Data_PIP tidak dapat dibaca.');
        }

        $rows = [];
        $headers = [];

        $sheet->registerXPathNamespace('x', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');

        foreach ($sheet->xpath('//x:sheetData/x:row') as $index => $row) {
            $values = [];
            $row->registerXPathNamespace('x', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');
            foreach ($row->xpath('./x:c') as $cell) {
                $column = preg_replace('/\d+/', '', (string) $cell['r']);
                $values[$column] = $this->cellValue($cell, $sharedStrings);
            }

            if ($index === 0) {
                $headers = array_flip($values);
                continue;
            }

            $record = [
                'tahun' => $this->value($values, $headers, 'Tahun'),
                'bulan' => $bulanPerSk[$this->key($this->value($values, $headers, 'Tahun'), $this->value($values, $headers, 'NPSN'), $this->value($values, $headers, 'Nomor SK'))] ?? null,
                'nisn' => $this->value($values, $headers, 'NISN'),
                'nama_siswa' => $this->value($values, $headers, 'Nama Siswa'),
                'nama_sekolah' => $this->value($values, $headers, 'Nama Sekolah'),
                'npsn' => $this->value($values, $headers, 'NPSN'),
                'jenjang' => $this->value($values, $headers, 'Jenjang'),
                'provinsi' => $this->value($values, $headers, 'Provinsi'),
                'kabupaten' => $this->value($values, $headers, 'Kabupaten/Kota'),
                'kecamatan' => $this->value($values, $headers, 'Kecamatan'),
                'no_sk' => $this->value($values, $headers, 'Nomor SK'),
                'status_sk' => $this->value($values, $headers, 'Kategori SK'),
                'nominal_dana' => (float) $this->value($values, $headers, 'Nominal Bantuan'),
                'status_aktivasi' => $this->value($values, $headers, 'Status Aktivasi'),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if ($record['nisn'] !== '' && $record['tahun'] !== '') {
                $rows[] = $record;
            }
        }

        // Jangan gunakan TRUNCATE di dalam transaksi MySQL karena perintah itu
        // melakukan implicit commit.
        DB::table('data_pip')->delete();
        foreach (array_chunk($rows, 500) as $chunk) {
            DB::table('data_pip')->insert($chunk);
        }

        $zip->close();
    }

    private function sharedStrings(string|false $xml): array
    {
        $document = simplexml_load_string($xml ?: '<sst/>');

        $document->registerXPathNamespace('x', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');

        return array_map(
            fn ($item) => html_entity_decode(strip_tags($item->asXML()), ENT_QUOTES | ENT_XML1),
            $document->xpath('//x:si')
        );
    }

    private function cellValue(\SimpleXMLElement $cell, array $sharedStrings): string
    {
        $namespaces = $cell->getNamespaces(true);
        $value = (string) $cell->children($namespaces[''])->v;

        return (string) $cell['t'] === 's' ? ($sharedStrings[(int) $value] ?? '') : $value;
    }

    private function value(array $values, array $headers, string $header): string
    {
        return trim((string) ($values[$headers[$header] ?? ''] ?? ''));
    }

    /** Ambil bulan dari ADM_Rekap_Dinamis dengan kunci tahun, NPSN, dan nomor SK. */
    private function bulanPerSk(string|false $xml, array $sharedStrings): array
    {
        $sheet = simplexml_load_string($xml ?: '<worksheet/>');
        $sheet->registerXPathNamespace('x', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');
        $bulanPerSk = [];

        foreach ($sheet->xpath('//x:sheetData/x:row') as $index => $row) {
            if ($index === 0) {
                continue;
            }

            $row->registerXPathNamespace('x', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');
            $values = [];
            foreach ($row->xpath('./x:c') as $cell) {
                $values[preg_replace('/\d+/', '', (string) $cell['r'])] = $this->cellValue($cell, $sharedStrings);
            }

            $bulan = (int) ($values['U'] ?? 0);
            if ($bulan >= 1 && $bulan <= 12) {
                $bulanPerSk[$this->key($values['B'] ?? '', $values['F'] ?? '', $values['K'] ?? '')] = $bulan;
            }
        }

        return $bulanPerSk;
    }

    private function key(string $tahun, string $npsn, string $nomorSk): string
    {
        return trim($tahun).'|'.trim($npsn).'|'.trim($nomorSk);
    }
}
