<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Faq;
use App\Models\Cms;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Setting;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(CmsSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
