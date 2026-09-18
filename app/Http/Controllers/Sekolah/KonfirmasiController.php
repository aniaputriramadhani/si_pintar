<?php

namespace App\Http\Controllers\Sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KonfirmasiController extends Controller
{
    /**
     * Menampilkan halaman Konfirmasi Progres / Status Rekening Sekolah
     */
    public function index(Request $request)
    {
        // Data master konfirmasi progres siswa
        $konfirmasiData = [
            [
                'no' => 1,
                'nama' => 'Vina Handoko',
                'nisn' => '4248494698',
                'kelas' => '4',
                'statusRekening' => 'Belum Aktif',
                'konfirmasiProgres' => 'Proses di Bank',
                'keterangan' => 'Menunggu Bank',
                'tanggalKonfirmasi' => '2026-02-10',
            ],
            [
                'no' => 2,
                'nama' => 'Indra Hidayat',
                'nisn' => '3192574052',
                'kelas' => '3',
                'statusRekening' => 'Rekening Tersedia',
                'konfirmasiProgres' => 'Tidak Dapat Aktivasi',
                'keterangan' => 'Data Identitas',
                'tanggalKonfirmasi' => '2026-02-11',
            ],
            [
                'no' => 3,
                'nama' => 'Rina Ramadhan',
                'nisn' => '7675154520',
                'kelas' => '3',
                'statusRekening' => 'Rekening Tersedia',
                'konfirmasiProgres' => 'Sudah Aktivasi',
                'keterangan' => 'Selesai',
                'tanggalKonfirmasi' => '2026-02-12',
            ],
            [
                'no' => 4,
                'nama' => 'Salsabila Simanjuntak',
                'nisn' => '7525920516',
                'kelas' => '6',
                'statusRekening' => 'Dalam Proses',
                'konfirmasiProgres' => 'Sudah Aktivasi',
                'keterangan' => 'Selesai',
                'tanggalKonfirmasi' => '2026-02-14',
            ],
        ];

        return view('sekolah.konfirmasi', compact('konfirmasiData'));
    }
}