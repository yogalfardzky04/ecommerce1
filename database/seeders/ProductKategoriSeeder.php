<?php

namespace Database\Seeders;

use App\models\ProductKategori;
use Illuminate\Database\Seeder;

class ProductKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductKategori::updateOrCreate ([
        'name' => 'Pakaian Pria',
        ]);

        ProductKategori::updateOrCreate ([
        'name' => 'Pakaian Wanita',
        ]);

       	ProductKategori::updateOrCreate ([
        'name' => 'Laptop',
        ]);

        ProductKategori::updateOrCreate ([
        'name' => 'Smartphone',
        ]);

        ProductKategori::updateOrCreate ([
        'name' => 'Komputer',
        ]);
    }
}
