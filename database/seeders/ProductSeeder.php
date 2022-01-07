<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            [
                'name'         => 'Generos',
                'price'        => 375000,
                'discount'     => null,
                'image'        => "",
                'product_link' => "",
            ],
            [
                'name'         => 'Freshmag',
                'price'        => 140000,
                'discount'     => null,
                'image'        => "",
                'product_link' => "",
            ],
            [
                'name'         => 'Gizidat',
                'price'        => 68000,
                'discount'     => null,
                'image'        => "",
                'product_link' => "",
            ],
            [
                'name'         => 'Etawaku',
                'price'        => 75000,
                'discount'     => null,
                'image'        => "",
                'product_link' => "",
            ],
            [
                'name'         => 'Rube',
                'price'        => 250000,
                'discount'     => null,
                'image'        => "",
                'product_link' => "",
            ],
        ];

        DB::table('products')->insert($product);
    }
}
