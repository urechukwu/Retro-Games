<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::with('products')->get();
        $products = Product::all();
        return view('admindashboard.Tag.index', compact('products', 'tags'));
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
        $request->validate([
            'name' => ['required', 'string', 'unique', 'max:255'],
        ]);

        $tag = Tag::create([
            'name' => $request->name,
        ]);


        return redirect()->route('tag-index',)->with([
            'success' => 'Tag Added Sucessfully',
             'error' => 'Error Try Again', 
    ]);

    }


     public function show(string $id)
    {
       $tag = Tag::with('products')->findOrFail($id);
       $products = Product::all();
       return view('admindashboard.Tag.show', compact('products', 'tag'));
  
    }

    /**
     * Display the specified resource.
     */
   

    public function edit(string $id)
    {
     $tag = Tag::with('products')->findOrFail($id);
     $products = Product::all();
     return view('admindashboard.Tag.edit', compact('products', 'tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
    try {
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
    ]);

    $tag = Tag::findOrFail($request->id);
    $tag->update([
        'name' => $request->name,
    ]);

    return redirect()->route('tag-index')->with('success', 'Tag Updated Successfully');
} catch (\Exception $e) {
    return redirect()->route('tag-index')->with('error', 'Error, Try Again');
}


  }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id): RedirectResponse
    {
        $tag = Tag::findOrFail($request->id);
        $tag->delete();
    return redirect()->route('tag-index')->with('success', 'Tag deleted successfully');
    }
}
