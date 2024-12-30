<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Tag;
use App\Models\Combo;

class GuestController extends Controller
{
  public function index()
    {
        $products = Product::with('tags')->get();
        $combos = Combo::with('products')->get();
        $tags = Tag::all();
        return view('guest.welcome', compact('products', 'tags', 'combos'));
    }

     public function view(string $id)
    {
 
$product = Product::with('tags')->findOrFail($id);
  $suggestedProducts = Product::with('tags')
    ->whereHas('tags', function ($query) use ($product) {
        $query->whereIn('name', $product->tags->pluck('name'));
    })
    ->get();
   return view('guest.product.view', compact('product', 'suggestedProducts'));

    }

     public function viewcombo(string $id)
    {
 
  $combo = Combo::with('products.images')->findOrFail($id);

  $suggestedCombos = Combo::with('products')->get();
   return view('guest.combo.view', compact('combo', 'suggestedCombos'));

    }

    public function viewall()
    {
 
    $products = Product::paginate(8);


   return view('guest.product.view-all', compact('products'));

    }


    public function allcombo()
    {
 
    $combos = Combo::paginate(8);


   return view('guest.combo.view-all', compact('combos'));

    }  
}
