<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapDinamisController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil input filter tahun (default '2026')
        $tahun = $request->input('tahun', '2026');

        // 2. Opsi pilihan filter tahun untuk dropdown
        $tahunList = ['2026', '2025', '2024'];

        // 3. Query agregasi rekap per jenjang dari tabel data_pip
        $rekapPerJenjang = DB::table('data_pip')
            ->select('jenjang')
            ->selectRaw('COUNT(*) as alokasi_siswa')
            ->selectRaw("SUM(CASE WHEN status_aktivasi = 'Sudah Aktivasi' THEN nominal_dana ELSE 0 END) as dana_disalurkan")
            ->selectRaw("SUM(CASE WHEN status_aktivasi != 'Sudah Aktivasi' THEN nominal_dana ELSE 0 END) as sisa_dana")
            ->selectRaw('SUM(nominal_dana) as total_alokasi_dana')
            ->selectRaw("CASE WHEN SUM(nominal_dana) > 0 THEN (SUM(CASE WHEN status_aktivasi = 'Sudah Aktivasi' THEN nominal_dana ELSE 0 END) / SUM(nominal_dana)) * 100 ELSE 0 END as progres_dana")
            ->when($tahun !== 'semua', function ($query) use ($tahun) {
                return $query->where('tahun', $tahun);
            })
            ->groupBy('jenjang')
            ->orderByRaw("FIELD(jenjang, 'SD', 'SMP', 'SMA', 'SMK')")
            ->get();

        // 4. Hitung Grand Total agregasi
        $totalAlokasiDana = $rekapPerJenjang->sum('total_alokasi_dana');
        $totalDanaDisalurkan = $rekapPerJenjang->sum('dana_disalurkan');

        $grandTotal = (object) [
            'alokasi_siswa'   => $rekapPerJenjang->sum('alokasi_siswa'),
            'dana_disalurkan' => $totalDanaDisalurkan,
            'sisa_dana'       => $rekapPerJenjang->sum('sisa_dana'),
            'progres_dana'    => $totalAlokasiDana > 0 ? ($totalDanaDisalurkan / $totalAlokasiDana) * 100 : 0,
        ];

        return view('admin.rekapdinamis', compact('rekapPerJenjang', 'grandTotal', 'tahun', 'tahunList'));
    }
}