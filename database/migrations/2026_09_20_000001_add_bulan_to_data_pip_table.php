<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('data_pip', fn (Blueprint $table) => $table->unsignedTinyInteger('bulan')->nullable()->after('tahun'));
    }

    public function down(): void
    {
        Schema::table('data_pip', fn (Blueprint $table) => $table->dropColumn('bulan'));
    }
};
