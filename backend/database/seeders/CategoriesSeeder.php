<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create([
            'brand_id' => '1',
            'categories_name' => 'Ready Meal & Mixes',
        ]);
        Categories::create([
            'brand_id' => '2',
            'categories_name' => 'Food Combo',
        ]);
        Categories::create([
            'brand_id' => '3',
            'categories_name' => 'Kitchen Tools',
        ]);
        Categories::create([
            'brand_id' => '4',
            'categories_name' => 'Cookware',
        ]);
        Categories::create([
            'brand_id' => '5',
            'categories_name' => 'Outdoor Cooking',
        ]);
        Categories::create([
            'brand_id' => '6',
            'categories_name' => 'Hand Juicers',
        ]);
        Categories::create([
            'brand_id' => '1',
            'categories_name' => 'Chocolates',
        ]);
        Categories::create([
            'brand_id' => '2',
            'categories_name' => 'Dry Fruit, Nut & Seed',
        ]);
    }
}
