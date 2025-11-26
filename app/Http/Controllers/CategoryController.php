<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::latest()->paginate(10);
        //dd($categories);
        return view('admin.pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pages.categories.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name'   => 'required',
            'status' => 'required'
            ]);
        Category::create($validated);
        
        return redirect()->route('admin.categories.index')->with('success', 'Berhasil tambah kategori');
    }
    
    public function notfound()
    {
        //
        return to_route('admin.categories.index');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return to_route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $categories = Category::findOrFail($id);
        $categories->delete();
        return redirect()->route('admin.categories.index')->with('success', 'kategori terhapus');
    }
}
