<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([ 
        ['name' => 'admin1',
        'username' => 'admin123',
        'password' => 'admin123', 
        'no_telp' => '081234567890', 
        'role' => 'admin', 
        'created_at' => now(),
        'updated_at' => now()],
        ['name' => 'kinan',
        'username' => 'user1',
        'password' => 'user1234', 
        'no_telp' => '081234567891', 
        'role' => 'user', 
        'created_at' => now(),
        'updated_at' => now()],
        ['name' => 'candra',
         'username' => 'user2',
        'password' => 'user1234', 
        'no_telp' => '081234567892', 
        'role' => 'user', 
        'created_at' => now(),
        'updated_at' => now()]
        ]);
    }
}
