<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('variable')->insert([
            'key' => 'primary-colour',
            'value' => '#ffffff',
        ]);

        DB::table('variable')->insert([
            'key' => 'second-colour',
            'value' => '#000000',
        ]);

        DB::table('variable')->insert([
            'key' => 'background-colour',
            'value' => '#ffffff',
        ]);

        DB::table('variable')->insert([
            'key' => 'top-banner-image',
            'value' => 'image/test.jpg',
        ]);

        DB::table('variable')->insert([
            'key' => 'main-background-image',
            'value' => 'image/test.jpg',
        ]);

        DB::table('variable')->insert([
            'key' => 'instagram-link',
            'value' => 'instagram.com/123',
        ]);

        DB::table('variable')->insert([
            'key' => 'facebook-link',
            'value' => 'facebook.com/123',
        ]);

        DB::table('variable')->insert([
            'key' => 'messager-link',
            'value' => 'messager.com/123',
        ]);

        DB::table('variable')->insert([
            'key' => 'whatsapp-link',
            'value' => 'whatsapp.com/123',
        ]);
    }
}
