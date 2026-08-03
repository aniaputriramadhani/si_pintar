<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. User Sekolah
        User::create([
            'name' => 'Operator SMK Negeri 1',
            'username' => 'sekolah',
            'password' => Hash::make('123456'),
            'role' => 'sekolah',
        ]);

        // 2. User Dinas
        User::create([
            'name' => 'Dinas Pendidikan DKI',
            'username' => 'dinas',
            'password' => Hash::make('123456'),
            'role' => 'dinas',
        ]);

        // 3. User Admin Pusat
        User::create([
            'name' => 'Admin Pusat (Mas Nur)',
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'role' => 'admin_pusat',
        ]);
    }
}