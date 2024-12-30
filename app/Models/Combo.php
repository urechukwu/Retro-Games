<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'price',
        'image',
    ];

    public function products(): BelongsToMany
{
    return $this->belongsToMany(Product::class);
}

  public function combosales()
    {
        return $this->belongsToMany(ComboSale::class);
    }
}
