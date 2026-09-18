<?php

namespace App\Http\Controllers\Dinas;

use App\Http\Controllers\Controller; // IMPORT BASE CONTROLLER
use Illuminate\Http\Request;

class DinasVerifikasiController extends Controller
{
    /**
     * Menampilkan halaman Verifikasi Usulan beserta data statistik dan daftarnya.
     */
    public function index(Request $request)
    {
        // 1. Data Dummy Usulan Sekolah (Sesuai dengan `masterUsulanData` pada Blade)
        $masterUsulanData = collect([
            [
                'id' => 1,
                'sekolah' => 'SMKN 2 Baiturrahman',
                'jenjang' => 'SMK',
                'kecamatan' => 'Baiturrahman',
                'kabupaten' => 'Kota Banda Aceh',
                'provinsi' => 'Aceh',
                'pengusul' => 'Dinas Provinsi SMK',
                'jumlah_siswa' => 19,
                'tanggal_masuk' => '2024-04-04',
                'tahun' => '2024',
                'status' => 'Ditolak',
                'catatan' => 'Sesuai cakupan akun',
                'aksi' => 'Periksa'
            ],
            [
                'id' => 2,
                'sekolah' => 'SMPN 1 Baiturrahman',
                'jenjang' => 'SMP',
                'kecamatan' => 'Baiturrahman',
                'kabupaten' => 'Kota Banda Aceh',
                'provinsi' => 'Aceh',
                'pengusul' => 'Dinas Provinsi SMA',
                'jumlah_siswa' => 10,
                'tanggal_masuk' => '2024-02-16',
                'tahun' => '2024',
                'status' => 'Diloloskan',
                'catatan' => '-',
                'aksi' => 'Lanjutkan'
            ],
            [
                'id' => 3,
                'sekolah' => 'SMKN 2 Baiturrahman',
                'jenjang' => 'SMK',
                'kecamatan' => 'Baiturrahman',
                'kabupaten' => 'Kota Banda Aceh',
                'provinsi' => 'Aceh',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 20,
                'tanggal_masuk' => '2026-02-10',
                'tahun' => '2026',
                'status' => 'Diloloskan',
                'catatan' => '-',
                'aksi' => 'Lanjutkan'
            ],
            [
                'id' => 4,
                'sekolah' => 'SDN 1 Kuta Alam',
                'jenjang' => 'SD',
                'kecamatan' => 'Kuta Alam',
                'kabupaten' => 'Kota Banda Aceh',
                'provinsi' => 'Aceh',
                'pengusul' => 'Dinas Kabupaten SD',
                'jumlah_siswa' => 8,
                'tanggal_masuk' => '2026-01-08',
                'tahun' => '2026',
                'status' => 'Ditolak',
                'catatan' => 'Lampiran kurang jelas',
                'aksi' => 'Periksa'
            ],
            [
                'id' => 5,
                'sekolah' => 'SMPN 3 Kuta Alam',
                'jenjang' => 'SMP',
                'kecamatan' => 'Kuta Alam',
                'kabupaten' => 'Kota Banda Aceh',
                'provinsi' => 'Aceh',
                'pengusul' => 'Dinas Kabupaten SD',
                'jumlah_siswa' => 10,
                'tanggal_masuk' => '2025-01-03',
                'tahun' => '2025',
                'status' => 'Diloloskan',
                'catatan' => '-',
                'aksi' => 'Lanjutkan'
            ],
            [
                'id' => 6,
                'sekolah' => 'SMAN 2 Ingin Jaya',
                'jenjang' => 'SMA',
                'kecamatan' => 'Ingin Jaya',
                'kabupaten' => 'Kab. Aceh Besar',
                'provinsi' => 'Aceh',
                'pengusul' => 'Dinas Provinsi SMK',
                'jumlah_siswa' => 3,
                'tanggal_masuk' => '2026-03-07',
                'tahun' => '2026',
                'status' => 'Perlu Perbaikan',
                'catatan' => 'Data orang tua belum lengkap',
                'aksi' => 'Periksa'
            ],
            [
                'id' => 7,
                'sekolah' => 'SDN 1 Ingin Jaya',
                'jenjang' => 'SD',
                'kecamatan' => 'Ingin Jaya',
                'kabupaten' => 'Kab. Aceh Besar',
                'provinsi' => 'Aceh',
                'pengusul' => 'Dinas Provinsi SMK',
                'jumlah_siswa' => 4,
                'tanggal_masuk' => '2025-02-25',
                'tahun' => '2025',
                'status' => 'Perlu Perbaikan',
                'catatan' => 'Lampiran kurang jelas',
                'aksi' => 'Periksa'
            ],
            [
                'id' => 8,
                'sekolah' => 'SDN 3 Ingin Jaya',
                'jenjang' => 'SD',
                'kecamatan' => 'Ingin Jaya',
                'kabupaten' => 'Kab. Aceh Besar',
                'provinsi' => 'Aceh',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 7,
                'tanggal_masuk' => '2024-01-27',
                'tahun' => '2024',
                'status' => 'Ditolak',
                'catatan' => 'Lampiran kurang jelas',
                'aksi' => 'Lanjutkan'
            ],
            [
                'id' => 9,
                'sekolah' => 'SMKN 1 Darussalam',
                'jenjang' => 'SMK',
                'kecamatan' => 'Darussalam',
                'kabupaten' => 'Kab. Aceh Besar',
                'provinsi' => 'Aceh',
                'pengusul' => 'Dinas Provinsi SMK',
                'jumlah_siswa' => 7,
                'tanggal_masuk' => '2026-03-11',
                'tahun' => '2026',
                'status' => 'Perlu Perbaikan',
                'catatan' => 'Data orang tua belum lengkap',
                'aksi' => 'Periksa'
            ],
            [
                'id' => 10,
                'sekolah' => 'SDN 2 Darussalam',
                'jenjang' => 'SD',
                'kecamatan' => 'Darussalam',
                'kabupaten' => 'Kab. Aceh Besar',
                'provinsi' => 'Aceh',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 4,
                'tanggal_masuk' => '2024-05-06',
                'tahun' => '2024',
                'status' => 'Diloloskan',
                'catatan' => '-',
                'aksi' => 'Lanjutkan'
            ],
            [
                'id' => 11,
                'sekolah' => 'SDN Inpres Lalong',
                'jenjang' => 'SD',
                'kecamatan' => 'Kuta Alam',
                'kabupaten' => 'Kota Banda Aceh',
                'provinsi' => 'Aceh',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 14,
                'tanggal_masuk' => '2026-07-15',
                'tahun' => '2026',
                'status' => 'Perlu Verifikasi',
                'catatan' => '-',
                'aksi' => 'Periksa'
            ],
            [
                'id' => 12,
                'sekolah' => 'SDN 2 Banggai',
                'jenjang' => 'SD',
                'kecamatan' => 'Ingin Jaya',
                'kabupaten' => 'Kab. Aceh Besar',
                'provinsi' => 'Aceh',
                'pengusul' => 'Operator Sekolah',
                'jumlah_siswa' => 8,
                'tanggal_masuk' => '2026-07-14',
                'tahun' => '2026',
                'status' => 'Perlu Perbaikan',
                'catatan' => 'Data orang tua',
                'aksi' => 'Lihat Detail'
            ]
        ]);

        // 2. Hitung Statistik Keseluruhan (Atau disesuaikan dengan nilai indikator/peta statistik)
        $statistik = [
            'perlu_verifikasi' => $masterUsulanData->where('status', 'Perlu Verifikasi')->count(),
            'perlu_perbaikan'  => $masterUsulanData->where('status', 'Perlu Perbaikan')->count(),
            'diloloskan'       => $masterUsulanData->whereIn('status', ['Diloloskan', 'Disetujui'])->count(),
            'ditolak'          => $masterUsulanData->where('status', 'Ditolak')->count(),
        ];

        // 3. Menangani Parameter Filter dari Request
        $usulanData = $masterUsulanData->filter(function ($item) use ($request) {
            $matchTahun = !$request->filled('tahun') || $request->tahun === 'Semua' || $item['tahun'] === $request->tahun;
            $matchJenjang = !$request->filled('jenjang') || $request->jenjang === 'Semua' || $item['jenjang'] === $request->jenjang;
            $matchKabupaten = !$request->filled('kabupaten') || $request->kabupaten === 'Semua' || $item['kabupaten'] === $request->kabupaten;
            $matchStatus = !$request->filled('status') || $request->status === 'Semua' || $item['status'] === $request->status;
            
            $matchSearch = true;
            if ($request->filled('search')) {
                $search = strtolower($request->search);
                $matchSearch = str_contains(strtolower($item['sekolah']), $search);
            }

            return $matchTahun && $matchJenjang && $matchKabupaten && $matchStatus && $matchSearch;
        });

        // Catatan: Ganti 'dinas.verifikasi' dengan nama path view blade Anda jika menggunakan folder/nama tertentu
        return view('dinas.dinasverifikasi', compact('statistik', 'usulanData'));
    }

    /**
     * Memproses aksi verifikasi/peninjauan usulan dari sekolah.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Diloloskan,Perlu Perbaikan,Ditolak,Perlu Verifikasi',
            'catatan' => 'nullable|string|max:255',
        ]);

        // Logika update status ke Database (misal menggunakan Model Usulan):
        // $usulan = Usulan::findOrFail($id);
        // $usulan->update([
        //     'status' => $request->status,
        //     'catatan' => $request->catatan,
        // ]);

        return redirect()->back()->with('success', 'Status usulan sekolah berhasil diperbarui.');
    }
}