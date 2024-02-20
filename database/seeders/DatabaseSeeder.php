<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Store;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class
        ]);
        Store::create([
            'store_name' => 'Elektronik',
        ],[
            'store_name' => 'Gaming',
        ],[
            'store_name' => 'Wearable',
        ]);
    }
}
