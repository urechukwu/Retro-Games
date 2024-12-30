<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Image;
use App\Models\Sale;
use App\Models\Combo;
use App\Models\Combosale;


class Product extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'price',
        'description',
        'spec',
        'link',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

 public function tags(): BelongsToMany
{
    return $this->belongsToMany(Tag::class);
}

public function sales()
    {
        return $this->belongsToMany(Sale::class, 'product_sale');
    }

  

    public function combos(): BelongsToMany
{
    return $this->belongsToMany(Combo::class);
}

}
