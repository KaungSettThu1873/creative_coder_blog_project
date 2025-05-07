<?php

namespace Database\Seeders;

use id;
use App\Models\Blog;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::truncate();
        // Category::truncate();
        // Blog::truncate();

        $AungAung = User::factory()->create(['name'=>'Aung Aung']);
        $MaungMaung = User::factory()->create(['name'=>'Maung Maung']);

        $frontend = Category::factory()->create(['name' => 'frontend','slug' => 'frontend']);
        $backend = Category::factory()->create(['name' => 'backend','slug' => 'backend']);



        // Category::factory(10)->create();
       $blog1 = Blog::factory(2)->create(['category_id' => $frontend->id,'user_id' => $AungAung->id]);
       $blog2 = Blog::factory(2)->create(['category_id' => $backend->id,'user_id' => $MaungMaung->id]);

       Comment::factory(1)->create(['blog_id' => $blog1[0]['id'],'user_id' => $AungAung->id]);
       Comment::factory(1)->create(['blog_id' => $blog1[1]['id'],'user_id' => $AungAung->id]);

       Comment::factory(1)->create(['blog_id' =>$blog2[0]['id'],'user_id' => $MaungMaung->id]);
       Comment::factory(1)->create(['blog_id' =>$blog2[1]['id'],'user_id' => $MaungMaung->id]);


        // Blog::factory(50)->create(['category_id' => 1,'user_id' => 1]);
        // Blog::factory(2)->create(['category_id' => 2,'user_id' => 2]);


    }
}
