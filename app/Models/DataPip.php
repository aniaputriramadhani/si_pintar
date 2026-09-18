<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPip extends Model
{
    use HasFactory;

    // Specify your actual database table name if it differs from 'data_pips'
    protected $table = 'data_pip'; 

    protected $fillable = [
        'tahun',
        'nisn',
        'nama_siswa',
        'nama_sekolah',
        'npsn',
        'jenjang',
        'no_sk',
        'nominal_dana',
        'status_aktivasi',
    ];
}