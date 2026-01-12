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
        Category::create(['name' => 'IT & Jaringan']);
        Category::create(['name' => 'Kebersihan']);
        Category::create(['name' => 'Fasilitas Kelas']);
        Category::create(['name' => 'Sarana & Prasarana']);

        User::create([
            'name' => 'Pak Admin',
            'email' => 'admin@kampus.id',
            'password' => Hash::make('password'),
            'is_admin' => true, 
        ]);
    }
}