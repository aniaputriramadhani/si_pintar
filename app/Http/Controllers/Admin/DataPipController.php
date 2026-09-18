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
            $query->where('bulan_sk', $bulan);
        }

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nisn', 'like', "%{$search}%")
                  ->orWhere('nama_siswa', 'like', "%{$search}%")
                  ->orWhere('no_sk', 'like', "%{$search}%")
                  ->orWhere('npsn', 'like', "%{$search}%")
                  ->orWhere('nama_sekolah', 'like', "%{$search}%");
            });
        }

        $dataPip = $query->latest('id')->paginate(10)->withQueryString();

        return view('admin.datapip', compact(
            'dataPip',
            'statusSk',
            'statusAktivasi',
            'jenjang',
            'tahun',
            'bulan',
            'search'
        ));
    }
}