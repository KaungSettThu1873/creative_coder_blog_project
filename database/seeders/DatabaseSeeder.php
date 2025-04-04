<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
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
        User::truncate();
        Category::truncate();
        Blog::truncate();

        $frontend = Category::create(['name' => 'frontend','slug' => 'frontend']);

        $backend = Category::create(['name' => 'backend','slug' => 'backend']);




        // Category::factory(10)->create();
        Blog::factory(2)->create(['category_id' => $frontend->id]);
        Blog::factory(2)->create(['category_id' => $backend->id]);





    }
}
