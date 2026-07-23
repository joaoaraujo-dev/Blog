<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    { 
        //password and email insecured
        User::create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => "admin123",
            "is_admin" => 1
        ]);
       
        /*
        User::factory(5)->create();
        Category::factory(5)->create();
        Post::factory(20)->create([
            "user_id" => User::factory(),
            "category_id" => Category::factory()
        ]);
        */
    }
}
