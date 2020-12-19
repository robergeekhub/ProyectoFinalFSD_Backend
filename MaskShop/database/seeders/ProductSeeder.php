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
        $products = [
            [
            'id' => null,
            'name' => 'GTA V ',
            'description' => 'Grand Theft Auto V Premium Edition PS4',
            'price' => 22.69,
            'image_path' => 'gta.jpg',
            ]
        ];
        foreach ($products as $product) {
        DB::table('products')->insert($product);
    }
}
}