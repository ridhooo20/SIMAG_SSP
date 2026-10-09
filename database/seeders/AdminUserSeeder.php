<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ssp.id'],
            [
                'name' => 'Admin SSP',
                'role' => 'admin',
                'password' => Hash::make('Admin123'),
            ]
        );
    }
}