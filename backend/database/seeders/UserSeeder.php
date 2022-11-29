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
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('data@1234'),
            'user_type' => 'superadmin',
            'status' => 'active',
        ]);
        User::create([
            'avatar' => 'default.png',
            'name' => 'jaymin',
            'email' => 'jaymin@gmail.com',
            'password' => bcrypt('data@1234'),
            'user_type' => 'users',
            'status' => 'active',
        ]);
    }
}
