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
        User::firstOrCreate(
            ['username' => 'sekolah'],
            [
                'name' => 'Operator SMK Negeri 1',
                'password' => Hash::make('123456'),
                'role' => 'sekolah',
            ]
        );

        // 2. User Dinas
        User::firstOrCreate(
            ['username' => 'dinas'],
            [
                'name' => 'Dinas Pendidikan DKI Jakarta',
                'password' => Hash::make('123456'),
                'role' => 'dinas',
            ]
        );

        // 3. User Admin Pusat
        User::firstOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Admin Pusat SIPINTAR',
                'password' => Hash::make('123456'),
                'role' => 'admin_pusat',
            ]
        );
    }
}