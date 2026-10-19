<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('data_pip', function (Blueprint $table) {
            $table->string('provinsi')->nullable()->after('jenjang');
            $table->string('kabupaten')->nullable()->after('provinsi');
            $table->string('kecamatan')->nullable()->after('kabupaten');
        });
    }

    public function down(): void
    {
        Schema::table('data_pip', function (Blueprint $table) {
            $table->dropColumn(['provinsi', 'kabupaten', 'kecamatan']);
        });
    }
};
