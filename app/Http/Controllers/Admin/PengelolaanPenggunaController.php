<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengelolaanPenggunaController extends Controller
{
    /**
     * Menampilkan halaman Pengelolaan Pengguna.
     */
    public function index()
    {
        $stats = [
            'akun_aktif'            => '46',
            'belum_login'           => '16',
            'biodata_belum_lengkap' => '27',
            'surat_tugas_belum_ada' => '23',
        ];

        $users = [
            [
                'no'                  => 1,
                'nama_akun'           => 'Tim Admin 1',
                'jenis_akun'          => 'Admin Pusat',
                'wilayah'             => 'Nasional',
                'status_akun'         => 'Aktif',
                'kelengkapan_biodata' => 'Lengkap',
                'surat_tugas'         => 'Ada',
                'terakhir_login'      => '2026-06-01',
            ],
            [
                'no'                  => 2,
                'nama_akun'           => 'Tim Admin 2',
                'jenis_akun'          => 'Admin Pusat',
                'wilayah'             => 'Nasional',
                'status_akun'         => 'Aktif',
                'kelengkapan_biodata' => 'Lengkap',
                'surat_tugas'         => 'Ada',
                'terakhir_login'      => '2026-07-09',
            ],
            [
                'no'                  => 3,
                'nama_akun'           => 'Tim Admin 3',
                'jenis_akun'          => 'Admin Pusat',
                'wilayah'             => 'Nasional',
                'status_akun'         => 'Aktif',
                'kelengkapan_biodata' => 'Lengkap',
                'surat_tugas'         => 'Ada',
                'terakhir_login'      => '2026-05-29',
            ],
            [
                'no'                  => 4,
                'nama_akun'           => 'Tim Data Dinas Sulawesi Tengah',
                'jenis_akun'          => 'Dinas Provinsi',
                'wilayah'             => 'Sulawesi Tengah',
                'status_akun'         => 'Aktif',
                'kelengkapan_biodata' => 'Belum Lengkap',
                'surat_tugas'         => 'Ada',
                'terakhir_login'      => '2026-04-25',
            ],
            [
                'no'                  => 5,
                'nama_akun'           => 'Tim Data SD - Kab. Banggai Laut',
                'jenis_akun'          => 'Dinas Kabupaten',
                'wilayah'             => 'Kab. Banggai Laut',
                'status_akun'         => 'Aktif',
                'kelengkapan_biodata' => 'Lengkap',
                'surat_tugas'         => 'Ada',
                'terakhir_login'      => '2026-06-23',
            ],
            [
                'no'                  => 6,
                'nama_akun'           => 'Tim Data SMP - Kab. Banggai Laut',
                'jenis_akun'          => 'Dinas Kabupaten',
                'wilayah'             => 'Kab. Banggai Laut',
                'status_akun'         => 'Belum Login',
                'kelengkapan_biodata' => 'Lengkap',
                'surat_tugas'         => 'Belum Ada',
                'terakhir_login'      => '2026-06-10',
            ],
            [
                'no'                  => 7,
                'nama_akun'           => 'Tim Data SMA - Kab. Banggai Laut',
                'jenis_akun'          => 'Dinas Kabupaten',
                'wilayah'             => 'Kab. Banggai Laut',
                'status_akun'         => 'Aktif',
                'kelengkapan_biodata' => 'Lengkap',
                'surat_tugas'         => 'Belum Ada',
                'terakhir_login'      => '2026-02-14',
            ],
        ];

        return view('admin.pengelolaanpengguna', compact('stats', 'users'));
    }
}