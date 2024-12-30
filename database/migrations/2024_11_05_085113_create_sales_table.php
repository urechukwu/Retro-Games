<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Combo;
use App\Models\Combosale;
use App\Models\Sale;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

         Schema::create('carts', function (Blueprint $table) {
            $table->id();
           $table->foreignIdFor(Customer::class)->constrained()->cascadeOnDelete();
           $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Customer::class)->constrained()->cascadeOnDelete()->nullable();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->string('receipt')->nullable();
            $table->timestamps();
        });

         Schema::create('combosales', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Combo::class)->constrained()->cascadeOnDelete()->nullable();
            $table->foreignIdFor(Customer::class)->constrained()->cascadeOnDelete();
            $table->string('receipt')->nullable();
            $table->timestamps();
        });

         Schema::create('product_sale', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Sale::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

         Schema::create('combo_combosale', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Combo::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Combosale::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
        Schema::dropIfExists('combosales');
        Schema::dropIfExists('carts');
        Schema::dropIfExists('product_sale');
        Schema::dropIfExists('combosales_product');
    }
};
