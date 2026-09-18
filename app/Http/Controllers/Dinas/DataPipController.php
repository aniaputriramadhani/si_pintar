<?php

namespace App\Http\Controllers\Dinas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataPipController extends Controller
{
    public function index(Request $request)
    {
        // Filter parameter
        $tab = $request->get('tab', 'penetapan');
        $aktivasi = $request->get('aktivasi', 'semua');
        $jenjang = $request->get('jenjang');
        $tahun = $request->get('tahun', '2026');
        $kecamatan = $request->get('kecamatan');
        $search = $request->get('search');

        // Tambahkan variabel $dataPips di sini
        // Jika sudah ada Model DataPip:
        // $dataPips = DataPip::paginate(10);

        // Jika belum ada database (agar Blade tidak error):
        $dataPips = collect([]); 

        return view('dinas.datapip', compact(
            'dataPips', // Jangan lupa kirim variabel ini ke view
            'tab', 
            'aktivasi', 
            'jenjang', 
            'tahun', 
            'kecamatan', 
            'search'
        ));
    }
}