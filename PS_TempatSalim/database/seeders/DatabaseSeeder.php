<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gedung;
use App\Models\Kategori;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $building1 = Gedung::create([
            'code_gd' => 'V001',
            'name_gd' => 'Villa Kemang',
            'price_gd' => 100000,
            'stock_gd' => 5,
            'status_gd' => 1
        ]);

        $building2 = Gedung::create([
            'code_gd' => 'G001',
            'name_gd' => 'GBK Madya',
            'price_gd' => 150000,
            'stock_gd' => 2,
            'status_gd' => 1
        ]);

        // Create some categories
        $category1 = Kategori::create(['name_ct' => 'Luxury', 'detail_ct' => 'Lorem ipsum dolor sit amet', 'status_ct' => 1]);
        $category2 = Kategori::create(['name_ct' => 'Vacation Rental', 'detail_ct' => 'Lorem ipsum dolor sit amet', 'status_ct' => 1]);
        $category3 = Kategori::create(['name_ct' => 'Community Space', 'detail_ct' => 'Lorem ipsum dolor sit amet', 'status_ct' => 1]);
        $category4 = Kategori::create(['name_ct' => 'Sport Complex', 'detail_ct' => 'Lorem ipsum dolor sit amet', 'status_ct' => 1]);

        // Attach buildings to categories (many-to-many relationship)
        $building1->kategori()->attach([$category1->id, $category2->id]); 

        $building2->kategori()->attach([$category3->id, $category4->id]);
        
        /*$this->call([
            gedungSeeder::class,
            kategoriSeeder::class,
            gdctSeeder::class,
            userSeeder::class,
        ]);*/
    }
}
