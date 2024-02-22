<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Seeder;
use Stringable;
use Illuminate\Support\Str;


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


        ]);
        Store::create([

            'store_name' => 'Gaming',

        ]);
        Store::create([

            'store_name' => 'Wearable',
        ]);
        Store::create([
            'store_name' => 'Makanan',
        ]);
        Product::create([

            'code' => 'Product-' . Str::random(10),
            'name' => 'Headphone',
            'Price' => '129000',
            'store_id' => '3',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias error enim voluptates tenetur delectus ducimus quia, nulla reiciendis ullam debitis!'
        ]);
        Product::create([

            'code' => 'Product-' . Str::random(10),
            'name' => 'Black Mechanical Keyboard',
            'Price' => '279000',
            'store_id' => '2',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias error enim voluptates tenetur delectus ducimus quia!'
        ]);
        Product::create([

            'code' => 'Product-' . Str::random(10),
            'name' => 'Xbox Gamepad',
            'Price' => '169000',
            'store_id' => '2',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias error enim voluptates tenetur delectus ducimus quia!'
        ]);
        Product::create([

            'code' => 'Product-' . Str::random(10),
            'name' => 'Ayam Goreng',
            'Price' => '999000',
            'store_id' => '4',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias error enim voluptates tenetur delectus ducimus quia!'
        ]);
    }
}
