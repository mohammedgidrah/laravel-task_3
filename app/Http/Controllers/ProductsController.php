<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('Product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'product_name' => 'required|max:255',
            'product_description' => 'required|max:255',
            'product_price' => 'required|max:255',
        ]);
    
        Product::create($request->all());
    
        return redirect()->route('product.index')->with('success', 'product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("product.show");

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::find($id);
        return view('Product.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name' => ['required'],
            'product_description' => ['required'],
            'product_price' => ['required'],
        ]);
    
        // Find the movie by its ID
        $products = Product::find($id);
    

    
        // Update the movies$movies with the validated data
        $products->product_name = $request->input('product_name');
        $products->product_description = $request->input('product_description');
        $products->product_price = $request->input('product_price');
        $products->save();
    
        // Redirect back to the movies index with a success message
        return redirect()->route('product.index')->with('success', 'product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::find($id);
        $products->delete();
    
        return redirect()->route('product.index')->with('success', 'product deleted successfully.');
    }
}
