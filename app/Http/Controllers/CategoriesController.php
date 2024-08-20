<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = categories::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:255',
            'category_description' => 'required|max:255',
        ]);
    
        categories::create($request->all());
    
        return redirect()->route('category.index')->with('success', 'category added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $categories = categories::onlyTrashed()->get();
        return view('category.softdelete' , compact('categories')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = categories::find($id);
        return view('category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => ['required'],
            'category_description' => ['required'],
        ]);
    
        // Find the movie by its ID
        $categories = categories::find($id);
    

    
        // Update the movies$movies with the validated data
        $categories->category_name = $request->input('category_name');
        $categories->category_description = $request->input('category_description');
        $categories->save();
    
        // Redirect back to the movies index with a success message
        return redirect()->route('category.index')->with('success', 'category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = categories::find($id);
        $categories->delete();
    
        return redirect()->route('category.index')->with('success', 'category deleted successfully.');
    }
}
