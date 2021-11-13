<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) {
            DB::table('people')->insert([
                'name' => Str::random(10),
                'avatar' => 'noimage.jpg',
                'spouse_name' => Str::random(10),
                'spouse_avatar' => 'noimage.jpg',
                'gender' => 1,
                'state' => Str::random(10),
                'nationality' => Str::random(10),
                'dob_date' => '2000-01-01',
                'parent_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        // for ($i=0; $i < 100; $i++) {
        //     DB::table('people')->insert([
        //         'name' => Str::random(10),
        //         'avatar' => Str::random(10).'.jpg',
        //         'spouse_name' => Str::random(10),
        //         'spouse_avatar' => Str::random(10).'.jpg',
        //         'gender' => 2,
        //         'state' => Str::random(10),
        //         'nationality' => Str::random(10),
        //         'dob_date' => '1999-01-01',
        //         'parent_id' => 2,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //     ]);
        // }
    }
}
