<?php
namespace App\Http\Controllers\Ecom;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('Ecom.posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $relatedPosts = Post::where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();
        return view('Ecom.posts.show', compact('post', 'relatedPosts'));
    }
}