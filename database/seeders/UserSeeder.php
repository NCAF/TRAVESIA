<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password1'), // Ganti 'password1' dengan kata sandi yang Anda inginkan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User1',
                'email' => 'user1@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password2'), // Ganti 'password2' dengan kata sandi yang Anda inginkan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rizqi',
                'email' => 'rizqi@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('19september'), // Ganti 'password3' dengan kata sandi yang Anda inginkan
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
