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

    public function show($slug, $id)
    {
        $post = Post::findOrFail($id);
        $relatedPosts = Post::where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();
        // $cart = ... // lấy giỏ hàng nếu cần
        return view('Ecom.posts.show', compact('post', 'relatedPosts', 'cart'));
    }
}