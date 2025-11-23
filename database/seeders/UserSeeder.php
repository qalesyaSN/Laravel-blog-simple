<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // <--- Jangan lupa import ini buat password

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Akun ADMIN UTAMA (Punya Nunu)
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // Cek: Kalau email ini sudah ada, jangan buat baru
            [
                'name'     => 'Admin Nunu',
                'password' => Hash::make('password'), // Password default: password
                // 'role'  => 'admin', (Kalau nanti ada kolom role, nyalakan ini)
            ]
        );

        // 2. Akun USER BIASA (Buat ngetes login user lain)
        User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name'     => 'User Biasa',
                'password' => Hash::make('password'),
            ]
        );

        // 3. BONUS: Generate 10 User Random (Buat ngetes Pagination nanti)
        // User::factory(10)->create(); 
    }
}
