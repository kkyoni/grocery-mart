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
            'brand_name' => 'Nestle',
            'brand_image' => 'tb1.png',
        ]);

        Brand::create([
            'brand_name' => 'Rowntrees',
            'brand_image' => 'tb2.png',
        ]);

        Brand::create([
            'brand_name' => 'Cadbury',
            'brand_image' => 'tb3.png',
        ]);

        Brand::create([
            'brand_name' => 'Flahavans',
            'brand_image' => 'tb4.png',
        ]);

        Brand::create([
            'brand_name' => 'Baichelors',
            'brand_image' => 'tb5.png',
        ]);

        Brand::create([
            'brand_name' => 'Daily Food',
            'brand_image' => 'tb6.png',
        ]);
    }
}
