<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Combo;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->text('description')->nullable();
            $table->text('spec')->nullable();
            $table->string('link')->nullable();
            $table->timestamps();
        });

         Schema::create('tags', function (Blueprint $table) {
            $table->id();
             $table->string('name');
            $table->timestamps();
        });

          Schema::create('product_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Tag::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

          Schema::create('images', function (Blueprint $table) {
    $table->id();
    $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
    $table->string('image');
    $table->timestamps();
});

          Schema::create('combos', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('price');
    $table->string('image');
    $table->text('description')->nullable();
    $table->timestamps();
        });

        Schema::create('combo_product', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Combo::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('product_tag');
        Schema::dropIfExists('images');
        Schema::dropIfExists('combos');
        Schema::dropIfExists('combo_product');
    }
};
