<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::updateOrCreate ([
        'name' => 'Monitor',
        'user_id' => '3',
    ] , [
        'description' => 'Monitor LCD',
        'price' => 1000000,
        'stok' => 30,
        'photo' => '',
        ]);

        Product::updateOrCreate ([
        'name' => 'Keyboard',
        'user_id' => '5',
    ] , [
        'description' => 'Keyboard LED RGB',
        'price' => 600000,
        'stok' => 20,
        'photo' => '',
        ]);

        Product::updateOrCreate ([
        'name' => 'Mouse',
        'user_id' => '6',
    ] , [
        'description' => 'Mouse Gaming RGB',
        'price' => 200000,
        'stok' => 30,
        'photo' => '',
        ]);
    }
}
