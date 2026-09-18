<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicPenyaluranController extends Controller
{
    public function nasional(Request $request)
    {
        $tahun = $request->get('tahun', '2026');

        // Ringkasan Rekapitulasi PIP Nasional (Sesuai Data Excel SIPINTAR)
        $rekapNasional = [
            '2026' => [
                ['jenjang' => 'SD',  'alokasi_siswa' => 4800, 'siswa_sk' => 3876, 'dana' => 1717383235, 'aktivasi' => 2794, 'belum_aktivasi' => 1049, 'batal' => 33],
                ['jenjang' => 'SMP', 'alokasi_siswa' => 6000, 'siswa_sk' => 4982, 'dana' => 3681006013, 'aktivasi' => 3625, 'belum_aktivasi' => 1297, 'batal' => 60],
                ['jenjang' => 'SMA', 'alokasi_siswa' => 7500, 'siswa_sk' => 6189, 'dana' => 6104010265, 'aktivasi' => 4661, 'belum_aktivasi' => 1449, 'batal' => 79],
                ['jenjang' => 'SMK', 'alokasi_siswa' => 8500, 'siswa_sk' => 7194, 'dana' => 7084264841, 'aktivasi' => 5366, 'belum_aktivasi' => 1744, 'batal' => 84],
            ],
            '2025' => [
                ['jenjang' => 'SD',  'alokasi_siswa' => 4700, 'siswa_sk' => 3951, 'dana' => 1751133993, 'aktivasi' => 2819, 'belum_aktivasi' => 1090, 'batal' => 42],
                ['jenjang' => 'SMP', 'alokasi_siswa' => 6800, 'siswa_sk' => 5752, 'dana' => 4250857954, 'aktivasi' => 4205, 'belum_aktivasi' => 1478, 'batal' => 69],
                ['jenjang' => 'SMA', 'alokasi_siswa' => 7400, 'siswa_sk' => 6192, 'dana' => 6099274821, 'aktivasi' => 4554, 'belum_aktivasi' => 1562, 'batal' => 76],
                ['jenjang' => 'SMK', 'alokasi_siswa' => 8200, 'siswa_sk' => 6828, 'dana' => 6726994637, 'aktivasi' => 4953, 'belum_aktivasi' => 1783, 'batal' => 92],
            ],
            '2024' => [
                ['jenjang' => 'SD',  'alokasi_siswa' => 4600, 'siswa_sk' => 3937, 'dana' => 1747320456, 'aktivasi' => 2916, 'belum_aktivasi' => 980,  'batal' => 41],
                ['jenjang' => 'SMP', 'alokasi_siswa' => 6200, 'siswa_sk' => 5141, 'dana' => 3798679356, 'aktivasi' => 3741, 'belum_aktivasi' => 1335, 'batal' => 65],
                ['jenjang' => 'SMA', 'alokasi_siswa' => 7300, 'siswa_sk' => 6213, 'dana' => 6121099903, 'aktivasi' => 4659, 'belum_aktivasi' => 1475, 'batal' => 79],
                ['jenjang' => 'SMK', 'alokasi_siswa' => 8100, 'siswa_sk' => 6871, 'dana' => 6765250444, 'aktivasi' => 5053, 'belum_aktivasi' => 1721, 'batal' => 97],
            ]
        ];

        $dataAktif = $rekapNasional[$tahun] ?? $rekapNasional['2026'];

        // Memanggil file: resources/views/public/penyaluran/nasional.blade.php
        return view('public.penyaluran.nasional', compact('dataAktif', 'tahun'));
    }

    public function wilayah(Request $request)
    {
        $tahun = $request->get('tahun', '2026');

        // Memanggil file: resources/views/public/penyaluran/wilayah.blade.php
        return view('public.penyaluran.wilayah', compact('tahun'));
    }
}