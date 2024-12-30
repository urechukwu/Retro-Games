<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Image;
use App\Models\Combo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

     $tags = Tag::factory(10)->create();
     $images = Image::factory(10)->make();

    $products = Product::factory(20)
    ->create()
    ->each(function ($product) use ($tags, $images) {
        $randomTags = $tags->random(3);
        $product->tags()->attach($randomTags->pluck('id'));
        $product->images()->create($images->random()->toArray());
    });
            Combo::factory(5)
            ->create()
            ->each(function ($combo) use ($products) {
        $randomProducts = $products->random(2);
       $combo->products()->attach($randomProducts->pluck('id'));
    });

    }
}
