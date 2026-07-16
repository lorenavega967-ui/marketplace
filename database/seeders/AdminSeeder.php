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
            'name' => 'Admin Marketplace',
            'email' => 'admin@marketplace.com',
            'password' => Hash::make('CambiaEstaClave123!'),
            'rol' => 'admin',
            'activo' => true,
        ]);
    }
}