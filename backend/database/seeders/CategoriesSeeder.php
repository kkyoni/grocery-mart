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
            'categories_name' => 'Meat & Seafood',
        ]);
        Categories::create([
            'brand_id' => '1',
            'categories_name' => 'Snack Foods',
        ]);
        Categories::create([
            'brand_id' => '1',
            'categories_name' => 'Oils, Vinegars',
        ]);
        Categories::create([
            'brand_id' => '1',
            'categories_name' => 'Pasta & Noodles',
        ]);
        Categories::create([
            'brand_id' => '2',
            'categories_name' => 'Detergents',
        ]);
        Categories::create([
            'brand_id' => '2',
            'categories_name' => 'Floor & Other Cleaners',
        ]);
        Categories::create([
            'brand_id' => '2',
            'categories_name' => 'Pet Care',
        ]);
        Categories::create([
            'brand_id' => '2',
            'categories_name' => 'Festive Decoratives',
        ]);
    }
}
