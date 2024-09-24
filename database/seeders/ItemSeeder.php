<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'name' => 'Tahu Tek',
                'description' => 'tahu tek enak',
                'price' => 10000.00,
                'stock' => 10,
                'rating' => 4.4,
                'city' => 'Surabaya',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Teh',
                'description' => 'seger',
                'price' => 5000.00,
                'stock' => 7,
                'rating' => 4.9,
                'city' => 'Surabaya',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
