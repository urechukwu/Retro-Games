<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;




class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('tags')->get();
        $tags = Tag::all();
        return view('admindashboard.product', compact('products', 'tags'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

      $attributes = $request->validate([
    'name' => ['required', 'string', 'max:255'],
    'price' => ['required', 'numeric'],
    'tags' => ['nullable', 'string'],
    'image' => ['nullable'],
]);

try {
    $product = Product::create(Arr::except($attributes, ['tags', 'image']));

    if ($request->hasFile('image')) {
        $imagepath = $request->file('image')->store('images');
        $product->images()->create([
            'image' => $imagepath,
        ]);
    }

    if (!empty($attributes['tags'])) {
        foreach (explode(',', $attributes['tags']) as $tagName) {
            $tag = Tag::firstOrCreate(['name' => strtolower(trim($tagName))]);
            $product->tags()->attach($tag->id);
        }
    }

    return redirect()->route('product-index')->with('success', 'Product Added Successfully');
} catch (\Exception $e) {
    return redirect()->route('product-index')->with('error', 'Error, Try Again');
}

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
   $product = Product::with('tags')->findOrFail($id);
   $tags = Tag::all();
   return view('admindashboard.product-show', compact('product', 'tags'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
     $product = Product::with('tags')->findOrFail($id);
   $tags = Tag::all();
   return view('admindashboard.product-edit', compact('product', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'tags' => ['nullable', 'string'],
            'image' => ['nullable'],
        ]);
try {
        $product = Product::findOrFail($request->id);
        $product->update(Arr::except($attributes, ['tags']));

        if ($product->images->isNotEmpty()) {
            $image = $product->images->first();
            if (Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }
            $image->delete();
        }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->images()->create([
                'image' => $imagePath,
            ]);
        }

        if (!empty($attributes['tags'])) {
            $tagIds = [];
            foreach (explode(',', $attributes['tags']) as $tagName) {
                $tag = Tag::firstOrCreate(['name' => strtolower(trim($tagName))]);
                $tagIds[] = $tag->id;
            }
            $product->tags()->sync($tagIds);
        }

        return redirect()->route('product-index')->with('success', 'Product Updated Successfully');
        
    } catch (\Exception $e) {
        return redirect()->route('product-index')->with('error', 'Error updating product, please try again.');
    }
  }

  /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id): RedirectResponse
    {
        $product = Product::findOrFail($request->id);
    if ($product->images->isNotEmpty()) {
        $image = $product->images->first();
        Storage::disk('public')->delete($image->image);
        $image->delete(); 
    }
        $product->delete();
    return redirect()->route('product-index')->with('success', 'Product deleted successfully');
    }
}