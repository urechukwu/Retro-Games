<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Combo>
 */
class ComboFactory extends Factory
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
        'Football Combo', 
        'Manager Combo', 
        'Prototype Edition',
        'RPG Combo',
        'GTA Editions',
    ]),
    'price' => fake()->randomNumber(4, true),
    'image' => function () {
        $files = Storage::disk('public')->files('images');
        return Arr::random($files);
         'description' => fake()->paragraph(5, true),
    },
];

    }
}
