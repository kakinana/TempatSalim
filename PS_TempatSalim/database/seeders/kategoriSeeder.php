<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori')->insert([ 
            ['id_ct' => '1', 'name_ct' => 'Residential Building', 'code_gd' => '001', 'status_ct' => '1', 'created_at' => now(), 'updated_at' => now()], 

            ['id_ct' => '2', 'name_ct' => 'Luxury', 'code_gd' => '001', 'status_ct' => '1', 'created_at' => now(), 'updated_at' => now()],

            ['id_ct' => '3','name_ct' => 'Vacation Rent', 'code_gd' => '001', 'status_ct' => '1', 'created_at' => now(), 'updated_at' => now()],

            ['id_ct' => '4','name_ct' => 'Event Venue', 'code_gd' => '002', 'status_ct' => '1', 'created_at' => now(), 'updated_at' => now()],

            ['id_ct' => '5', 'name_ct' => 'Sport Complex', 'code_gd' => '002', 'status_ct' => '1', 'created_at' => now(), 'updated_at' => now()],

            ['id_ct' => '6','name_ct' => 'Community Space', 'code_gd' => '002', 'status_ct' => '1', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
