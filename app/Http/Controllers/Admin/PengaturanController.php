<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    /**
     * Menampilkan halaman Pengaturan Sistem / Profil.
     */
    public function index()
    {
        $profile = [
            'name'  => 'Admin Pusat SIPINTAR',
            'email' => 'admin.pusat@kemdikbud.go.id',
            'role'  => 'Admin Pusat',
            'phone' => '0812-3456-7890',
        ];

        $appConfig = [
            'app_name'      => 'SIPINTAR',
            'maintenance'   => false,
            'max_file_size' => '10 MB',
            'tahun_ajaran'  => '2025/2026',
        ];

        return view('admin.pengaturan', compact('profile', 'appConfig'));
    }

    public function update(Request $request)
    {
        return back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}