<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
            "author_id" => \App\Models\User::where('role_id', 2)->get()->random()->id,
            "title" => $this->faker->sentence(),
            "slug" => $this->faker->slug(),
            "body" => $this->faker->paragraph(),
            "views" => $this->faker->numberBetween(0, 100),
        ];
    }
}
