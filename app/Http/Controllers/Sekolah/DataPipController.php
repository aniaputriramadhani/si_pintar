<?php

namespace App\Http\Controllers\Sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataPipController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil input filter dari request dengan nilai default
        $statusSk = $request->input('status_sk', 'SK Penetapan');
        $statusAktivasi = $request->input('status_aktivasi', 'Semua');
        $jenjang = $request->input('jenjang', 'Semua');
        $tahun = $request->input('tahun', '2024');
        $bulan = $request->input('bulan', 'Semua'); // Ditambahkan agar sejajar dengan Admin
        $search = $request->input('search');

        $query = DB::table('data_pip');

        // 2. Filter Keamanan NPSN (Wajib Ditempatkan Utama)
        $userNpsn = auth()->user()->npsn ?? null;
        if ($userNpsn) {
            $query->where('npsn', $userNpsn);
        } else {
            // Jika akun sekolah tidak punya NPSN, kunci hasil agar tidak menampilkan data orang lain
            $query->whereRaw('1 = 0'); 
        }

        // 3. Filter berdasarkan kriteria
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

        // 4. Grouped Search Query (Aman dari pembocoran data NPSN)
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nisn', 'like', "%{$search}%")
                  ->orWhere('nama_siswa', 'like', "%{$search}%")
                  ->orWhere('no_sk', 'like', "%{$search}%")
                  ->orWhere('nama_sekolah', 'like', "%{$search}%");
            });
        }

        $dataPip = $query->latest('id')->paginate(10)->withQueryString();

        return view('sekolah.datapip', compact(
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