<?php

namespace App\Http\Controllers\Sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SekolahDokumenController extends Controller
{
    /**
     * Menampilkan halaman Dokumen Sekolah
     */
    public function index(Request $request)
    {
        // 1. Data Informasi Sekolah (Dummy Data / Dummy Session)
        $sekolah = [
            'nama' => 'SDN 1 Bahagia Selatan',
            'npsn' => '63948836',
            'status' => 'Terverifikasi'
        ];

        // 2. Data Informasi Siswa
        $siswa = [
            'nama' => 'Budi Santoso',
            'nisn' => '0102******',
            'status_sk' => 'SK Pemberian Tahap 43'
        ];

        // 3. Data List Dokumen Siswa
        $listDokumen = [
            [
                'dokumen'  => 'Identitas Siswa',
                'status'   => 'Lengkap',
                'catatan'  => '-',
                'aksi'     => 'Lihat',
                'aksiType' => 'view'
            ],
            [
                'dokumen'  => 'Halaman Mutasi Tabungan',
                'status'   => 'Perlu Perbaikan',
                'catatan'  => 'Foto kurang jelas',
                'aksi'     => 'Unggah Ulang',
                'aksiType' => 'reupload'
            ],
            [
                'dokumen'  => 'Bukti Tarik ATM',
                'status'   => 'Belum Ada',
                'catatan'  => 'Jika tersedia',
                'aksi'     => 'Unggah',
                'aksiType' => 'upload'
            ]
        ];

        // 4. Menghitung jumlah dokumen yang perlu perbaikan
        $totalPerluPerbaikan = collect($listDokumen)->where('status', 'Perlu Perbaikan')->count();

        // 5. Kembalikan ke view Blade dengan data yang dibutuhkan
        return view('sekolah.sekolahdokumen', compact('sekolah', 'siswa', 'listDokumen', 'totalPerluPerbaikan'));
    }
}