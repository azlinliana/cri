<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClusterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clusters')->insert([
            'name' => "Electronic, Digital Technology & IoT's",
            'description' => "This is Electronic, Digital Technology & IoT's",
        ]);

        DB::table('clusters')->insert([
            'name' => "Food and Agriculture Technology",
            'description' => 'This is Food and Agriculture Technology',
        ]);

        DB::table('clusters')->insert([
            'name' => "Biotechnology, Medical Device, Pharmaceutical & Health",
            'description' => 'This is Biotechnology, Medical Device, Pharmaceutical & Health',
        ]);

        DB::table('clusters')->insert([
            'name' => "Machinery & Equipment",
            'description' => 'This is Machinery & Equipment',
        ]);

        DB::table('clusters')->insert([
            'name' => "Chemical Advanced Material & Plastic",
            'description' => 'This is Chemical Advanced Material & Plastic',
        ]);

        DB::table('clusters')->insert([
            'name' => "Teaching Innovation",
            'description' => 'This is Teaching Innovation',
        ]);
    }
}
