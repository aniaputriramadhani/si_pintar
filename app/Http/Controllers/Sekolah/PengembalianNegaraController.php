<?php

namespace App\Http\Controllers\Sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengembalianNegaraController extends Controller
{
    /**
     * Menampilkan halaman pengembalian negara beserta filter data dummy
     */
    public function index(Request $request)
    {
        // Ambil filter dari request (default: Semua)
        $tahunSelected = $request->input('tahun', 'Semua');
        $tahapSelected = $request->input('tahap', 'Semua');

        // Data dummy 20 siswa (sesuai script di blade)
        $rawData = [
            ['id' => 1, 'nama' => 'Umi Firmansyah', 'nisn' => '4832016446', 'tahap' => 4, 'nominal' => 1000000, 'tahun' => 2026, 'alasan' => 'Siswa sudah lulus sebelum pencairan'],
            ['id' => 2, 'nama' => 'Zahra Lestari', 'nisn' => '8373509830', 'tahap' => 1, 'nominal' => 750000, 'tahun' => 2024, 'alasan' => 'Siswa sudah lulus sebelum pencairan'],
            ['id' => 3, 'nama' => 'Budi Rahayu', 'nisn' => '6399513933', 'tahap' => 5, 'nominal' => 450000, 'tahun' => 2026, 'alasan' => 'Data ganda penerima'],
            ['id' => 4, 'nama' => 'Hana Santoso', 'nisn' => '3459018519', 'tahap' => 1, 'nominal' => 1000000, 'tahun' => 2024, 'alasan' => 'Siswa mengundurkan diri'],
            ['id' => 5, 'nama' => 'Umi Gunawan', 'nisn' => '7330810207', 'tahap' => 4, 'nominal' => 450000, 'tahun' => 2025, 'alasan' => 'Siswa sudah lulus sebelum pencairan'],
            ['id' => 6, 'nama' => 'Fitri Rahayu', 'nisn' => '6592830781', 'tahap' => 5, 'nominal' => 1000000, 'tahun' => 2026, 'alasan' => 'Data ganda penerima'],
            ['id' => 7, 'nama' => 'Joko Santoso', 'nisn' => '2973322162', 'tahap' => 2, 'nominal' => 750000, 'tahun' => 2025, 'alasan' => 'Data ganda penerima'],
            ['id' => 8, 'nama' => 'Galih Siregar', 'nisn' => '7353348998', 'tahap' => 5, 'nominal' => 750000, 'tahun' => 2025, 'alasan' => 'Siswa mengundurkan diri'],
            ['id' => 9, 'nama' => 'Indra Saputra', 'nisn' => '9774323729', 'tahap' => 2, 'nominal' => 1000000, 'tahun' => 2024, 'alasan' => 'Siswa mengundurkan diri'],
            ['id' => 10, 'nama' => 'Hana Siregar', 'nisn' => '6321229280', 'tahap' => 5, 'nominal' => 450000, 'tahun' => 2024, 'alasan' => 'Siswa sudah lulus sebelum pencairan'],
            ['id' => 11, 'nama' => 'Oki Firmansyah', 'nisn' => '1653426173', 'tahap' => 4, 'nominal' => 750000, 'tahun' => 2026, 'alasan' => 'Siswa sudah lulus sebelum pencairan'],
            ['id' => 12, 'nama' => 'Fajar Maharani', 'nisn' => '1956585300', 'tahap' => 1, 'nominal' => 1000000, 'tahun' => 2024, 'alasan' => 'Data ganda penerima'],
            ['id' => 13, 'nama' => 'Eka Firmansyah', 'nisn' => '3698736639', 'tahap' => 1, 'nominal' => 750000, 'tahun' => 2024, 'alasan' => 'Siswa pindah sekolah'],
            ['id' => 14, 'nama' => 'Dedi Susanto', 'nisn' => '8266338939', 'tahap' => 5, 'nominal' => 1000000, 'tahun' => 2026, 'alasan' => 'Siswa mengundurkan diri'],
            ['id' => 15, 'nama' => 'Umi Anggraini', 'nisn' => '1614656030', 'tahap' => 4, 'nominal' => 1000000, 'tahun' => 2025, 'alasan' => 'Siswa pindah sekolah'],
            ['id' => 16, 'nama' => 'Galih Susanto', 'nisn' => '3077686870', 'tahap' => 3, 'nominal' => 450000, 'tahun' => 2024, 'alasan' => 'Siswa sudah lulus sebelum pencairan'],
            ['id' => 17, 'nama' => 'Dedi Handoko', 'nisn' => '9161993600', 'tahap' => 1, 'nominal' => 1000000, 'tahun' => 2026, 'alasan' => 'Siswa mengundurkan diri'],
            ['id' => 18, 'nama' => 'Hana Maharani', 'nisn' => '1894203478', 'tahap' => 4, 'nominal' => 750000, 'tahun' => 2026, 'alasan' => 'Data ganda penerima'],
            ['id' => 19, 'nama' => 'Fajar Setiawan', 'nisn' => '8673448229', 'tahap' => 3, 'nominal' => 450000, 'tahun' => 2026, 'alasan' => 'Siswa pindah sekolah'],
            ['id' => 20, 'nama' => 'Made Maharani', 'nisn' => '2579776714', 'tahap' => 4, 'nominal' => 1000000, 'tahun' => 2024, 'alasan' => 'Siswa pindah sekolah'],
        ];

        // Filter array data jika ada filter aktif
        $siswaList = array_filter($rawData, function ($item) use ($tahunSelected, $tahapSelected) {
            $matchTahun = ($tahunSelected === 'Semua') || ($item['tahun'] == $tahunSelected);
            $matchTahap = ($tahapSelected === 'Semua') || ($item['tahap'] == $tahapSelected);
            return $matchTahun && $matchTahap;
        });

        // Opsi alasan pengembalian
        $opsiAlasan = [
            'Siswa sudah lulus sebelum pencairan',
            'Data ganda penerima',
            'Siswa mengundurkan diri',
            'Siswa pindah sekolah',
        ];

        // Ganti 'pengembaliannegara' dengan nama file blade kamu (misal: 'sekolah.pengembaliannegara')
        return view('sekolah.pengembaliannegara', compact('siswaList', 'tahunSelected', 'tahapSelected', 'opsiAlasan'));
    }

    /**
     * Simpan pengembalian (Dummy response)
     */
    public function store(Request $request)
    {
        return redirect()->back()->with('success', 'Data pengembalian negara berhasil disimpan!');
    }

    /**
     * Unduh format (Dummy response)
     */
    public function downloadFormat()
    {
        return redirect()->back()->with('info', 'Format berhasil diunduh.');
    }
}