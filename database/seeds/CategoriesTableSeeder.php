<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'Набор для наращивания',
                'slug' => 'nabor-dlja-narashhivanija',
                'image' => 'categories/nabor-dlja-narashhivanija.jpg',
                'is_featured' => 1,
            ],
            [
                'title' => 'Гель для дизайна ногтей',
                'slug' => 'gel-dlja-dizajna-nogtej',
                'image' => 'categories/gel-dlja-dizajna-nogtej.jpg',
                'is_featured' => 1,
            ],
            [
                'title' => 'Гель лак',
                'slug' => 'gel-lak',
                'image' => 'categories/gel-lak.jpg',
                'is_featured' => 1,
            ],

            [
                'title' => 'Материалы для дизайна ногтей',
                'slug' => 'materialy-dlja-dizajna-nogtej',
                'image' => 'categories/materialy-dlja-dizajna-nogtej.jpg',
                'is_featured' => 1,
            ],
            [
                'title' => 'Пилки и бафы',
                'slug' => 'pilki-i-bafy',
                'image' => 'categories/pilki-i-bafy.jpg',
                'is_featured' => 1,
            ],
            [
                'title' => 'Аппаратный маникюр и педикюр',
                'slug' => 'apparatnyj-manikjur-i-pedikjur',
                'image' => 'categories/apparatnyj-manikjur-i-pedikjur.jpg',
                'is_featured' => 1,
            ],

            [
                'title' => 'Уход за кутикулой',
                'slug' => 'uhod-za-kutikuloj',
                'image' => 'categories/uhod-za-kutikuloj.jpg',
                'is_featured' => 1,
            ],
            [
                'title' => 'Стемпинг',
                'slug' => 'stemping',
                'image' => 'categories/stemping.jpg',
                'is_featured' => 1,
            ],
            [
                'title' => 'Лампа для ногтей',
                'slug' => 'lampa-dlja-nogtej',
                'image' => 'categories/lampa-dlja-nogtej.jpg',
                'is_featured' => 1,
            ],
        ]);
    }
}
