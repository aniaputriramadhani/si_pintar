<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MonitoringBankController extends Controller
{
    /**
     * Menampilkan halaman Monitoring Bank dan SP2D.
     */
    public function index()
    {
        $stats = [
            'data_restore'  => '18.420',
            'antrean_bri'   => '1.248',
            'sp2d_aktif'    => '36',
            'perlu_periksa' => '17',
        ];

        $monitoringData = [
            [
                'no'        => 1,
                'bank'      => 'BNI',
                'proses'    => 'Validasi SP2D',
                'jumlah'    => '2.199',
                'status'    => 'Berhasil',
                'waktu'     => '2026-01-10 16:32 WIB',
                'tahap_sp2d' => 41,
            ],
            [
                'no'        => 2,
                'bank'      => 'BNI',
                'proses'    => 'Aktivasi Ulang Rekening',
                'jumlah'    => '662',
                'status'    => 'Berhasil',
                'waktu'     => '2026-06-17 11:49 WIB',
                'tahap_sp2d' => 44,
            ],
            [
                'no'        => 3,
                'bank'      => 'BSI',
                'proses'    => 'Unggah Rekening',
                'jumlah'    => '835',
                'status'    => 'Berhasil',
                'waktu'     => '2026-06-21 07:03 WIB',
                'tahap_sp2d' => 45,
            ],
            [
                'no'        => 4,
                'bank'      => 'BNI',
                'proses'    => 'Cek Data Restitusi',
                'jumlah'    => '7.329',
                'status'    => 'Berhasil',
                'waktu'     => '2026-05-25 11:30 WIB',
                'tahap_sp2d' => 45,
            ],
            [
                'no'        => 5,
                'bank'      => 'BNI',
                'proses'    => 'Validasi SP2D',
                'jumlah'    => '202',
                'status'    => 'Gagal',
                'waktu'     => '2026-06-23 08:42 WIB',
                'tahap_sp2d' => 44,
            ],
            [
                'no'        => 6,
                'bank'      => 'BRI',
                'proses'    => 'Daftar SP2D',
                'jumlah'    => '2.297',
                'status'    => 'Berhasil',
                'waktu'     => '2026-01-31 15:46 WIB',
                'tahap_sp2d' => 44,
            ],
            [
                'no'        => 7,
                'bank'      => 'BNI',
                'proses'    => 'Aktivasi Ulang Rekening',
                'jumlah'    => '1.917',
                'status'    => 'Diproses',
                'waktu'     => '2026-05-12 10:38 WIB',
                'tahap_sp2d' => 41,
            ],
            [
                'no'        => 8,
                'bank'      => 'BRI',
                'proses'    => 'Daftar SP2D',
                'jumlah'    => '3.354',
                'status'    => 'Berhasil',
                'waktu'     => '2026-04-19 11:10 WIB',
                'tahap_sp2d' => 40,
            ],
            [
                'no'        => 9,
                'bank'      => 'BSI',
                'proses'    => 'Cek Data Restitusi',
                'jumlah'    => '3.452',
                'status'    => 'Berhasil',
                'waktu'     => '2026-05-08 12:15 WIB',
                'tahap_sp2d' => 40,
            ],
        ];

        return view('admin.monitoringbank', compact('stats', 'monitoringData'));
    }
}