<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\categories;


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
    // public function store(Request $request)
    // {
    //     // dd($request);
    //     $request->validate([
    //         'product_name' => 'required|max:255',
    //         'product_description' => 'required|max:255',
    //         'product_price' => 'required|max:255',
    //     ]);
    
    //     // Product::create($request->all());
    //     $category_name = $request->category_name;
    //     $category_description = $request->category_description;
    //     $product_name = $request->product_name;
    //     $product_price = $request->product_price;
    //     $product_description = $request->product_description;

    //     $categories = categories::create(["category_name"=>$category_name,"category_description"=>$category_description]);
    //     Product::create(["product_name"=>$product_name,"product_description"=>$product_description,"product_price"=>$product_price,"category_id"=>$categories->id]);
    
    //     return redirect()->route('product.index')->with('success', 'product added successfully.');
    // }
    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'product_name' => 'required|max:255',
        'product_description' => 'required',
        'product_price' => 'required|numeric',
        'category_name' => 'required|max:255',
        'category_description' => 'required',
    ]);

    // Extract request data
    $category_name = $request->input('category_name');
    $category_description = $request->input('category_description');
    $product_name = $request->input('product_name');
    $product_description = $request->input('product_description');
    $product_price = $request->input('product_price');

    // Create the category first
    $category = Category::create([
        'category_name' => $category_name,
        'category_description' => $category_description,
    ]);

    // Create the product with the newly created category ID
    Product::create([
        'product_name' => $product_name,
        'product_description' => $product_description,
        'product_price' => $product_price,
        'category_id' => $category->id,  // Assign the created category's ID
    ]);

    // Redirect back to the product index with a success message
    return redirect()->route('product.index')->with('success', 'Product added successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::onlyTrashed()->get();
        return view('product.softdelete' , compact('products')); 

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
