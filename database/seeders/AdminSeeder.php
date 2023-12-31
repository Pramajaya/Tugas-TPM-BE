<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'category_name' => 'Action'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Crime'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Romance'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Drama'
        ]);
        
        DB::table('categories')->insert([
            'category_name' => 'Horror'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Romance'
        ]);
    }
}
