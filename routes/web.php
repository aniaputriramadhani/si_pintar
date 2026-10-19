<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PublicPenyaluranController;

// Sekolah Controllers
use App\Http\Controllers\Sekolah\SekolahController;
use App\Http\Controllers\Sekolah\DataPipController as SekolahDataPipController;
use App\Http\Controllers\Sekolah\SekolahVerifikasiController;
use App\Http\Controllers\Sekolah\KonfirmasiController;
use App\Http\Controllers\Sekolah\PengembalianNegaraController;
use App\Http\Controllers\Sekolah\SekolahDokumenController;
use App\Http\Controllers\Sekolah\SekolahPengaduanController;
use App\Http\Controllers\Sekolah\CetakSuratController;

// Dinas Controllers
use App\Http\Controllers\Dinas\DinasController;
use App\Http\Controllers\Dinas\DataPipController as DinasDataPipController;
use App\Http\Controllers\Dinas\PemantauanController as DinasPemantauanController;
use App\Http\Controllers\Dinas\RekapController;
use App\Http\Controllers\Dinas\DinasVerifikasiController;
use App\Http\Controllers\Dinas\DinasDokumenController;
use App\Http\Controllers\Dinas\PengaduanController;
use App\Http\Controllers\Dinas\StatusController;
use App\Http\Controllers\Dinas\PenggunaController;
use App\Http\Controllers\Dinas\DinasPengaturanController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataPipController as AdminDataPipController;
use App\Http\Controllers\Admin\PemantauanController as AdminPemantauanController;
use App\Http\Controllers\Admin\RekapDinamisController;
use App\Http\Controllers\Admin\VerifikasiController;
use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\MonitoringBankController;
use App\Http\Controllers\Admin\PengelolaanPenggunaController;
use App\Http\Controllers\Admin\PengaturanController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('public.home');

Route::get('/pencarian-nisn', [PublicController::class, 'searchNisn'])
    ->name('public.nisn');

// Route Penyaluran PIP (Menuju Controller Baru)
Route::get('/penyaluran/nasional', [PublicPenyaluranController::class, 'nasional'])
    ->name('public.penyaluran.nasional');

Route::get('/penyaluran/wilayah', [PublicPenyaluranController::class, 'wilayah'])
    ->name('public.penyaluran.wilayah');


/*
|--------------------------------------------------------------------------
| GUEST
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');
});


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');


    /*
    |--------------------------------------------------------------------------
    | SEKOLAH
    |--------------------------------------------------------------------------
    */

    Route::prefix('sekolah')
        ->middleware('role:sekolah')
        ->group(function () {

            Route::get('/dashboard', [SekolahController::class, 'dashboard'])
                ->name('sekolah.dashboard');

            // Layanan PIP & Administrasi Sekolah
            Route::get('/data-pip', [SekolahDataPipController::class, 'index'])
                ->name('sekolah.data-pip');

            Route::get('/verifikasi', [SekolahVerifikasiController::class, 'index'])
                ->name('sekolah.verifikasi');

            Route::get('/konfirmasi', [KonfirmasiController::class, 'index'])
                ->name('sekolah.konfirmasi');

            Route::get('/pengembalian-negara', [PengembalianNegaraController::class, 'index'])
                ->name('sekolah.pengembalian-negara');

            Route::get('/dokumen', [SekolahDokumenController::class, 'index'])
                ->name('sekolah.dokumen');

            Route::get('/pengaduan', [SekolahPengaduanController::class, 'index'])
                ->name('sekolah.pengaduan');

            Route::get('/cetak-surat', [CetakSuratController::class, 'index'])
                ->name('sekolah.cetak-surat');

            // Kelola Siswa
            Route::get('/siswa/{nisn}', [SekolahController::class, 'detailSiswa'])
                ->name('sekolah.siswa.detail');

            Route::post('/siswa/{nisn}/upload', [SekolahController::class, 'uploadBerkas'])
                ->name('sekolah.siswa.upload');

        });


    /*
    |--------------------------------------------------------------------------
    | DINAS
    |--------------------------------------------------------------------------
    */

    Route::prefix('dinas')
    ->as('dinas.')
    ->middleware('role:dinas')
    ->group(function () {

        Route::get('/dashboard', [DinasController::class, 'dashboard'])->name('dashboard');
        Route::get('/pip', [DinasDataPipController::class, 'index'])->name('datapip');
        Route::get('/verifikasi', [DinasVerifikasiController::class, 'index'])->name('verifikasi');
        Route::get('/pemantauan', [DinasPemantauanController::class, 'index'])->name('pemantauan');
        Route::get('/rekap', [DinasController::class, 'rekap'])->name('rekap');
        Route::get('/dokumen', [DinasDokumenController::class, 'index'])->name('dokumen');
        
        // Route Status & Riwayat Unduhan (Menghilangkan error 404)
        Route::get('/status', [StatusController::class, 'index'])->name('status');
        Route::get('/status/download/{filename}', [StatusController::class, 'download'])->name('status.download');

        // Route Pengguna & Pemberitahuan
        Route::get('/pengguna', [DinasController::class, 'pengguna'])->name('pengguna');
        Route::get('/pemberitahuan', [DinasController::class, 'pemberitahuan'])->name('pemberitahuan');
        
        // Route Pengaduan (Menggunakan PengaduanController)
        Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan');
        Route::post('/pengaduan/{noTiket}/reply', [PengaduanController::class, 'reply'])->name('pengaduan.reply');

        // Pengaturan & Profile
        Route::get('/pengaturan', [DinasController::class, 'pengaturan'])->name('pengaturan');
        Route::get('/profile', [DinasController::class, 'profile'])->name('profile');

    });


    /*
    |--------------------------------------------------------------------------
    | ADMIN PUSAT
    |--------------------------------------------------------------------------
    */

    Route::prefix('admin')
        ->middleware('role:admin_pusat')
        ->group(function () {

            /*
            | Dashboard
            */
            Route::get('/dashboard', [DashboardController::class, 'index'])
                ->name('admin.dashboard');


            /*
            | Data PIP
            */
            Route::get('/pip', [AdminDataPipController::class, 'index'])
                ->name('pip.index');


            /*
            | Pemantauan
            */
            Route::get('/pemantauan', [AdminPemantauanController::class, 'index'])
                ->name('admin.pemantauan');


            /*
            | Rekap Dinamis & Ekspor Data
            */
            Route::get('/rekap', [RekapDinamisController::class, 'index'])
                ->name('rekap.dinamis'); // Disesuaikan agar cocok dengan file Blade

            Route::get('/rekap/export', [RekapDinamisController::class, 'exportExcel'])
                ->name('admin.rekap.export');


            /*
            | Verifikasi
            */
            Route::get('/verifikasi', [VerifikasiController::class, 'index'])
                ->name('admin.verifikasi');


            /*
            | Dokumen
            */
            Route::get('/dokumen', [DokumenController::class, 'index'])
                ->name('admin.dokumen');


            /*
            | Layanan
            */
            Route::get('/layanan', [LayananController::class, 'index'])
                ->name('admin.layanan');


            /*
            | Monitoring Bank
            */
            Route::get('/bank', [MonitoringBankController::class, 'index'])
                ->name('admin.bank');


            /*
            | Pengelolaan Pengguna
            */
            Route::get('/pengguna', [PengelolaanPenggunaController::class, 'index'])
                ->name('admin.pengguna');


            /*
            | Pengaturan Sistem
            */
            Route::get('/sistem', [PengaturanController::class, 'index'])
                ->name('admin.pengaturan');

        });

});