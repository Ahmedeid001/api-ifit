<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(ListedSeeder::class);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
        //food
    public function store(): void
    {
        // User::factory(10)->create();
        $this->call(foodseeder::class);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

        //exercise  

        // public function push(): void
        // {
        //     // User::factory(10)->create();
        //     $this->call(ListedSeeder::class);
        //     // User::factory()->create([
        //     //     'name' => 'Test User',
        //     //     'email' => 'test@example.com',
        //     // ]);
        // }
}
