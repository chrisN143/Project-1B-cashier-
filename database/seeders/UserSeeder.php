<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('123')
        ]);

        $superadmin->assignRole(['Superadmin']);
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('456')
        ]);

        $admin->assignRole(['Admin']);
        $user = User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('abc')
        ]);
        $user->assignRole(['User']);
    }
}
