<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Customer;
use App\Http\Controllers\Admin\SaleController;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $customers = Customer::with('sales.products')->get();
        return view('admindashboard.Customer.index', compact('customers'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customers = Customer::with('sales.products')->findOrFail($id);
        return view('admindashboard.Customer.show', compact('customers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function link(string $id)
    {
      $linkedsale = Sale::with('sales.products')>findOrFail($id);
      return view('admindashboard.Sale.show', compact('linkedsale',));
    }
   
    public function destroy(string $id)
    {
        //
    }
}
