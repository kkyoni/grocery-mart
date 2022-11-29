<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::create([
            'title' => 'Sed do eiusmod tem ut',
            'description' => 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.',
            'image' =>'blog1.jpg',
            'status' =>'active',
        ]);
        Blog::create([
            'title' => 'Labore et magna qua',
            'description' => 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.',
            'image' =>'blog2.jpg',
            'status' =>'active',
        ]);
        Blog::create([
            'title' => 'Ut enim ad minim veniam',
            'description' => 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.',
            'image' =>'blog3.jpg',
            'status' =>'active',
        ]);
        Blog::create([
            'title' => 'Sed do eiusmod tem ut',
            'description' => 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.',
            'image' =>'blog4.jpg',
            'status' =>'active',
        ]);
        Blog::create([
            'title' => 'Labore et magna qua',
            'description' => 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.',
            'image' =>'blog5.jpg',
            'status' =>'active',
        ]);
        Blog::create([
            'title' => 'Ut enim ad minim veniam',
            'description' => 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.',
            'image' =>'blog6.jpg',
            'status' =>'active',
        ]);
        Blog::create([
            'title' => 'Sed do eiusmod tem ut',
            'description' => 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.',
            'image' =>'blog7.jpg',
            'status' =>'active',
        ]);
        Blog::create([
            'title' => 'Labore et magna qua',
            'description' => 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.',
            'image' =>'blog8.jpg',
            'status' =>'active',
        ]);
        Blog::create([
            'title' => 'Sed do eiusmod tem ut',
            'description' => 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.',
            'image' =>'blog9.jpg',
            'status' =>'active',
        ]);
        Blog::create([
            'title' => 'Labore et magna qua',
            'description' => 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.',
            'image' =>'blog10.jpg',
            'status' =>'active',
        ]);
        Blog::create([
            'title' => 'Ut enim ad minim veniam',
            'description' => 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.',
            'image' =>'blog11.jpg',
            'status' =>'active',
        ]);
    }
}
