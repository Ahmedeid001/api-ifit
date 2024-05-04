<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        $data = file_get_contents("food.json");
        $artworks = json_decode($data, true);

      
        foreach ($artworks as $artwork) {
            DB::table('food')->insert($artwork);
        }
    
    }
}
