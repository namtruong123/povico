<?php

namespace App\Http\Controllers\Ecom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartController extends Controller
{
     protected function formatCurrency($amount)
    {
        return number_format($amount, 0, ',', '.') . '₫';
    }

    // Trang giỏ hàng
     public function index()
    {
        $cart = Session::get('cart', []);
        return view('Ecom.order.cart', compact('cart'));
    }

    // Thêm sản phẩm vào giỏ hàng (ví dụ)
    public function add(Request $request)
    {
        //dd($request);
        $productId = (int) $request->input('product_id');
        $quantity = max(1, (int) $request->input('quantity', 1));

        $product = \App\Models\Product::find($productId);
        if (!$product) {
            return $request->ajax()
                ? response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại'])
                : redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'product_id' => $product->id,
                'name'       => $product->name,
                'slug'       => $product->slug,
                'image'      => asset($product->main_image),
                'price'      => $product->price,
                'quantity'   => $quantity,
                'variant'    => $request->input('variant', ''),
            ];
        }

        Session::put('cart', $cart);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'cart' => $cart]);
        } else {
            return view('Ecom.partials.shopping_cart_modal', compact('cart'))->with('success', 'Đã thêm vào giỏ hàng');
        }
    }

    // Cập nhật số lượng
   public function update(Request $request)
{
    $productId = (int) $request->input('product_id');
    $quantity = max(1, (int) $request->input('quantity', 1));

    $cart = session('cart', []);

    if (!isset($cart[$productId])) {
        return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng']);
    }

    $cart[$productId]['quantity'] = $quantity;

    // Lưu lại session
    session(['cart' => $cart]);
    session()->save();

    $productTotal = $cart[$productId]['price'] * $quantity;
    $cartTotal = array_reduce($cart, fn($sum, $item) => $sum + $item['price'] * $item['quantity'], 0);

    return response()->json([
        'success' => true,
        'product_total' => number_format($productTotal, 0, ',', '.') . '₫',
        'cart_total' => number_format($cartTotal, 0, ',', '.') . '₫',
        'cart' => $cart,
    ]);
}


    // Xóa sản phẩm
    public function remove(Request $request)
    {
        $productId = (int) $request->input('product_id');
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
            return response()->json(['success' => true, 'cart' => $cart]);
        }
        return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng']);
    }
}