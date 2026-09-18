<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Tampilkan halaman utama Pusat Layanan Admin Pusat
     */
    public function index(Request $request)
    {
        // Ambil filter tahun dari request (default 2026)
        $tahun = $request->get('tahun', 2026);

        // Data statistik/simulasi sesuai dengan tampilan Blade
        $informasiAktifCount = 8;
        $tiketPendingCount = 9;

        return view('admin.layanan', compact(
            'tahun',
            'informasiAktifCount',
            'tiketPendingCount'
        ));
    }
}