<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;
class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'title' => 'Community Center',
            'sub_title' => 'There is no power for change greater than a community',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur hicodio voluptatem tenetur consequatur.',
            'image' => 'slider1.jpg',
            'status' => 'active',
        ]);

        Slider::create([
            'title' => 'Community Center',
            'sub_title' => 'Become the change you want to see',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur hicodio voluptatem tenetur consequatur.',
            'image' => 'slider2.jpg',
            'status' => 'active',
        ]);

        Slider::create([
            'title' => 'Community Center',
            'sub_title' => 'There is no power for change greater than a community',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur hicodio voluptatem tenetur consequatur.',
            'image' => 'slider3.jpg',
            'status' => 'active',
        ]);
    }
}
