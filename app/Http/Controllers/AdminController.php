<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalAlokasi        = 19482627;
        $totalDana           = 13.364;
        $totalSkPemberian    = 11250587;
        $pemberianSiswa      = 10963903;
        $progresSiswa        = 97;
        $totalDanaDisalurkan = 7.047;
        $pemberianDana       = 6.919;
        $progresDana         = 98.18;
        $totalSk             = 343;

        $jenjang = [
            'SD'  => ['alokasi' => 10360614, 'sk_pemberian' => 7151171, 'jumlah_sk' => 110, 'dana' => 2.94, 'progres' => 69.0, 'color' => '#3B82F6'],
            'SMP' => ['alokasi' => 3816709,  'sk_pemberian' => 2520078, 'jumlah_sk' => 108, 'dana' => 4.83, 'progres' => 66.0, 'color' => '#8B5CF6'],
            'SMA' => ['alokasi' => 3039164,  'sk_pemberian' => 2007411, 'jumlah_sk' => 86,  'dana' => 3.85, 'progres' => 66.1, 'color' => '#06B6D4'],
            'SMK' => ['alokasi' => 1378140,  'sk_pemberian' => 911197,  'jumlah_sk' => 39,  'dana' => 1.74, 'progres' => 66.1, 'color' => '#F59E0B'],
        ];

        $rekapBulan = [
            'Jan' => 0, 'Feb' => 0, 'Mar' => 19, 'Apr' => 40, 'Mei' => 85,
            'Jun' => 104, 'Jul' => 95, 'Agu' => 0, 'Sep' => 0, 'Okt' => 0, 'Nov' => 0, 'Des' => 0,
        ];

        $top5Terendah = [
            'Jawa Barat'          => ['persen' => 31, 'color' => '#3B82F6'],
            'Jawa Tengah'         => ['persen' => 26, 'color' => '#8B5CF6'],
            'Jawa Timur'          => ['persen' => 22, 'color' => '#06B6D4'],
            'Sumatera Utara'      => ['persen' => 13, 'color' => '#F59E0B'],
            'Nusa Tenggara Timur' => ['persen' => 8,  'color' => '#EC4899'],
        ];

        $totalProvinsi = [
            'Kalimantan Utara'                  => ['persen' => 25, 'color' => '#3B82F6'],
            'Papua Barat'                       => ['persen' => 23, 'color' => '#8B5CF6'],
            'Papua Tengah (Pemekaran 2023)'     => ['persen' => 20, 'color' => '#06B6D4'],
            'Papua Barat Daya (Pemekaran 2023)' => ['persen' => 19, 'color' => '#F59E0B'],
            'Papua (Pemekaran 2023)'            => ['persen' => 13, 'color' => '#EC4899'],
        ];

        $progresSkJenjang = [
            'SMP' => 722562,
            'SMK' => 931042,
            'SMA' => 868864,
            'SD'  => 2043088,
        ];

        return view('admin.dashboard', compact(
            'totalAlokasi', 'totalDana', 'totalSkPemberian', 'pemberianSiswa', 
            'progresSiswa', 'totalDanaDisalurkan', 'pemberianDana', 'progresDana', 
            'totalSk', 'jenjang', 'rekapBulan', 'top5Terendah', 'totalProvinsi', 'progresSkJenjang'
        ));
    }
}