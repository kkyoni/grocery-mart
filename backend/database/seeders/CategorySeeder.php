<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'New Sale',
        ]);
        Category::create([
            'name' => 'New Brand',
        ]);
        Category::create([
            'name' => 'Best Sale',
        ]);
    }
}
