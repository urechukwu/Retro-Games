<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Mail;
use App\Mail\DownloadLink;
use App\Models\Sale;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;

class SaleController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with('products', 'customer')->get();
        $products = Product::all();
        return view('admindashboard.Sale.index', compact('sales', 'products',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
    'email' => ['required', 'string', 'max:255'],
    'product_id' => ['required', 'exists:App\Models\Product,id'],
]);

            try{

            $customer = Customer::firstOrCreate(
                ['email' => $attributes['email']]
            );

            $sale = $customer->sales()->create([
                 'product_id' => $attributes['product_id']
            ]);

            $sale->products()->attach($attributes['product_id']);

     Mail::to($attributes['email'])->send(new DownloadLink(  $sale));



      return redirect()->route('sale-index')->with('success', 'Sale Added Successfully');
} catch (\Exception $e) {
    \Log::error('Error in SaleController: ' . $e->getMessage());
    return redirect()->route('sale-index')->with('error', 'Error, Try Again');
}
    }


     public function show(string $id)
    {
      $sales = Sale::with('products', 'customer')->findOrFail($id);
      $products = Product::all();
      return view('admindashboard.Sale.show', compact('products', 'sales'));
  
    }
   
}
