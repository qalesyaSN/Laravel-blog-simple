<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::with(['author', 'category'])->latest()->paginate(10);
        return view('admin.pages.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::latest()->get();
        //dd($category);
        return view('admin.pages.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title'       => 'required',
            'content'     => 'required',
            'category_id' => 'required|numeric',
            'thumbnail'   => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'      => 'required'
            ]);
            
        $thumbnail = $request->file('thumbnail');
        $thumbnail->storeAs('posts', $thumbnail->hashName());
        $validated['thumbnail'] = '/posts/' . $thumbnail->hashName();
        $validated['user_id'] = auth()->id();
        Post::create($validated);
        return redirect()->route('admin.posts.index')->with('success', 'Berhasil menambah data.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::findOrFail($id);
        $categories = Category::where('status', 'Active')->get();
        //dd($posts);
        return view('admin.pages.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'title'       => 'required',
            'content'     => 'required',
            'category_id' => 'required|numeric',
            'status'      => 'required'
            ]);
        $post = Post::findOrFail($id);
        if($request->hasFile('thumbnail')){
            Storage::delete($post->thumbnail);
            $thumbnail = $request->file('thumbnail');
            $thumbnail->storeAs('posts', $thumbnail->hashName());
            $validated['thumbnail'] = '/posts/' . $thumbnail->hashName();
        }
        $post->update($validated);
        // Ganti return redirect() yang lama dengan ini:
        return to_route('admin.posts.index')->with('success', 'Data berhasil diupdate!')->setStatusCode(303); // <--- INI OBATNYA

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::findOrFail($id);
        Storage::delete($post->thumbnail);
        $post->delete();
        
        return redirect()->route('admin.posts.index')->with('success', 'Berhasil menghapus data');
    }
}
