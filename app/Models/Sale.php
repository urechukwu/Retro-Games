<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;

class Sale extends Model
{
    use HasFactory;

     protected $fillable = [
        'customer_id',
        'product_id',
         'receipt',
    ];

   public function customer(): BelongsTo
{
    return $this->belongsTo(Customer::class);
}

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_sale');
    }

}
