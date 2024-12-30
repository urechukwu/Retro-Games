<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Creator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'name' => fake()->randomElement([
                'Age of Empire', 
                'Call of Duty', 
                'Sims 1',
                'Sims 2',
                'Pirates of the Seven Seas',
                'Grand Theft Auto: Vice City',
                'PES 14',
                'FIFA 14',
                'PES 16',
                'Football Manager14',
                'FIFA 16',
                'FIFA 20',
                'FIFA 22',
                'PES 19',
                'Football Manager 19',
            ]),
            'price' => fake()->randomNumber(4, false),
            'description' => fake()->paragraph(5, true),
            'spec' => fake()->paragraph(8, true),
        ];
    }
}
