<?php

namespace Database\Seeders;
use App\Models\Product;
use App\Models\Review;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Product::factory()->count(30)->create();
        Review::factory()->count(150)->create();
    }
}
