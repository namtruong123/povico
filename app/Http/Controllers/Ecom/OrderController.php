<?php

namespace App\Http\Controllers\Ecom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    // Hiển thị form thanh toán
    public function checkout()
    {
        // Lấy giỏ hàng từ session hoặc DB
        $cart = session('cart', []);
        return view('Ecom.order.checkout', compact('cart'));
    }

    // Xử lý đặt hàng
    public function process(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng trống!');
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'customer_email' => $request->customer_email,
            'total' => collect($cart)->sum(function($item) { return $item['price'] * $item['quantity']; }),
            'status' => 'paid'
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        // Xóa giỏ hàng sau khi đặt
        session()->forget('cart');

        return redirect()->route('order.tracking')->with('success', 'Đặt hàng thành công!');
    }

    // Xem đơn hàng đã thanh toán của khách
    public function tracking()
    {
        $orders = \App\Models\Order::where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->get();
        return view('Ecom.order.tracking', compact('orders'));
    }
}
