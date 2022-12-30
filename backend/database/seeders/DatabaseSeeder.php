<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BlogSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(CmsSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductImageSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(UserSeeder::class);
    }
}
