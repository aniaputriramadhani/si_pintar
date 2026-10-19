<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapDinamisController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil input filter dari request (dengan default value)
        $tahun = $request->input('tahun', 'Semua');
        $jenjang = $request->input('jenjang', 'Semua');
        $wilayah = $request->input('wilayah', 'Nasional');
        $provinsi = $request->input('provinsi', 'Semua');
        $kabupaten = $request->input('kabupaten', 'Semua');
        $kecamatan = $request->input('kecamatan', 'Semua');
        $search = $request->input('search', '');

        // Opsi filter berasal dari data yang tersedia, agar selalu selaras dengan database.
        $tahunList = DB::table('data_pip')->distinct()->orderByDesc('tahun')->pluck('tahun');
        
        // Perbaikan pengurutan jenjang sesuai hierarki pendidikan (SD, SMP, SMA, SMK)
        $urutanJenjang = ['SD', 'SMP', 'SMA', 'SMK'];
        $jenjangList = DB::table('data_pip')
            ->whereNotNull('jenjang')
            ->distinct()
            ->pluck('jenjang')
            ->sortBy(function ($jenjang) use ($urutanJenjang) {
                $pos = array_search($jenjang, $urutanJenjang);
                return $pos !== false ? $pos : 99; // Jika ada jenjang lain, ditaruh di urutan paling belakang
            })
            ->values(); // Mereset indeks array

        $provinsiList = DB::table('data_pip')->whereNotNull('provinsi')->where('provinsi', '!=', '')->distinct()->orderBy('provinsi')->pluck('provinsi');
        $kabupatenList = DB::table('data_pip')
            ->when($provinsi !== 'Semua', fn ($q) => $q->where('provinsi', $provinsi))
            ->whereNotNull('kabupaten')->where('kabupaten', '!=', '')->distinct()->orderBy('kabupaten')->pluck('kabupaten');
        $kecamatanList = DB::table('data_pip')
            ->when($provinsi !== 'Semua', fn ($q) => $q->where('provinsi', $provinsi))
            ->when($kabupaten !== 'Semua', fn ($q) => $q->where('kabupaten', $kabupaten))
            ->whereNotNull('kecamatan')->where('kecamatan', '!=', '')->distinct()->orderBy('kecamatan')->pluck('kecamatan');

        // Query dasar dari tabel data_pip.
        $query = DB::table('data_pip');

        // 3. Terapkan filter berdasarkan input user
        if ($tahun !== 'Semua') {
            $query->where('tahun', $tahun);
        }

        if ($jenjang !== 'Semua') {
            $query->where('jenjang', $jenjang);
        }

        // Filter Hirarki Wilayah
        if ($wilayah === 'Provinsi' && $provinsi !== 'Semua') {
            $query->where('provinsi', $provinsi);
        } elseif ($wilayah === 'Kabupaten') {
            if ($provinsi !== 'Semua') $query->where('provinsi', $provinsi);
            if ($kabupaten !== 'Semua') $query->where('kabupaten', $kabupaten);
        } elseif ($wilayah === 'Kecamatan') {
            if ($provinsi !== 'Semua') $query->where('provinsi', $provinsi);
            if ($kabupaten !== 'Semua') $query->where('kabupaten', $kabupaten);
            if ($kecamatan !== 'Semua') $query->where('kecamatan', $kecamatan);
        }

        // Pencarian Kata Kunci (Nama Daerah / Wilayah)
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('provinsi', 'like', '%' . $search . '%')
                  ->orWhere('kabupaten', 'like', '%' . $search . '%')
                  ->orWhere('kecamatan', 'like', '%' . $search . '%');
            });
        }

        // 4. Buat clone query untuk menghitung Grand Total keseluruhan filter aktif
        $totalQuery = clone $query;
        $totalAlokasiDanaRaw = $totalQuery->sum('nominal_dana');
        $totalDanaDisalurkanRaw = (clone $totalQuery)->where('status_aktivasi', 'Sudah Aktivasi')->sum('nominal_dana');

        $grandTotal = (object) [
            'alokasi_dana'    => $totalAlokasiDanaRaw,
            'alokasi_siswa'   => (clone $totalQuery)->count(), // Diperbaiki dari -> menjadi =>
            'dana_disalurkan' => $totalDanaDisalurkanRaw,
            'sisa_dana'       => $totalAlokasiDanaRaw - $totalDanaDisalurkanRaw,
            'progres_dana'    => $totalAlokasiDanaRaw > 0 ? ($totalDanaDisalurkanRaw / $totalAlokasiDanaRaw) * 100 : 0,
        ];

        // 5. Query agregasi rekap per jenjang dengan batasan Top 10 baris terbesar
        $dataRekap = $query->select('jenjang')
            ->selectRaw('COUNT(*) as alokasi_siswa')
            ->selectRaw("SUM(CASE WHEN status_aktivasi = 'Sudah Aktivasi' THEN nominal_dana ELSE 0 END) as dana_disalurkan")
            ->selectRaw("SUM(CASE WHEN status_aktivasi != 'Sudah Aktivasi' THEN nominal_dana ELSE 0 END) as sisa_dana")
            ->selectRaw('SUM(nominal_dana) as alokasi_dana')
            ->groupBy('jenjang')
            ->orderBy('alokasi_dana', 'desc')
            ->limit(10) // Ambil 10 baris terbesar
            ->get();

        return view('admin.rekapdinamis', compact(
            'dataRekap',
            'grandTotal',
            'tahun',
            'jenjang',
            'wilayah',
            'tahunList',
            'jenjangList',
            'provinsiList',
            'kabupatenList',
            'kecamatanList'
        ));
    }
}
