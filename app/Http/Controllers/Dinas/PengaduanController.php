<?php

namespace App\Http\Controllers\Dinas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Menampilkan daftar tiket pengaduan
     */
    public function index(Request $request)
    {
        // Data Master Pengaduan (Dapat diganti dengan model: Pengaduan::query())
        $masterPengaduan = collect([
            [
                'no' => 1,
                'noTiket' => '#PIP-2026-1001',
                'kategori' => 'Akun Pengguna',
                'pengaju' => 'Dinas Kabupaten SD',
                'kabupaten' => 'Kab. Bogor',
                'provinsi' => 'Jawa Barat',
                'tanggalDibuat' => '2026-03-17',
                'status' => 'Selesai',
                'deskripsi' => 'Data siswa perlu diperbaiki',
                'tanggalSelesai' => '2026-04-03'
            ],
            [
                'no' => 2,
                'noTiket' => '#PIP-2026-1002',
                'kategori' => 'Dokumen',
                'pengaju' => 'Operator Sekolah',
                'kabupaten' => 'Kab. Bogor',
                'provinsi' => 'Jawa Barat',
                'tanggalDibuat' => '2026-07-14',
                'status' => 'Dalam Proses',
                'deskripsi' => 'Dana belum tersalurkan ke rekening siswa',
                'tanggalSelesai' => '-'
            ],
            [
                'no' => 3,
                'noTiket' => '#PIP-2026-1003',
                'kategori' => 'Format Verifikasi',
                'pengaju' => 'Dinas Kabupaten SMP',
                'kabupaten' => 'Kota Surabaya',
                'provinsi' => 'Jawa Timur',
                'tanggalDibuat' => '2026-06-19',
                'status' => 'Baru',
                'deskripsi' => 'Dana belum tersalurkan ke rekening siswa',
                'tanggalSelesai' => '-'
            ],
            [
                'no' => 4,
                'noTiket' => '#PIP-2026-1004',
                'kategori' => 'Aktivasi Rekening',
                'pengaju' => 'Dinas Kabupaten SMP',
                'kabupaten' => 'Kota Surabaya',
                'provinsi' => 'Jawa Timur',
                'tanggalDibuat' => '2026-05-17',
                'status' => 'Selesai',
                'deskripsi' => 'Kendala aktivasi rekening untuk beberapa siswa',
                'tanggalSelesai' => '2026-06-05'
            ],
            [
                'no' => 5,
                'noTiket' => '#PIP-2026-1005',
                'kategori' => 'Penyaluran Dana',
                'pengaju' => 'Dinas Kabupaten SD',
                'kabupaten' => 'Kota Surabaya',
                'provinsi' => 'Jawa Timur',
                'tanggalDibuat' => '2026-04-18',
                'status' => 'Baru',
                'deskripsi' => 'Data siswa perlu diperbaiki',
                'tanggalSelesai' => '-'
            ],
            [
                'no' => 6,
                'noTiket' => '#PIP-2026-1006',
                'kategori' => 'Data Siswa',
                'pengaju' => 'Dinas Kabupaten SD',
                'kabupaten' => 'Kota Tangerang',
                'provinsi' => 'Banten',
                'tanggalDibuat' => '2026-02-25',
                'status' => 'Selesai',
                'deskripsi' => 'Dana belum tersalurkan ke rekening siswa',
                'tanggalSelesai' => '2026-03-09'
            ],
            [
                'no' => 7,
                'noTiket' => '#PIP-2026-1007',
                'kategori' => 'Dokumen',
                'pengaju' => 'Dinas Provinsi',
                'kabupaten' => 'Kab. Bogor',
                'provinsi' => 'Jawa Barat',
                'tanggalDibuat' => '2026-07-04',
                'status' => 'Dalam Proses',
                'deskripsi' => 'Permintaan reset akun pengguna',
                'tanggalSelesai' => '-'
            ],
            [
                'no' => 8,
                'noTiket' => '#PIP-2026-1008',
                'kategori' => 'Akun Pengguna',
                'pengaju' => 'Dinas Kabupaten SD',
                'kabupaten' => 'Kab. Bogor',
                'provinsi' => 'Jawa Barat',
                'tanggalDibuat' => '2026-06-16',
                'status' => 'Selesai',
                'deskripsi' => 'Data siswa perlu diperbaiki',
                'tanggalSelesai' => '2026-06-27'
            ]
        ]);

        // Menerapkan Filter Data
        $filteredPengaduan = $masterPengaduan->filter(function ($item) use ($request) {
            $matchStatus    = !$request->filled('status') || $request->status === 'Semua' || $item['status'] === $request->status;
            $matchKategori  = !$request->filled('kategori') || $request->kategori === 'Semua' || $item['kategori'] === $request->kategori;
            $matchKabupaten = !$request->filled('kabupaten') || $request->kabupaten === 'Semua' || $item['kabupaten'] === $request->kabupaten;
            
            $matchSearch = !$request->filled('search') || 
                str_contains(strtolower($item['noTiket']), strtolower($request->search)) ||
                str_contains(strtolower($item['deskripsi']), strtolower($request->search));

            return $matchStatus && $matchKategori && $matchKabupaten && $matchSearch;
        });

        // Ambil tiket aktif untuk detail obrolan (default: PIP-2026-1002)
        $selectedTiketNo = $request->get('tiket', '#PIP-2026-1002');
        $activeTiket = $masterPengaduan->firstWhere('noTiket', $selectedTiketNo) ?? $masterPengaduan->first();

        return view('dinas.pengaduan', [
            'pengaduanData' => $filteredPengaduan->values(),
            'activeTiket'   => $activeTiket,
            'totalTiket'    => $filteredPengaduan->count()
        ]);
    }

    /**
     * Mengirim balasan/tanggapan pesan pada tiket
     */
    public function reply(Request $request, $noTiket)
    {
        $request->validate([
            'pesan' => 'required|string|max:1000',
        ]);

        // Simpan balasan ke database...

        return back()->with('success', "Tanggapan berhasil dikirim untuk tiket {$noTiket}");
    }
}