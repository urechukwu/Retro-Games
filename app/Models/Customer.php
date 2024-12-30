<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Combosale;

class Customer extends Model
{
    use HasFactory;

      protected $fillable = [
        'firstName',
        'lastName',
        'country',
        'email',
        'phone',
        'password',
    ];

  public function sales(): HasMany
{
    return $this->hasMany(Sale::class);
}

 public function combosales(): HasMany
{
    return $this->hasMany(ComboSale::class);
}


public function products(): BelongsToMany
{
    return $this->belongsToMany(Product::class, 'product_sale');
}
}
