<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| 1. Rute Publik (Bisa Diakses Siapa Saja Tanpa Login)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('public.home');

Route::get('/pencarian-nisn', [PublicController::class, 'searchNisn'])->name('public.nisn');

/*
|--------------------------------------------------------------------------
| 2. Jalur Menuju Login (Khusus Pengguna yang Belum Login / Guest)
|--------------------------------------------------------------------------
*/
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

/*
|--------------------------------------------------------------------------
| 3. Rute Area Terproteksi (Hanya Bisa Diakses Setelah Login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Tombol / Jalur Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // --- Area Sekolah ---
    Route::prefix('sekolah')->group(function () {
        Route::get('/dashboard', [SekolahController::class, 'dashboard'])->name('sekolah.dashboard');
        Route::get('/siswa', [SekolahController::class, 'indexSiswa'])->name('sekolah.siswa.index');
        Route::get('/siswa/{nisn}', [SekolahController::class, 'detailSiswa'])->name('sekolah.siswa.detail');
        Route::post('/siswa/{nisn}/upload', [SekolahController::class, 'uploadBerkas'])->name('sekolah.siswa.upload');
    });

    // --- Area Dinas ---
    Route::prefix('dinas')->group(function () {
        Route::get('/dashboard', [DinasController::class, 'dashboard'])->name('dinas.dashboard');
        Route::get('/pengaduan', [DinasController::class, 'pengaduan'])->name('dinas.pengaduan');
        Route::get('/rekap-dinamis', [DinasController::class, 'rekapDinamis'])->name('dinas.rekap');
    });

    // --- Area Admin Pusat ---
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        // Tambahan Rute Akses Cepat Dashboard Admin
        Route::get('/program', [AdminController::class, 'programIndex'])->name('program.index');
        Route::get('/pip', [AdminController::class, 'pipIndex'])->name('pip.index');
    });

});