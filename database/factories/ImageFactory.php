<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     *    */
  
    public function definition(): array
    {
    return [

    'product_id' => null,

    'image' => function () {
        $files = Storage::disk('public')->files('images');
        return Arr::random($files);
    },

];

   }
}
