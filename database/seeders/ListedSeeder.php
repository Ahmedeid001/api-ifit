<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ListedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = file_get_contents("article.json");
        $artworks = json_decode($data, true);

        // Insert data into 'art' table
        foreach ($artworks as $artwork) {
            DB::table('article')->insert($artwork);
        }
    }
        //food 
       
        //exercise
    public function push(): void
    {
        $data = file_get_contents("exe.json");
        $artworks = json_decode($data, true);

        // Insert data into 'art' table
        foreach ($artworks as $artwork) {
            DB::table('json')->insert($artwork);
        }
    }
}
