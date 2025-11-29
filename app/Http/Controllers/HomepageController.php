<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::with(['author', 'category'])->latest()->paginate(10);
        $categories = Category::where('status', 'Active')->withCount('posts')->latest()->get();
        //dd($posts);
        return view('homepage', compact('posts', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('post-detail', compact('post'));
    }
}
