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
        DB::table('variables')->insert([
            'key' => 'primary-colour',
            'value' => '#F08080',
        ]);

        DB::table('variables')->insert([
            'key' => 'second-colour',
            'value' => '#FF0000',
        ]);

        DB::table('variables')->insert([
            'key' => 'background-colour',
            'value' => '#FFFFFF',
        ]);

        DB::table('variables')->insert([
            'key' => 'top-banner-image',
            'value' => 'image/test.jpg',
        ]);

        DB::table('variables')->insert([
            'key' => 'main-background-image',
            'value' => 'image/test.jpg',
        ]);

        DB::table('variables')->insert([
            'key' => 'facebook-link',
            'value' => '彭氏公会, https://www.facebook.com/friends',
        ]);

        DB::table('variables')->insert([
            'key' => 'messager-link',
            'value' => '彭氏公会, messager.com/123',
        ]);

        DB::table('variables')->insert([
            'key' => 'whatsapp-link',
            'value' => '彭氏公会, whatsapp.com/123',
        ]);
    }
}
