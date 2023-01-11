<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'avatar' => 'default.png',
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('data@1234'),
            'user_type' => 'superadmin',
            'status' => 'active',
        ]);
        User::create([
            'avatar' => 'default.png',
            'first_name' => 'Jaymin',
            'last_name' => 'Modi',
            'email' => 'jaymin@gmail.com',
            'password' => bcrypt('data@1234'),
            'user_type' => 'user',
            'status' => 'active',
        ]);
        User::create([
            'avatar' => 'default.png',
            'first_name' => 'Sagar',
            'last_name' => 'Darji',
            'email' => 'sagar@gmail.com',
            'password' => bcrypt('data@1234'),
            'user_type' => 'user',
            'status' => 'active',
        ]);
        User::create([
            'avatar' => 'default.png',
            'first_name' => 'Jainam',
            'last_name' => 'Darji',
            'email' => 'jainam@gmail.com',
            'password' => bcrypt('data@1234'),
            'user_type' => 'user',
            'status' => 'active',
        ]);
        User::create([
            'avatar' => 'default.png',
            'first_name' => 'Bharat',
            'last_name' => 'Mevada',
            'email' => 'bharat@gmail.com',
            'password' => bcrypt('data@1234'),
            'user_type' => 'user',
            'status' => 'active',
        ]);
    }
}
