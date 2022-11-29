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
            'code' => 'site_logo',
            'type' => 'FILE',
            'label' => 'Site Logo',
            'value' => 'site_logo.png',
            'hidden' => '0',
        ]);

        Setting::create([
            'code' => 'project_title',
            'type' => 'TEXT',
            'label' => 'Project Title',
            'value' => 'Project Title',
            'hidden' => '0',
        ]);

        Setting::create([
            'code' => 'favicon_logo',
            'type' => 'FILE',
            'label' => 'Favicon Logo',
            'value' => 'favicon.ico',
            'hidden' => '0',
        ]);

        Setting::create([
            'code' => 'copyright',
            'type' => 'TEXT',
            'label' => 'Copy Right',
            'value' => 'Inspinia we app framework base on Bootstrap 3',
            'hidden' => '0',
        ]);

        Setting::create([
            'code' => 'thankyou',
            'type' => 'TEXT',
            'label' => 'Thank You',
            'value' => 'The Infusion Analysts Team',
            'hidden' => '0',
        ]);
    }
}
