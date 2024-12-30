<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\DownloadLink;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Sale;

class CartController extends Controller
{

   public function buy(Request $request): RedirectResponse

    {
        $cart = $request->input('cart'); 

        Session::put('cart', $cart);

        return redirect()->route('cart-index');

    }

    public function index(){

        $cart = Session::get('cart');

        $product = Product::findOrFail($cart);

        return view('guest.product.checkout', compact('product'));
    }


    public function checkout(Request $request): RedirectResponse

    {
         $attributes = $request->validate([
    'firstName' => ['required', 'string', 'max:255'],
    'lastName' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Customer::class],
    'country' => ['nullable', 'string'],
    'phone' => ['nullable', 'numeric'],
]);

try {

     $customer = Customer::create($attributes);

     $cart = Session::get('cart');

if ($cart) {
    $sale = $customer->sales()->create([
        'product_id' => $cart
    ]);
   
    $sale->products()->attach($cart);
}
     // Mail::to($attributes['email'])->send(new DownloadLink($sale));



     return redirect()->route('checkout-status')->with('success', 'Checkout Successful');
} catch (\Exception $e) {
    return redirect()->route('checkout-status')->with('error', 'Error, Try Again');
}

    }

     public function status(){

        
        return view('guest.checkout.status');
    }




}
