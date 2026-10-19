<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->get('tahun', 2026);
        $totalUnggah = 12;
        
        // Cek tab apa yang sedang dibuka (default 'dokumen')
        $tab = $request->get('tab', 'dokumen');

        return view('admin.dokumen', compact('tahun', 'totalUnggah', 'tab'));
    }
}