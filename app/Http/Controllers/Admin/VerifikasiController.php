<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function index(Request $request)
    {
        // Sample Data Verifikasi Usulan berdasarkan gambar sheet
        $allData = collect([
            [
                'no' => 1,
                'sekolah' => 'SDN 2 Larangan',
                'kecamatan' => 'Larangan',
                'kabupaten' => 'Kota Tangerang',
                'provinsi' => 'Banten',
                'pengusul' => 'Dinas Kabupaten SD',
                'jumlah_siswa' => 11,
                'tanggal_masuk' => '2026-07-14',
                'status' => 'Perlu Verifikasi',
                'catatan' => 'Lampiran kurang jelas',
                'aksi' => 'Periksa'
            ],
            [
                'no' => 2,
                'sekolah' => 'SDN 2 Cibinong',
                'kecamatan' => 'Cibinong',
                'kabupaten' => 'Kab. Bogor',
                'provinsi' => 'Jawa Barat',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 6,
                'tanggal_masuk' => '2026-06-16',
                'status' => 'Diloloskan',
                'catatan' => '-',
                'aksi' => 'Lanjutkan'
            ],
            [
                'no' => 3,
                'sekolah' => 'SMPN 1 Cibinong',
                'kecamatan' => 'Cibinong',
                'kabupaten' => 'Kab. Bogor',
                'provinsi' => 'Jawa Barat',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 15,
                'tanggal_masuk' => '2026-01-07',
                'status' => 'Perlu Verifikasi',
                'catatan' => 'Data orang tua belum lengkap',
                'aksi' => 'Periksa'
            ],
            [
                'no' => 4,
                'sekolah' => 'SMAN 1 Bokan',
                'kecamatan' => 'Bokan',
                'kabupaten' => 'Kab. Banggai Laut',
                'provinsi' => 'Sulawesi Tengah',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 12,
                'tanggal_masuk' => '2026-03-11',
                'status' => 'Diloloskan',
                'catatan' => '-',
                'aksi' => 'Lanjutkan'
            ],
            [
                'no' => 5,
                'sekolah' => 'SMPN 1 Banggai',
                'kecamatan' => 'Banggai',
                'kabupaten' => 'Kab. Banggai Laut',
                'provinsi' => 'Sulawesi Tengah',
                'pengusul' => 'Dinas Kota SMP',
                'jumlah_siswa' => 13,
                'tanggal_masuk' => '2026-04-27',
                'status' => 'Diloloskan',
                'catatan' => 'Data orang tua belum lengkap',
                'aksi' => 'Periksa'
            ],
            [
                'no' => 6,
                'sekolah' => 'SMKN 1 Cibinong',
                'kecamatan' => 'Cibinong',
                'kabupaten' => 'Kab. Bogor',
                'provinsi' => 'Jawa Barat',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 16,
                'tanggal_masuk' => '2026-04-11',
                'status' => 'Perlu Perbaikan',
                'catatan' => 'Sesuai cakupan akun',
                'aksi' => 'Lanjutkan'
            ],
            [
                'no' => 7,
                'sekolah' => 'SMKN 1 Labobo',
                'kecamatan' => 'Labobo',
                'kabupaten' => 'Kab. Banggai Laut',
                'provinsi' => 'Sulawesi Tengah',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 16,
                'tanggal_masuk' => '2026-06-01',
                'status' => 'Diloloskan',
                'catatan' => 'Data orang tua belum lengkap',
                'aksi' => 'Periksa'
            ],
            [
                'no' => 8,
                'sekolah' => 'SMPN 1 Ciledug',
                'kecamatan' => 'Ciledug',
                'kabupaten' => 'Kota Tangerang',
                'provinsi' => 'Banten',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 15,
                'tanggal_masuk' => '2026-01-23',
                'status' => 'Diloloskan',
                'catatan' => '-',
                'aksi' => 'Lanjutkan'
            ],
            [
                'no' => 9,
                'sekolah' => 'SDN 1 Cibinong',
                'kecamatan' => 'Cibinong',
                'kabupaten' => 'Kab. Bogor',
                'provinsi' => 'Jawa Barat',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 1,
                'tanggal_masuk' => '2026-03-27',
                'status' => 'Perlu Verifikasi',
                'catatan' => '-',
                'aksi' => 'Periksa'
            ],
            [
                'no' => 10,
                'sekolah' => 'SMAN 1 Bokan',
                'kecamatan' => 'Bokan',
                'kabupaten' => 'Kab. Banggai Laut',
                'provinsi' => 'Sulawesi Tengah',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 11,
                'tanggal_masuk' => '2026-02-17',
                'status' => 'Diloloskan',
                'catatan' => 'Data orang tua belum lengkap',
                'aksi' => 'Lanjutkan'
            ],
            [
                'no' => 11,
                'sekolah' => 'SMAN 1 Bokan',
                'kecamatan' => 'Bokan',
                'kabupaten' => 'Kab. Banggai Laut',
                'provinsi' => 'Sulawesi Tengah',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 18,
                'tanggal_masuk' => '2026-01-28',
                'status' => 'Perlu Verifikasi',
                'catatan' => 'Sesuai cakupan akun',
                'aksi' => 'Periksa'
            ],
            [
                'no' => 12,
                'sekolah' => 'SDN 1 Selatan',
                'kecamatan' => 'Selatan',
                'kabupaten' => 'Kab. Banggai Laut',
                'provinsi' => 'Sulawesi Tengah',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 14,
                'tanggal_masuk' => '2026-06-21',
                'status' => 'Perlu Verifikasi',
                'catatan' => 'Sesuai cakupan akun',
                'aksi' => 'Lanjutkan'
            ],
            [
                'no' => 13,
                'sekolah' => 'SMPN 1 Ciledug',
                'kecamatan' => 'Ciledug',
                'kabupaten' => 'Kota Tangerang',
                'provinsi' => 'Banten',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 2,
                'tanggal_masuk' => '2026-01-30',
                'status' => 'Perlu Verifikasi',
                'catatan' => 'Data orang tua belum lengkap',
                'aksi' => 'Periksa'
            ],
            [
                'no' => 14,
                'sekolah' => 'SMKN 1 Cibinong',
                'kecamatan' => 'Cibinong',
                'kabupaten' => 'Kab. Bogor',
                'provinsi' => 'Jawa Barat',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 18,
                'tanggal_masuk' => '2026-07-08',
                'status' => 'Ditolak',
                'catatan' => 'Lampiran kurang jelas',
                'aksi' => 'Lanjutkan'
            ],
        ]);

        // Filter Handling
        $status = $request->get('status', 'semua');
        $search = $request->get('search');

        $filtered = $allData->when($status !== 'semua', function ($collection) use ($status) {
            return $collection->where('status', $status);
        })->when($search, function ($collection) use ($search) {
            return $collection->filter(function ($item) use ($search) {
                return str_contains(strtolower($item['sekolah']), strtolower($search)) ||
                       str_contains(strtolower($item['kabupaten']), strtolower($search)) ||
                       str_contains(strtolower($item['pengusul']), strtolower($search));
            });
        });

        // Agregat Statistik
        $stats = [
            'total_usulan' => $allData->count(),
            'perlu_verifikasi' => $allData->where('status', 'Perlu Verifikasi')->count(),
            'diloloskan' => $allData->where('status', 'Diloloskan')->count(),
            'perlu_perbaikan' => $allData->where('status', 'Perlu Perbaikan')->count(),
            'ditolak' => $allData->where('status', 'Ditolak')->count(),
            'total_siswa' => $allData->sum('jumlah_siswa'),
        ];

        return view('admin.verifikasi', [
            'usulanList' => $filtered,
            'stats' => (object)$stats,
            'statusSelected' => $status,
            'search' => $search
        ]);
    }
}