<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'code' => 'application_logo',
            'type' => 'FILE',
            'label' => 'Site Logo',
            'value' => 'application_logo.png',
            'hidden' => '0',
        ]);

        Setting::create([
            'code' => 'application_title',
            'type' => 'TEXT',
            'label' => 'Application Title',
            'value' => 'Grocery Mart',
            'hidden' => '0',
        ]);

        Setting::create([
            'code' => 'favicon_logo',
            'type' => 'FILE',
            'label' => 'Favicon Logo',
            'value' => 'favicon_logo.png',
            'hidden' => '0',
        ]);

        Setting::create([
            'code' => 'copyright',
            'type' => 'TEXT',
            'label' => 'Copy Right',
            'value' => 'Grocery Mart',
            'hidden' => '0',
        ]);
    }
}
