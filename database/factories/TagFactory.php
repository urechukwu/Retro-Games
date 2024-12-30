<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'name' => fake()->unique()->randomElement([
                'Adventure', 
                'Action', 
                'RPG',
                'Multiplayer',
                'Single Player',
                'Fantasy',
                'World Building',
                'Strategy',
                'Offline',
                'Horror',
                'Sports',
            ]),
        ];
    }
}
