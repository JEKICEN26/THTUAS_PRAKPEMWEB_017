<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Kategori (Tetap ada)
        Category::create(['name' => 'IT & Jaringan']);
        Category::create(['name' => 'Kebersihan']);
        Category::create(['name' => 'Fasilitas Kelas']);
        Category::create(['name' => 'Sarana & Prasarana']);

        // 2. Akun ADMIN (Tetap ada untuk shortcut)
        User::create([
            'name' => 'Pak Admin',
            'email' => 'admin@kampus.id',
            'password' => Hash::make('password'),
            'is_admin' => true, 
        ]);
        
        // MAHASISWA DIHAPUS DARI SINI
        // Karena mereka akan register sendiri.
    }
}