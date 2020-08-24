<?php

use Illuminate\Database\Seeder;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offers')->insert([
            [
                'product_id' => 5,
                'title' => '15 мл',
                'price' => 180
            ],
            [
                'product_id' => 5,
                'title' => '30 мл',
                'price' => 300
            ],
            [
                'product_id' => 5,
                'title' => '50 мл',
                'price' => 450
            ],
            [
                'product_id' => 6,
                'title' => '15 мл',
                'price' => 180
            ],
            [
                'product_id' => 6,
                'title' => '30 мл',
                'price' => 300
            ],
            [
                'product_id' => 6,
                'title' => '50 мл',
                'price' => 450
            ]
        ]);
    }
}
