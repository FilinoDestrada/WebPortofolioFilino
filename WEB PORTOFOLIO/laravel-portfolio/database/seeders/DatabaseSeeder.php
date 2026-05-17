<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat user admin default (sama seperti yang sudah ada sebelumnya)
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
        ]);
    }
}
