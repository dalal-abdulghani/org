<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            ['key' => 'site_description', 'value' => '   هذه نبذة عن الموقع...'],
            ['key' => 'slide_image_1', 'value' => 'images/slide/bg.png'],
            ['key' => 'slide_image_2', 'value' => 'images/slide/6.png'],
            ['key' => 'slide_image_3', 'value' => 'images/slide/YATEEM.png'],
            ['key' => 'intro_video', 'value' => 'https://www.youtube.com/embed/RIwBgvuQe5s?si=3b43tgN1_usYlNVW"'],
        ]);
    }

}
