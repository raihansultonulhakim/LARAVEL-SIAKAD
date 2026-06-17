<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Hapus atau komentari baris factory bawaan yang lama
    // User::factory()->create([...]);

    // Bikin data user baru sesuai keinginan kamu
    \App\Models\User::create([
        'name' => 'Raihan',
        'email' => 'raihanhakim@gmail.com', // <-- Ganti pakai emailmu
        'password' => \Illuminate\Support\Facades\Hash::make('raihan123'), // <-- Ganti pakai passwordmu
        'role' => 'admin', // <-- Ambil contoh dari migration-mu yang ada kolom role
    ]);
}
}
