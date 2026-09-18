<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    /**
     * Tampilkan halaman utama Manajemen Dokumen Admin Pusat
     */
    public function index(Request $request)
    {
        // Ambil filter tahun (default 2026 sesuai dengan tampilan view)
        $tahun = $request->get('tahun', 2026);

        // Jika nantinya kamu menggunakan DB/Model, data bisa dipanggil di sini.
        // Untuk saat ini kita siapkan variabel pendukung sesuai statistik di Blade.
        $totalUnggah = 12;

        return view('admin.dokumen', compact('tahun', 'totalUnggah'));
    }
}