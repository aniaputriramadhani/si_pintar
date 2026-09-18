<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemantauanController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Data PIP
    public function datapip()
    {
        return view('admin.datapip');
    }

    // Pemantauan (Halaman Utama Controller Ini)
    public function index()
    {
        $totalAktivasi = 145200;
        $totalBelum = 32100;
        $persenAktivasi = 81.8;
        
        $wilayahPemantauan = [
            ['provinsi' => 'Jawa Barat', 'target' => 50000, 'tersalur' => 45000, 'persen' => 90],
            ['provinsi' => 'Jawa Timur', 'target' => 48000, 'tersalur' => 41000, 'persen' => 85],
        ];

        return view('admin.pemantauan', compact('totalAktivasi', 'totalBelum', 'persenAktivasi', 'wilayahPemantauan'));
    }

    // Rekap Dinamis
    public function rekap()
    {
        return view('admin.rekapdinamis');
    }

    // Verifikasi
    public function verifikasi()
    {
        return view('admin.verifikasi');
    }

    // Dokumen
    public function dokumen()
    {
        return view('admin.dokumen');
    }

    // Layanan
    public function layanan()
    {
        return view('admin.layanan');
    }

    // Monitoring Bank
    public function bank()
    {
        return view('admin.monitoringbank');
    }

    // Pengelolaan Pengguna
    public function pengguna()
    {
        return view('admin.pengelolaanpengguna');
    }

    // Pengaturan Sistem
    public function sistem()
    {
        return view('admin.pengaturan');
    }
}