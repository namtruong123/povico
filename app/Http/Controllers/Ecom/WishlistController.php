<?php

namespace App\Http\Controllers\Ecom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with('product')->where('user_id', auth()->id())->get();
        return view('Ecom.wishlist.index', compact('wishlists'));
    }

    public function add(Request $request)
    {
        Wishlist::firstOrCreate([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
        ]);
        return response()->json(['success' => true]);
    }

    public function remove(Request $request)
    {
        Wishlist::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->delete();
        return response()->json(['success' => true]);
    }
}
