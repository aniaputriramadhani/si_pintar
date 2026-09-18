<?php

namespace App\Http\Controllers\Sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SekolahPengaduanController extends Controller
{
    /**
     * Menampilkan halaman Pengaduan Sekolah
     */
    public function index(Request $request)
    {
        // 1. Data Informasi Sekolah (Dummy Data)
        $sekolah = [
            'nama'   => 'SDN 1 Bahagia Selatan',
            'npsn'   => '63948836',
            'status' => 'Terverifikasi'
        ];

        // 2. Data Pemberitahuan Terbaru
        $pemberitahuan = [
            [
                'judul'    => 'Batas Konfirmasi Aktivasi',
                'deskripsi'=> 'Konfirmasi tahap aktif ditutup 20 Juli 2026.'
            ],
            [
                'judul'    => 'Format Pengembalian Negara',
                'deskripsi'=> 'Format terbaru tersedia pada menu Dokumen.'
            ],
            [
                'judul'    => 'Perbaikan Data Siswa',
                'deskripsi'=> '9 siswa memerlukan tindak lanjut.'
            ]
        ];

        // 3. Data List Pengaduan Saya
        $listPengaduan = [
            [
                'tiket'    => '#PIP-2026-0142',
                'kategori' => 'Aktivasi Rekening',
                'status'   => 'Dalam Proses',
                'aksi'     => 'Buka',
                'aksiType' => 'open'
            ],
            [
                'tiket'    => '#PIP-2026-0138',
                'kategori' => 'Data Siswa',
                'status'   => 'Perlu Informasi',
                'aksi'     => 'Lengkapi',
                'aksiType' => 'complete'
            ],
            [
                'tiket'    => '#PIP-2026-0129',
                'kategori' => 'Dokumen',
                'status'   => 'Selesai',
                'aksi'     => 'Lihat',
                'aksiType' => 'view'
            ]
        ];

        // 4. Pilihan Kategori untuk Modal Formulir Pengaduan
        $kategoriPengaduan = [
            'Aktivasi Rekening',
            'Data Siswa',
            'Dokumen',
            'Kendala Pencairan'
        ];

        // 5. Kembalikan View Blade beserta Data
        return view('sekolah.sekolahpengaduan', compact('sekolah', 'pemberitahuan', 'listPengaduan', 'kategoriPengaduan'));
    }

    /**
     * Simulasi Proses Simpan Pengaduan Baru (Handling POST / AJAX Form)
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kategori'  => 'required|string',
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'berkas'    => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        // Berikan respon balik (bisa digunakan jika form dikirim secara biasa / AJAX)
        return redirect()->back()->with('success', 'Pengaduan baru berhasil dikirim!');
    }
}