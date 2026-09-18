<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Form Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses Authentikasi Login Real
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();            
            // Redirect Otomatis Berdasarkan Role Pengguna
            if ($user->role === 'sekolah') {
                return redirect()->intended(route('sekolah.dashboard'));
            } elseif ($user->role === 'dinas') {
                return redirect()->intended(route('dinas.dashboard'));
            } elseif ($user->role === 'admin_pusat') {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->route('public.home');
        }

        return back()->withErrors([
            'username' => 'Username atau password yang Anda masukkan salah.',
        ])->onlyInput('username');
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('public.home');
    }
}