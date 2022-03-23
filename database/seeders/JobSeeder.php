<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30; $i++) {
            DB::table('jobs')->insert([
                'name' => Str::random(10),
                'description' => 'This field is description',
                'note' => 'This field is note',
                'image_path' => 'noimage.jpg',
                'category' => 'HR',
                'salary' => 'RM3',
                'background' => 'Sample background data',
                'address' => 'No 1, Address 3. Taman bangsar',
                'posted_on' => date('Y-m-d H:i:s'),
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        
    }
}
