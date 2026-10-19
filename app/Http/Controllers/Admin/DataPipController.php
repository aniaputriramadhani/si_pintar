<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataPipController extends Controller
{
    public function index(Request $request)
    {
        $statusSk = $request->input('status_sk');
        $statusAktivasi = $request->input('status_aktivasi');
        $jenjang = $request->input('jenjang');
        $tahun = $request->input('tahun');
        $bulan = $request->input('bulan');
        $provinsi = $request->input('provinsi', 'Semua');
        $kabupaten = $request->input('kabupaten', 'Semua');
        $kecamatan = $request->input('kecamatan', 'Semua');
        $search = $request->input('search');

        $query = DB::table('data_pip');

        // Apply Dynamic Filters
        if (!empty($statusSk) && $statusSk !== 'Semua') {
            $query->where('status_sk', $statusSk);
        }

        if (!empty($statusAktivasi) && $statusAktivasi !== 'Semua') {
            $query->where('status_aktivasi', $statusAktivasi);
        }

        if (!empty($jenjang) && $jenjang !== 'Semua') {
            $query->where('jenjang', $jenjang);
        }

        if (!empty($tahun) && $tahun !== 'Semua') {
            $query->where('tahun', $tahun);
        }

        if (!empty($bulan) && $bulan !== 'Semua') {
            $query->where('bulan', $bulan);
        }
        if ($provinsi !== 'Semua') {
            $query->where('provinsi', $provinsi);
        }
        if ($kabupaten !== 'Semua') {
            $query->where('kabupaten', $kabupaten);
        }
        if ($kecamatan !== 'Semua') {
            $query->where('kecamatan', $kecamatan);
        }

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nisn', 'like', "%{$search}%")
                  ->orWhere('nama_siswa', 'like', "%{$search}%")
                  ->orWhere('no_sk', 'like', "%{$search}%")
                  ->orWhere('npsn', 'like', "%{$search}%")
                  ->orWhere('nama_sekolah', 'like', "%{$search}%")
                  ->orWhere('provinsi', 'like', "%{$search}%")
                  ->orWhere('kabupaten', 'like', "%{$search}%")
                  ->orWhere('kecamatan', 'like', "%{$search}%");
            });
        }

        $dataPip = $query->latest('id')->paginate(10)->withQueryString();
        $tahunList = DB::table('data_pip')->distinct()->orderByDesc('tahun')->pluck('tahun');
        $jenjangList = DB::table('data_pip')->distinct()->orderBy('jenjang')->pluck('jenjang');
        $statusSkList = DB::table('data_pip')->distinct()->orderBy('status_sk')->pluck('status_sk');
        $provinsiList = DB::table('data_pip')->whereNotNull('provinsi')->distinct()->orderBy('provinsi')->pluck('provinsi');
        $kabupatenList = DB::table('data_pip')->when($provinsi !== 'Semua', fn ($q) => $q->where('provinsi', $provinsi))->whereNotNull('kabupaten')->distinct()->orderBy('kabupaten')->pluck('kabupaten');
        $kecamatanList = DB::table('data_pip')->when($provinsi !== 'Semua', fn ($q) => $q->where('provinsi', $provinsi))->when($kabupaten !== 'Semua', fn ($q) => $q->where('kabupaten', $kabupaten))->whereNotNull('kecamatan')->distinct()->orderBy('kecamatan')->pluck('kecamatan');

        return view('admin.datapip', compact(
            'dataPip',
            'statusSk',
            'statusAktivasi',
            'jenjang',
            'tahun',
            'bulan',
            'search', 'provinsi', 'kabupaten', 'kecamatan', 'tahunList', 'jenjangList',
            'statusSkList', 'provinsiList', 'kabupatenList', 'kecamatanList'
        ));
    }
}
