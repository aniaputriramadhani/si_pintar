<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Tangkap input filter dari form
        $tahun   = $request->get('tahun', '2026');
        $bulan   = $request->get('bulan');
        $jenjang = $request->get('jenjang');
        $search  = $request->get('search');

        // --- DATA MASTER GRAFIK BULANAN (Default / Master) ---
        $masterBulanan = [
            'SD'  => [7.5, 8.6, 8.8, 7.8, 5.3, 3.8, 7.9, 6.4, 9.6, 4.2, 4.7, 6.3],
            'SMP' => [9.5, 8.1, 7.2, 6.9, 5.3, 6.1, 7.6, 7.8, 7.2, 4.0, 6.7, 7.9],
            'SMA' => [10.3, 8.8, 8.0, 5.0, 5.1, 6.3, 8.7, 7.9, 6.9, 4.0, 4.2, 8.9],
            'SMK' => [6.8, 6.5, 10.4, 5.4, 3.2, 8.4, 6.6, 11.0, 9.3, 2.5, 5.4, 4.0],
        ];

        $namaBulan = [
            '1' => 'Januari', '2' => 'Februari', '3' => 'Maret', '4' => 'April',
            '5' => 'Mei', '6' => 'Juni', '7' => 'Juli', '8' => 'Agustus',
            '9' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        ];

        // --- FILTER BERDASARKAN BULAN ---
        if ($bulan && isset($namaBulan[$bulan])) {
            $indexBulan = (int)$bulan - 1; // Array index dimulai dari 0
            $labelsBar = [$namaBulan[$bulan]];

            // Ambil data hanya untuk bulan yang dipilih
            $dataBar = [
                'SD'  => [$masterBulanan['SD'][$indexBulan]],
                'SMP' => [$masterBulanan['SMP'][$indexBulan]],
                'SMA' => [$masterBulanan['SMA'][$indexBulan]],
                'SMK' => [$masterBulanan['SMK'][$indexBulan]],
            ];
        } else {
            // Jika "Semua Bulan" dipilih
            $labelsBar = array_values($namaBulan);
            $dataBar   = $masterBulanan;
        }

        // --- FILTER BERDASARKAN TAHUN (Simulasi Perubahan Data) ---
        // Jika tahun 2025/2024 dipilih, kita kalikan sedikit angkanya agar terlihat perubahan di grafik
        if ($tahun == '2025') {
            foreach ($dataBar as $key => $values) {
                $dataBar[$key] = array_map(fn($val) => round($val * 0.85, 1), $values);
            }
        } elseif ($tahun == '2024') {
            foreach ($dataBar as $key => $values) {
                $dataBar[$key] = array_map(fn($val) => round($val * 0.70, 1), $values);
            }
        }

        // --- DATA WILAYAH (Bisa di-filter berdasarkan search jika ada) ---
        $distribusiWilayah = [
            'Banten'             => 1808572861,
            'Kalimantan Selatan' => 2209059644,
            'Lampung'            => 2087192873,
            'Maluku Utara'       => 1848103253,
            'Papua Barat Daya'   => 1802687688,
            'Papua Selatan'      => 1824503461,
            'Papua Tengah'       => 2024086190,
            'Sulawesi Barat'     => 1897269165,
            'Sulawesi Tengah'    => 1723869675,
            'Sulawesi Tenggara'  => 2012329922,
        ];

        if ($search) {
            $distribusiWilayah = array_filter($distribusiWilayah, function ($key) use ($search) {
                return stripos($key, $search) !== false;
            }, ARRAY_FILTER_USE_KEY);
        }

        // Hitung ulang total alokasi berdasarkan tahun
        $multiplier = $tahun == '2026' ? 1.0 : ($tahun == '2025' ? 0.85 : 0.70);
        $totalAlokasi        = round(23657087527 * $multiplier);
        $totalDanaDisalurkan = round(18828261405 * $multiplier);

        return view('admin.dashboard', [
            'totalAlokasi'        => $totalAlokasi,
            'alokasiSiswa'        => round(27676 * $multiplier),
            'totalDanaDisalurkan' => $totalDanaDisalurkan,
            'penyaluranSiswa'     => round(22723 * $multiplier),
            'persentaseAktivasi'  => 72.8,
            'totalSkPembatalan'   => 279,
            'labelsBar'           => $labelsBar,
            'dataBar'             => $dataBar,
            'distribusiWilayah'   => $distribusiWilayah,
            'grandTotalWilayah'   => array_sum($distribusiWilayah),
        ]);
    }
}