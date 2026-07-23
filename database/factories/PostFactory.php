<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Posts>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->title(),
            "description" => fake()->text(),
            "image" => fake()->imageUrl(400, 400),
            "text" => fake()->realText(),
            "views" => fake()->randomNumber()
        ];
    }
}
