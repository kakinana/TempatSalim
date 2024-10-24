<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class gdctSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gd_ct')->insert([
            ['code_gd' => '001', 'id_ct' => 1],
            ['code_gd' => '001', 'id_ct' => 2],
            ['code_gd' => '001', 'id_ct' => 3],
            ['code_gd' => '002', 'id_ct' => 4],
            ['code_gd' => '002', 'id_ct' => 5],
            ['code_gd' => '002', 'id_ct' => 6],
        ]);
    }
}
