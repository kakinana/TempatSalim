<?php

/*namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ekategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori')->insert([ 
            ['name_ct' => 'Residential Building', 'detail_ct' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.', 'status_ct' => '1', 'created_at' => now(), 'updated_at' => now()], 

            ['name_ct' => 'Luxury', 'detail_ct' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.','status_ct' => '1', 'created_at' => now(), 'updated_at' => now()],

            ['name_ct' => 'Vacation Rent', 'detail_ct' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.','status_ct' => '1', 'created_at' => now(), 'updated_at' => now()],

            ['name_ct' => 'Event Venue', 'detail_ct' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.','status_ct' => '1', 'created_at' => now(), 'updated_at' => now()],

            ['name_ct' => 'Sport Complex', 'detail_ct' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.','status_ct' => '1', 'created_at' => now(), 'updated_at' => now()],

            ['name_ct' => 'Community Space', 'detail_ct' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.','status_ct' => '1', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
