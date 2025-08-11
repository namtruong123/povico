{{-- filepath: f:\povico\resources\views\Ecom\order\cart.blade.php --}}
@extends('Ecom.layout')
@section('content')
@include('Ecom.partials.header', ['cart' => $cart])
<div class="space-1"></div>
<div class="page-title relative">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title">Giỏ hàng</h3>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('ecom.home') }}">Trang chủ</a></li>
                        <li>Giỏ hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="flat-spacing pb-0">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <form method="POST" action="{{ route('cart.update') }}">
                    @csrf
                    <table class="tf-table-page-cart">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cart as $item)
                            <tr class="tf-cart-item file-delete">
                                <td class="tf-cart-item_product">
                                    <a href="{{ route('product.detail', $item['slug']) }}" class="img-box">
                                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}">
                                    </a>
                                    <div class="cart-info">
                                        <a href="{{ route('product.detail', $item['slug']) }}" class="cart-title link">{{ $item['name'] }}</a>
                                        @if(!empty($item['variant']))
                                            <div class="variant text-caption-1">{{ $item['variant'] }}</div>
                                        @endif
                                    </div>
                                </td>
                                <td class="tf-cart-item_price text-center">
                                    <div class="cart-price text-button price-on-sale">{{ number_format($item['price'], 0, ',', '.') }}₫</div>
                                </td>
                                <td class="tf-cart-item_quantity">
                                    <div class="wg-quantity mx-md-auto">
                                        <button type="submit" name="decrease" value="{{ $item['product_id'] }}" class="btn-quantity btn-decrease">-</button>
                                        <input type="text" class="quantity-product" name="quantities[{{ $item['product_id'] }}]" value="{{ $item['quantity'] }}">
                                        <button type="submit" name="increase" value="{{ $item['product_id'] }}" class="btn-quantity btn-increase">+</button>
                                    </div>
                                </td>
                                <td class="tf-cart-item_total text-center">
                                    <div class="cart-total text-button total-price">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}₫</div>
                                </td>
                                <td class="remove-cart">
                                    <button type="submit" name="Xóa" value="{{ $item['product_id'] }}" class="remove icon icon-close"></button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Giỏ hàng trống</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </form>
                <div class="ip-discount-code mt-3">
                    <form method="POST" action="{{ route('cart.add') }}">
                        @csrf
                        <input type="text" name="coupon" placeholder="Nhập mã giảm giá">
                        <button class="tf-btn btn-onsurface">Áp dụng mã</button>
                    </form>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="fl-sidebar-cart">
                    <div class="box-order bg-surface">
                        <h5 class="title">Tóm tắt đơn hàng</h5>
                        <div class="subtotal text-button d-flex justify-content-between align-items-center">
                            <span>Tạm tính</span>
                            <span class="total">{{ number_format(collect($cart)->sum(function($item){return $item['price']*$item['quantity'];}), 0, ',', '.') }}₫</span>
                        </div>
                        <h5 class="total-order d-flex justify-content-between align-items-center">
                            <span>Tổng tiền</span>
                            <span class="total">{{ number_format(collect($cart)->sum(function($item){return $item['price']*$item['quantity'];}), 0, ',', '.') }}₫</span>
                        </h5>
                        <div class="box-progress-checkout">
                            <a href="{{ route('checkout') }}" class="tf-btn btn-onsurface w-100">Tiến hành thanh toán<i class="icon-arrow-up-right"></i></a>
                            <a href="{{ route('product.all') }}" class="text-button text-center link">Tiếp tục mua hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection