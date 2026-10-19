<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->input('tahun', 'all');
        $bulan = $request->input('bulan', 'all');
        $provinsi = $request->input('provinsi', 'all');
        $kabupaten = $request->input('kabupaten', 'all');
        $kecamatan = $request->input('kecamatan', 'all');
        $search = trim((string) $request->input('search', ''));

        $tahunList = DB::table('data_pip')->distinct()->orderByDesc('tahun')->pluck('tahun');
        $provinsiList = DB::table('data_pip')->whereNotNull('provinsi')->where('provinsi', '!=', '')->distinct()->orderBy('provinsi')->pluck('provinsi');
        $kabupatenList = DB::table('data_pip')->when($provinsi !== 'all', fn ($q) => $q->where('provinsi', $provinsi))->whereNotNull('kabupaten')->distinct()->orderBy('kabupaten')->pluck('kabupaten');
        $kecamatanList = DB::table('data_pip')->when($provinsi !== 'all', fn ($q) => $q->where('provinsi', $provinsi))->when($kabupaten !== 'all', fn ($q) => $q->where('kabupaten', $kabupaten))->whereNotNull('kecamatan')->distinct()->orderBy('kecamatan')->pluck('kecamatan');

        $applyFilters = function ($query, bool $filterBulan = true) use ($tahun, $bulan, $provinsi, $kabupaten, $kecamatan, $search) {
            $query->when($tahun !== 'all', fn ($q) => $q->where('tahun', $tahun))
                ->when($filterBulan && $bulan !== 'all', fn ($q) => $q->where('bulan', $bulan))
                ->when($provinsi !== 'all', fn ($q) => $q->where('provinsi', $provinsi))
                ->when($kabupaten !== 'all', fn ($q) => $q->where('kabupaten', $kabupaten))
                ->when($kecamatan !== 'all', fn ($q) => $q->where('kecamatan', $kecamatan));

            if ($search !== '') {
                $query->where(function ($q) use ($search) {
                    $q->where('provinsi', 'like', "%{$search}%")
                        ->orWhere('kabupaten', 'like', "%{$search}%")
                        ->orWhere('kecamatan', 'like', "%{$search}%")
                        ->orWhere('nama_sekolah', 'like', "%{$search}%");
                });
            }

            return $query;
        };

        $query = $applyFilters(DB::table('data_pip'));
        // Rumus kartu mengikuti DASHBOARD_ADMIN di workbook sumber.
        $alokasiQuery = (clone $query)->where('status_sk', 'SK Nominasi');
        $totalAlokasi = (clone $alokasiQuery)->sum('nominal_dana');
        $alokasiSiswa = (clone $alokasiQuery)->count();
        $totalDanaDisalurkan = (clone $query)->where('status_aktivasi', 'Sudah Aktivasi')->sum('nominal_dana');
        $penyaluranSiswa = (clone $query)->where('status_aktivasi', 'Sudah Aktivasi')->count();
        $totalSkPembatalan = (clone $query)->where('status_sk', 'SK Pembatalan')->count();
        $persentaseAktivasi = $alokasiSiswa > 0 ? ($penyaluranSiswa / $alokasiSiswa) * 100 : 0;

        $namaBulan = [1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'];
        $perBulan = $applyFilters(DB::table('data_pip'), false)->whereNotNull('bulan')->select('bulan')
            ->selectRaw("SUM(CASE WHEN status_sk = 'SK Nominasi' THEN nominal_dana ELSE 0 END) as alokasi")
            ->selectRaw("SUM(CASE WHEN status_aktivasi = 'Sudah Aktivasi' THEN nominal_dana ELSE 0 END) as tersalur")
            ->groupBy('bulan')->get()->keyBy('bulan');
        $dataBarAll = collect($namaBulan)->map(fn ($name, $number) => ($perBulan[$number]->alokasi ?? 0) > 0
            ? round(($perBulan[$number]->tersalur / $perBulan[$number]->alokasi) * 100, 2) : 0)->values();
        $labelsBar = $bulan !== 'all' ? [$namaBulan[(int) $bulan]] : array_values($namaBulan);
        $dataBar = $bulan !== 'all' ? [$dataBarAll[(int) $bulan - 1]] : $dataBarAll->all();

        $distribusiWilayah = (clone $query)->where('status_sk', 'SK Nominasi')->whereNotNull('provinsi')
            ->select('provinsi', DB::raw('COUNT(*) as jumlah_siswa'))->groupBy('provinsi')->orderByDesc('jumlah_siswa')->limit(10)->get();

        return view('admin.dashboard', compact(
            'tahun', 'bulan', 'provinsi', 'kabupaten', 'kecamatan', 'search', 'tahunList', 'provinsiList', 'kabupatenList', 'kecamatanList',
            'totalAlokasi', 'alokasiSiswa', 'totalDanaDisalurkan', 'penyaluranSiswa',
            'persentaseAktivasi', 'totalSkPembatalan', 'labelsBar', 'dataBar',
            'dataBarAll', 'distribusiWilayah', 'namaBulan'
        ));
    }
}
