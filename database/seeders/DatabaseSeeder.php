<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Compte;
use Illuminate\Support\Facades\Hash;

public function run()
{
    // Admin
    $admin = User::create([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'phone' => '770000000',
        'role' => 'admin',
        'password' => Hash::make('123456'),
    ]);

    // User
    $user = User::create([
        'name' => 'Alioune',
        'email' => 'alioune@gmail.com',
        'phone' => '771234567',
        'password' => Hash::make('123456'),
    ]);

    // Compte associé
    Compte::create([
        'user_id' => $user->id,
        'solde' => 50000,
    ]);
}
