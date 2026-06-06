<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Petugas Perpustakaan',
            'email' => 'Petugas@polibatam.ac.id',
            'nim' => '202601',
            'tipe_keanggotaan' => 'admin',
            'password' => Hash::make('123'),
            'tgl_daftar' => date('Y-m-d')
        ]);
    }
}