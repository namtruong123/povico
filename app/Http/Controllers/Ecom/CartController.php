<?php

namespace App\Http\Controllers\Ecom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index(Request $request)
    {
        $cart = session('cart', []);
        return view('Ecom.order.cart', compact('cart'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = max(1, (int)$request->input('quantity', 1));
        $product = \App\Models\Product::find($productId);
        if (!$product) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại']);
            }
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }

        $cart = session('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'image' => asset($product->main_image),
                'price' => $product->price,
                'quantity' => $quantity,
                'variant' => $request->input('variant', ''),
            ];
        }
        session(['cart' => $cart]);
        if ($request->ajax()) {
            return response()->json(['success' => true, 'cart' => $cart]);
        }
        return redirect()->route('cart.index')->with('success', 'Đã thêm vào giỏ hàng');
    }
    public function update(Request $request)
    {
        $cart = session('cart', []);
        $id = $request->input('product_id');
        $qty = max(1, (int)$request->input('quantity', 1));
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $qty;
            session(['cart' => $cart]);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
    public function remove(Request $request)
    {
        $cart = session('cart', []);
        $id = $request->input('product_id');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
    public function modal()
    {
        $cart = session('cart', []);
        $items = view('Ecom.order._cart_modal', compact('cart'))->render();
        $total = number_format(array_sum(array_map(fn($i)=>$i['price']*$i['quantity'], $cart)),0,',','.') . '₫';
        $count = array_sum(array_column($cart,'quantity'));
        return response()->json(compact('items','total','count'));
    }
}
