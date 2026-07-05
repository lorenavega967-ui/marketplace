<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DuenoSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Dueño Prueba',
            'email' => 'dueno@marketplace.com',
            'password' => Hash::make('dueno1234'),
            'rol' => 'dueño',
            'activo' => true,
        ]);
    }
}