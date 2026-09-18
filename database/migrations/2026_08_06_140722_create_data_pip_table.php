<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_pip', function (Blueprint $table) {
            $table->id();
            $table->year('tahun')->default('2026');
            $table->string('nisn', 20)->index();
            $table->string('nama_siswa');
            $table->string('nama_sekolah');
            $table->string('npsn', 20);
            $table->string('jenjang', 20); // Contoh: SD, SMP, SMA, SMK
            $table->string('no_sk');
            $table->string('status_sk')->default('SK Penetapan'); // Kolom status_sk (Contoh: SK Penetapan, SK Pembatalan)
            $table->decimal('nominal_dana', 12, 2); // Menggunakan decimal agar aman untuk nilai uang
            $table->string('status_aktivasi')->default('Belum Aktivasi'); // Contoh: Sudah Aktivasi, Belum Aktivasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pip');
    }
};