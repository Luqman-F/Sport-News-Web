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
        $body = "";
        for ($i = 0; $i < rand(3, 6); $i++) {
            $body .= "<p>" . $this->faker->paragraph(rand(3, 6)) . "</p>";
        }

        return [
            "author_id" => \App\Models\User::where('role_id', 2)->get()->random()->id,
            "title" => $this->faker->sentence(),
            "slug" => $this->faker->slug(),
            "body" => $body,
            "views" => $this->faker->numberBetween(0, 100),
        ];
    }
}
