<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class gedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('gedung')->insert([ 
            ['code_gd' => '001', 'name_gd' => 'Villa Kemang', 'price_gd' => '500000', 'stock_gd' => '4', 'status_gd' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['code_gd' => '002', 'name_gd' => 'GBK Madya', 'price_gd' => '500000', 'stock_gd' => '2', 'status_gd' => '1', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}