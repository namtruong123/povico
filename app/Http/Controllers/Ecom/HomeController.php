<?php

namespace App\Http\Controllers\Ecom;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::all();
        $newProducts = \App\Models\Product::with('attribute')->where('is_new', 1)->orderByDesc('created_at')->take(8)->get();
        $lookbooks = \App\Models\Lookbook::all();
        $posts = \App\Models\Post::latest()->take(3)->get(); // Thêm dòng này

        return view('Ecom.home', compact('categories', 'newProducts', 'lookbooks', 'posts'));
    }

    public function about()
    {
        return view('Ecom.about');
    }

    public function contact()
    {
        return view('Ecom.contact');
    }
}