<?php

namespace App\Http\Controllers\Sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CetakSuratController extends Controller
{
    /**
     * Menampilkan halaman Cetak Surat / Detail SK Pemberian
     */
    public function index(Request $request)
    {
        // 1. Data Informasi Sekolah
        $sekolah = [
            'nama'   => 'SDN 1 Bahagia Selatan',
            'npsn'   => '63948836',
            'status' => 'Terverifikasi'
        ];

        // 2. Data Siswa Penerima
        $siswa = [
            'nama'    => 'Andi Pratama',
            'nisn'    => '0087123456',
            'kelas'   => '6',
            'sekolah' => 'SDN 1 Bahagia Selatan'
        ];

        // 3. Data Detail SK Pemberian
        $sk = [
            'nomor_sk'          => 'SK Pemberian Tahap 43',
            'tahap'             => 43,
            'tahun'             => '2026',
            'nominal'           => 450000,
            'formatted_nominal' => 'Rp 450.000',
            'status_rekening'   => 'Sudah Aktivasi',
            'status_penyaluran' => 'Dana telah disalurkan',
            'status_sk'         => 'Aktif'
        ];

        // 4. Linimasa Proses SK
        $linimasa = [
            [
                'tanggal' => '10 Juli 2026',
                'judul'   => 'SK Pemberian diterbitkan'
            ],
            [
                'tanggal' => '12 Juli 2026',
                'judul'   => 'Rekening berhasil diaktivasi'
            ],
            [
                'tanggal' => '15 Juli 2026',
                'judul'   => 'Dana disalurkan ke rekening siswa'
            ]
        ];

        // 5. Return View cetaksurat.blade.php
        return view('sekolah.cetaksurat', compact('sekolah', 'siswa', 'sk', 'linimasa'));
    }

    /**
     * Handle Download SK File
     */
    public function download(Request $request, $nisn)
    {
        return response()->json([
            'status'  => 'success',
            'message' => 'SK Pemberian berhasil diunduh'
        ]);
    }
}