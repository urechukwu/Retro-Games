<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Combo;
use App\Models\Combosale;
use App\Models\Customer;

class CombocartController extends Controller
{
    public function buy(Request $request): RedirectResponse

    {
        $cart = $request->input('cart'); 

        Session::put('cart', $cart);

        return redirect()->route('combo-index');

    }

     public function index(){

        $cart = Session::get('cart');

        $combo = Combo::with('products')->findOrFail($cart);

        return view('guest.combo.checkout', compact('combo'));
    }

        public function checkout(Request $request): RedirectResponse

    {

     $cart = Session::get('cart');
     $combo = Combo::with('products')->findOrFail($cart);

         $attributes = $request->validate([
    'firstName' => ['required', 'string', 'max:255'],
    'lastName' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Customer::class],
    'country' => ['nullable', 'string'],
    'phone' => ['nullable', 'numeric'],
]);

     $customer = Customer::create($attributes);   

if ($cart) {
    $sale = $customer->combosales()->create([
        'combo_id' => $combo->id
    ]);
    $sale->combos()->attach($cart);

}
     return redirect()->route('checkout-status')->with('success', 'Checkout Successful');
 }

    }

