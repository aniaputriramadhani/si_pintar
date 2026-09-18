<?php

namespace App\Http\Controllers\Sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function dashboard()
    {
        $summary = [
            'belum_aktivasi' => 14,
            'nominasi'       => 25,
            'pemberian'      => 40
        ];
        
        return view('sekolah.dashboard', compact('summary'));
    }

    public function detailSiswa($nisn)
    {
        return view('sekolah.siswa-detail', compact('nisn'));
    }

    public function uploadBerkas(Request $request, $nisn)
    {
        $request->validate([
            'berkas_aktivasi' => 'required|mimes:pdf,jpg,png|max:2048',
        ]);

        $path = $request->file('berkas_aktivasi')->store('berkas_aktivasi');

        return back()->with('success', 'Berkas aktivasi berhasil diunggah!');
    }
}