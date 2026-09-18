<?php

namespace App\Http\Controllers\Dinas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Menampilkan halaman status dan riwayat unduhan
     */
    public function index(Request $request)
    {
        // Data Master Unduhan (Dapat diganti dengan query Model/DB seperti: Unduhan::query())
        $masterUnduhanData = collect([
            [
                'no' => 1,
                'namaFile' => 'Rekap_Aktivasi_SD_2026.xlsx',
                'filter' => 'Jenjang SD',
                'jenisAkun' => 'Dinas',
                'dibuat' => '2026-05-23 11:01',
                'status' => 'Proses',
            ],
            [
                'no' => 2,
                'namaFile' => 'Data_SK_Pemberian_SD_2026.xlsx',
                'filter' => 'Jenjang SD',
                'jenisAkun' => 'Dinas',
                'dibuat' => '2026-01-16 11:57',
                'status' => 'Free',
            ],
            [
                'no' => 3,
                'namaFile' => 'Rekap_Nasional_2026.xlsx',
                'filter' => 'Semua Jenjang',
                'jenisAkun' => 'Sekolah',
                'dibuat' => '2026-01-26 08:10',
                'status' => 'Free',
            ],
            [
                'no' => 4,
                'namaFile' => 'Data_SK_Pembatalan_2026.xlsx',
                'filter' => 'Semua Kecamatan',
                'jenisAkun' => 'Admin',
                'dibuat' => '2026-06-25 17:49',
                'status' => 'Free',
            ],
            [
                'no' => 5,
                'namaFile' => 'Rekap_Dinamis_Kab_Banggai_Laut.xlsx',
                'filter' => 'Jenjang SD',
                'jenisAkun' => 'Admin',
                'dibuat' => '2026-02-26 15:53',
                'status' => 'Proses',
            ],
            [
                'no' => 6,
                'namaFile' => 'Data_SK_Pemberian_SMP_2026.xlsx',
                'filter' => 'Semua Kecamatan',
                'jenisAkun' => 'Sekolah',
                'dibuat' => '2026-06-29 09:01',
                'status' => 'Proses',
            ],
        ]);

        // Filter Data berdasarkan input request
        $filteredData = $masterUnduhanData->filter(function ($item) use ($request) {
            $matchStatus = !$request->filled('status') || $request->status === 'Semua' || $item['status'] === $request->status;
            $matchJenis  = !$request->filled('jenis_akun') || $request->jenis_akun === 'Semua' || $item['jenisAkun'] === $request->jenis_akun;
            $matchScope  = !$request->filled('scope') || $request->scope === 'Semua' || $item['filter'] === $request->scope;
            $matchSearch = !$request->filled('search') || str_contains(strtolower($item['namaFile']), strtolower($request->search));

            return $matchStatus && $matchJenis && $matchScope && $matchSearch;
        });

        // Data proses unduhan aktif (Widget Progress Bar atas)
        $activeDownload = [
            'nama_file' => 'Data_SK_Pemberian_SD_Kabupaten_2026.xlsx',
            'progress'  => 72,
            'total_rows' => '8.420'
        ];

        return view('dinas.status', [
            'unduhanData' => $filteredData->values(),
            'activeDownload' => $activeDownload
        ]);
    }

    /**
     * Download file riwayat
     */
    public function download($fileName)
    {
        // Logika download file sesungguhnya dari storage
        // return response()->download(storage_path("app/public/exports/{$fileName}"));

        return back()->with('success', "Mengunduh berkas: {$fileName}");
    }
}