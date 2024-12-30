<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;


class Combosale extends Model
{
    use HasFactory;

     protected $fillable = [
        'customer_id',
        'combo_id',
        'receipt',
    ];

      public function customer(): BelongsTo
{
    return $this->belongsTo(Customer::class);
}

    public function combos()
    {
        return $this->belongsToMany(Combo::class);
    }
}
