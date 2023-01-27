<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'brand_name' => 'Kitchen',
            'brand_image' => 'tb1.png',
        ]);

        Brand::create([
            'brand_name' => 'Household',
            'brand_image' => 'tb2.png',
        ]);
    }
}
