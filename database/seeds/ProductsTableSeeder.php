<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'title' => 'Cлайдер на водной основе #5534',
                'slug' => 'clajder-na-vodnoj-osnove-5534',
                'text' => 'Сладйеры на водной основе - самый легкий и быстрый вариант дизайна.',
                'category_id' => 4,
                'image' => 'products/clajder-na-vodnoj-osnove-5534.jpg',
                'price' => 13
            ],
            [
                'title' => 'Cлайдер на водной основе #5603',
                'slug' => 'clajder-na-vodnoj-osnove-5603',
                'text' => 'Сладйеры на водной основе - самый легкий и быстрый вариант дизайна.',
                'category_id' => 4,
                'image' => 'products/clajder-na-vodnoj-osnove-5603.jpg',
                'price' => 13
            ],
            [
                'title' => 'Cлайдер на водной основе #5530',
                'slug' => 'clajder-na-vodnoj-osnove-5530',
                'text' => 'Сладйеры на водной основе - самый легкий и быстрый вариант дизайна.',
                'category_id' => 4,
                'image' => 'products/clajder-na-vodnoj-osnove-5530.jpg',
                'price' => 13
            ],
            [
                'title' => 'Cлайдер на водной основе #2300',
                'slug' => 'clajder-na-vodnoj-osnove-2300',
                'text' => 'Сладйеры на водной основе - самый легкий и быстрый вариант дизайна.',
                'category_id' => 4,
                'image' => 'products/clajder-na-vodnoj-osnove-2300.jpg',
                'price' => 13
            ],
            [
                'title' => 'Полигель камуфляж Glory nails #002',
                'seo_h1' => 'Акриловый гель (полигель) Glory nails #002',
                'slug' => 'poligel-kamufljazh-glory-nails-002',
                'category_id' => 2,
                'image' => 'products/poligel-kamufljazh-glory-nails-002.jpg',
                'price' => 180
            ],
            [
                'title' => 'Полигель камуфляж Glory nails #003',
                'seo_h1' => 'Акриловый гель (полигель) Glory nails #003',
                'slug' => 'poligel-kamufljazh-glory-nails-003',
                'category_id' => 2,
                'image' => 'products/poligel-kamufljazh-glory-nails-003.jpg',
                'price' => 180
            ],
            [
                'title' => 'Гель лак кошачий глаз Glory nails #1',
                'slug' => 'gel-lak-koshachij-glaz-glory-nails-1',
                'category_id' => 3,
                'image' => 'products/gel-lak-koshachij-glaz-glory-nails-1.jpg',
                'price' => 85,
                'status' => 0
            ],
        ]);
    }
}
