<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class ProductTagRelationshipTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function a_product_can_have_multiple_tags()
    {
        // Create a product
        $product = Product::factory()->create();

        // Create tags and attach them to the product
        $tags = Tag::factory()->count(3)->create();
        $product->tags()->sync($tags->pluck('id'));

        // Assert that the product has exactly 3 tags
        $this->assertCount(3, $product->tags);
    }

    #[Test]
    public function a_tag_can_belong_to_multiple_products()
    {
        // Create a tag
        $tag = Tag::factory()->create();

        // Create products and attach the tag to each product
        $products = Product::factory()->count(3)->create();
        foreach ($products as $product) {
            $product->tags()->attach($tag->id);
        }

        // Assert that the tag is associated with exactly 3 products
        $this->assertCount(3, $tag->products);
    }

    #[Test]
    public function tags_can_be_attached_to_a_product()
    {
        // Create a product and a tag
        $product = Product::factory()->create();
        $tag = Tag::factory()->create();

        // Attach the tag to the product
        $product->tags()->attach($tag->id);

        // Assert that the product's tags contain the attached tag
        $this->assertTrue($product->tags->contains($tag));
    }
}
