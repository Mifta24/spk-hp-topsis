<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a user with the role of admin
        User::create([
            'name' => 'Admin',  // Tambahkan name jika diperlukan
            'email' => 'admin@phone.com',
            'password' => Hash::make('password'), // Gunakan Hash::make()
        ]);
    }
}
