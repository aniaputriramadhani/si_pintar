<?php

namespace App\Http\Controllers\Dinas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemantauanController extends Controller
{
    /**
     * Menampilkan halaman pemantauan aktivasi rekening dinas.
     */
    public function index(Request $request)
    {
        // 1. Ambil Parameter Filter dari Query Request
        $tahun = $request->input('tahun', '2026');
        $jenjang = $request->input('jenjang', 'semua');
        $kabupaten = $request->input('kabupaten', 'semua');
        $statusInput = $request->input('status_input', 'semua');
        $search = $request->input('search');

        // 2. Data Dummy (karena Model Pemantauan belum dibuat di database)
        $pemantauanData = collect([]);

        // 3. Counter Tab Dummy
        $counts = [
            'semua'    => 0,
            'sudah'    => 0,
            'sebagian' => 0,
            'belum'    => 0,
        ];

        // 4. Data opsi dropdown filter
        $listTahun = ['2026', '2025'];
        $listJenjang = ['SD', 'SMP', 'SMA', 'SMK'];
        $listKabupaten = ['Kab. Banggai Laut', 'Kota Tangerang'];

        // 5. Return ke View Blade dengan variabel agar tidak error di Blade
        return view('dinas.pemantauan', compact(
            'pemantauanData',
            'counts',
            'listTahun',
            'listJenjang',
            'listKabupaten',
            'tahun',
            'jenjang',
            'kabupaten',
            'statusInput',
            'search'
        ));
    }
}