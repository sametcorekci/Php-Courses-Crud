<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // ✅ Hash sınıfını ekle

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('1'), // ✅ şifreyi hashleyerek kaydediyoruz
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Yonetici',
            'email' => 'yonetici@site.com',
            'password' => Hash::make('yonetici123'),
            'role' => 'manager',
        ]);

        User::create([
            'name' => 'Kullanici',
            'email' => 'kullanici@site.com',
            'password' => Hash::make('kullanici123'),
            'role' => 'user',
        ]);
    }
}
