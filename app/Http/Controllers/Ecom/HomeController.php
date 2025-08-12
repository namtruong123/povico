<?php

namespace App\Http\Controllers\Ecom;

use App\Http\Controllers\Controller;
use App\Models\Footer;

class HomeController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::all();
        $newProducts = \App\Models\Product::with('attribute')->where('is_new', 1)->orderByDesc('created_at')->take(8)->get();
        $lookbooks = \App\Models\Lookbook::all();
        $posts = \App\Models\Post::latest()->take(3)->get();

        $saleProducts = \App\Models\Product::with('attribute')
            ->whereNotNull('sale_price')
            ->whereNotNull('price')
            ->where('sale_price', '>', 0)
            ->where('price', '>', 0)
            ->whereColumn('sale_price', '<', 'price')
            ->orderByDesc('updated_at')
            ->take(12)
            ->get();

        $bestSellerProducts = \App\Models\Product::with('attribute')
            ->where('is_best_seller', 1)
            ->orderByDesc('updated_at')
            ->take(12)
            ->get();

        $footer = Footer::first(); // hoặc Footer::find(1)

        return view('Ecom.home', compact('categories', 'newProducts', 'lookbooks', 'posts', 'saleProducts', 'bestSellerProducts', 'footer'));
    }

    public function about()
    {
        $about = \App\Models\AboutPage::first(); // Lấy bản ghi đầu tiên
        return view('Ecom.about.about', compact('about'));
    }

    public function contact()
    {
        return view('Ecom.contact.contact');
    }
}