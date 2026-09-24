<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@pantaiwabokeo.id'], // Kunci unik pencarian
            [
                'name' => 'Administrator Pantai Wabokeo',
                'password' => Hash::make('admin123'), // Ganti dengan password yang aman
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );
    }
}
