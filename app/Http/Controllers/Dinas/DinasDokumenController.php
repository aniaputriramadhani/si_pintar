<?php

namespace App\Http\Controllers\Dinas;

use App\Http\Controllers\Controller; // IMPORT BASE CONTROLLER
use Illuminate\Http\Request;

class DinasDokumenController extends Controller
{
    /**
     * Menampilkan halaman Dokumen & Pemberitahuan Dinas beserta filter dan daftarnya.
     */
    public function index(Request $request)
    {
        // 1. Data Dummy Dokumen & Pemberitahuan (Sesuai dengan `masterDokumenData` pada Blade)
        $masterDokumenData = collect([
            [
                'no' => 1,
                'tanggal' => '2026-04-02',
                'kategori' => 'Batas Waktu',
                'judul' => 'Penyesuaian mekanisme PIP Tahun 2026',
                'targetAkun' => 'Sekolah',
                'status' => 'Baru',
                'jenis' => 'Pemberitahuan'
            ],
            [
                'no' => 2,
                'tanggal' => '2026-03-26',
                'kategori' => 'Aktivasi',
                'judul' => 'Batas waktu konfirmasi aktivasi rekening',
                'targetAkun' => 'Semua',
                'status' => 'Dibaca',
                'jenis' => 'Pemberitahuan'
            ],
            [
                'no' => 3,
                'tanggal' => '2026-03-31',
                'kategori' => 'Aktivasi',
                'judul' => 'Format verifikasi terbaru',
                'targetAkun' => 'Dinas',
                'status' => 'Baru',
                'jenis' => 'Pemberitahuan'
            ],
            [
                'no' => 4,
                'tanggal' => '2026-01-06',
                'kategori' => 'Batas Waktu',
                'judul' => 'Format pengembalian dana ke negara',
                'targetAkun' => 'Dinas',
                'status' => 'Baru',
                'jenis' => 'SK'
            ],
            [
                'no' => 5,
                'tanggal' => '2026-02-17',
                'kategori' => 'Sistem',
                'judul' => 'Jadwal pemeliharaan sistem SIPINTAR',
                'targetAkun' => 'Admin',
                'status' => 'Dibaca',
                'jenis' => 'Pemberitahuan'
            ],
            [
                'no' => 6,
                'tanggal' => '2026-01-27',
                'kategori' => 'Aktivasi',
                'judul' => 'Pembaruan panduan pengguna',
                'targetAkun' => 'Sekolah',
                'status' => 'Dibaca',
                'jenis' => 'Pemberitahuan'
            ],
            [
                'no' => 7,
                'tanggal' => '2026-04-18',
                'kategori' => 'Batas Waktu',
                'judul' => 'Perpanjangan batas usulan sekolah',
                'targetAkun' => 'Sekolah',
                'status' => 'Dibaca',
                'jenis' => 'SK'
            ],
            [
                'no' => 8,
                'tanggal' => '2026-01-06',
                'kategori' => 'Mekanisme',
                'judul' => 'Sosialisasi fitur pengaduan tiket',
                'targetAkun' => 'Admin',
                'status' => 'Dibaca',
                'jenis' => 'Pemberitahuan'
            ]
        ]);

        // 2. Filter Data Berdasarkan Parameter Request
        $dokumenData = $masterDokumenData->filter(function ($item) use ($request) {
            $matchJenis = !$request->filled('jenis') || $request->jenis === 'Semua' || $item['jenis'] === $request->jenis;
            $matchStatus = !$request->filled('status') || $request->status === 'Semua' || $item['status'] === $request->status;
            $matchKategori = !$request->filled('kategori') || $request->kategori === 'Semua' || $item['kategori'] === $request->kategori;

            $matchSearch = true;
            if ($request->filled('search')) {
                $search = strtolower($request->search);
                $matchSearch = str_contains(strtolower($item['judul']), $search);
            }

            return $matchJenis && $matchStatus && $matchKategori && $matchSearch;
        });

        // Sesuaikan nama path view jika file blade diletakkan di dalam folder lain (contoh: 'dinas.dokumen')
        return view('dinas.dinasdokumen', compact('dokumenData'));
    }
}