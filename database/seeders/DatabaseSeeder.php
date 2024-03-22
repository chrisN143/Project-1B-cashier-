<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Store;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

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
        Transaction::create([
            'payment_method' => 'OVO',
        ]);
        Transaction::create([
            'payment_method' => 'Cash',
        ]);
        Transaction::create([
            'payment_method' => 'BCA',
        ]);
        Transaction::create([
            'payment_method' => 'GoPay',
        ]);
        Product::create([

            'code' => 'Product-' . Str::random(10),
            'stok' => '20',
            'name' => 'Headphone',
            'Price' => '129000',
            'store_id' => '3',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias error enim voluptates tenetur delectus ducimus quia, nulla reiciendis ullam debitis!'
        ]);
        Product::create([

            'code' => 'Product-' . Str::random(10),
            'name' => 'Black Mechanical Keyboard',
            'stok' => '20',
            'Price' => '279000',
            'store_id' => '2',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias error enim voluptates tenetur delectus ducimus quia!'
        ]);
        Product::create([

            'code' => 'Product-' . Str::random(10),
            'name' => 'Kulkas',
            'stok' => '20',
            'Price' => '2729000',
            'store_id' => '1',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias error enim voluptates tenetur delectus ducimus quia!'
        ]);
        Product::create([

            'code' => 'Product-' . Str::random(10),
            'name' => 'Bakso',
            'stok' => '20',
            'Price' => '1999000',
            'store_id' => '4',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias error enim voluptates tenetur delectus ducimus quia!'
        ]);
        Product::create([

            'code' => 'Product-' . Str::random(10),
            'name' => 'Xbox Gamepad',
            'Price' => '169000',
            'stok' => '20',

            'store_id' => '2',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias error enim voluptates tenetur delectus ducimus quia!'
        ]);
        Product::create([

            'code' => 'Product-' . Str::random(10),
            'name' => 'Ayam Goreng',
            'Price' => '999000',
            'stok' => '20',

            'store_id' => '4',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias error enim voluptates tenetur delectus ducimus quia!'
        ]);
        Product::create([

            'code' => 'Product-' . Str::random(10),
            'name' => 'Mac Book',
            'Price' => '1299999',
            'stok' => '20',

            'store_id' => '3',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias error enim voluptates tenetur delectus ducimus quia!'
        ]);
        Product::create([

            'code' => 'Product-' . Str::random(10),
            'name' => 'Keyboard RGB',
            'Price' => '5000000',
            'stok' => '20',
            'store_id' => '3',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias error enim voluptates tenetur delectus ducimus quia!'
        ]);
        Product::create([

            'code' => 'Product-' . Str::random(10),
            'name' => 'MI SMART Beands',
            'Price' => '4600000',
            'stok' => '20',
            'store_id' => '3',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias error enim voluptates tenetur delectus ducimus quia!'
        ]);
        Product::create([

            'code' => 'Product-' . Str::random(10),
            'name' => 'Fiber Optic',
            'Price' => '1000000',
            'stok' => '20',
            'store_id' => '3',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias error enim voluptates tenetur delectus ducimus quia!'
        ]);
    }
}
