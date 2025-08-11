@extends('Ecom.layout')

@section('title', 'Thanh toán')

@section('content')

@include('Ecom.partials.header', ['cart' => $cart])
<div class="space-1"></div>
<!-- .page-title -->
<div class="page-title relative">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title">Thanh toán</h3>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('ecom.home') }}">Trang chủ</a></li>
                        <li>Thanh toán</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.page-title -->

<section>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="flat-spacing tf-page-checkout">
                    <div class="wrap">
                        <h5 class="title">Thông tin khách hàng</h5>
                        <form class="info-box" method="POST" action="{{ route('checkout.process') }}">
                            @csrf
                            <div class="grid-2">
                                <input type="text" name="customer_name" placeholder="Họ và tên*" required>
                                <input type="text" name="customer_phone" placeholder="Số điện thoại*" required>
                            </div>
                            <div class="grid-2">
                                <input type="email" name="customer_email" placeholder="Email*" required>
                                <input type="text" name="customer_address" placeholder="Địa chỉ nhận hàng*" required>
                            </div>
                            <div class="tf-select">
                                <select class="text-title" name="customer_city" required>
                                    <option value="">Chọn tỉnh/thành phố</option>
                                    <option value="Hà Nội">Hà Nội</option>
                                    <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                    <option value="Đà Nẵng">Đà Nẵng</option>
                                    <option value="Hải Phòng">Hải Phòng</option>
                                    <option value="Cần Thơ">Cần Thơ</option>
                                    <option value="Khác">Khác</option>
                                </select>
                            </div>
                            <textarea name="note" placeholder="Ghi chú đơn hàng..."></textarea>
                            <div class="wrap mt-3">
                                <h5 class="title">Phương thức thanh toán</h5>
                                <div class="payment-box" id="payment-box">
                                    <div class="payment-item payment-choose-card active">
                                        <label>
                                            <input type="radio" name="payment_method" value="cod" checked>
                                            <span class="text-title">Thanh toán khi nhận hàng (COD)</span>
                                        </label>
                                    </div>
                                    <div class="payment-item">
                                        <label>
                                            <input type="radio" name="payment_method" value="bank">
                                            <span class="text-title">Chuyển khoản ngân hàng</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button class="tf-btn btn-onsurface mt-3" type="submit">Đặt hàng<i class="icon-arrow-up-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-1">
                <div class="line-separation"></div>
            </div>
            <div class="col-xl-5">
                <div class="flat-spacing flat-sidebar-checkout">
                    <div class="sidebar-checkout-content">
                        <h5 class="title">Giỏ hàng</h5>
                        <div class="list-product">
                            @forelse($cart as $item)
                            <div class="item-product">
                                <a href="{{ route('product.detail', $item['slug']) }}" class="img-product">
                                    <img src="{{ asset($item['image']) }}" alt="img-product">
                                </a>
                                <div class="content-box">
                                    <div class="info">
                                        <a href="{{ route('product.detail', $item['slug']) }}" class="name-product link text-title">
                                            {{ $item['name'] }}
                                        </a>
                                        @if(!empty($item['variant']))
                                            <div class="variant text-caption-1">
                                                {{ $item['variant'] }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="total-price text-button">
                                        <span class="count">{{ $item['quantity'] }}</span>
                                        x <span class="price">{{ number_format($item['price'], 0, ',', '.') }}₫</span>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="item-product">
                                <div class="content-box">
                                    <div class="info">
                                        <span class="name-product link text-title">Giỏ hàng trống</span>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <div class="sec-discount">
                            <div class="ip-discount-code">
                                <form method="POST" action="{{ route('cart.add') }}">
                                    @csrf
                                    <input type="text" name="coupon" placeholder="Nhập mã giảm giá">
                                    <button class="tf-btn btn-onsurface">
                                        Áp dụng mã
                                    </button>
                                </form>
                            </div>
                            <p class="text-body-default">Mã giảm giá chỉ áp dụng cho đơn hàng trên 500,000₫</p>
                        </div>
                        <div class="sec-total-price">
                            <div class="top">
                                <div class="item d-flex align-items-center justify-content-between text-button">
                                    <span>Phí vận chuyển</span>
                                    <span>Miễn phí</span>
                                </div>
                                <div class="item d-flex align-items-center justify-content-between text-button">
                                    <span>Giảm giá</span>
                                    <span>
                                        @php
                                            $discount = session('discount', 0);
                                        @endphp
                                        -{{ number_format($discount, 0, ',', '.') }}₫
                                    </span>
                                </div>
                            </div>
                            <div class="bottom">
                                <h5 class="d-flex justify-content-between">
                                    <span>Tổng tiền</span>
                                    @php
                                        $subtotal = collect($cart)->sum(function($item){return $item['price']*$item['quantity'];});
                                        $total = $subtotal - $discount;
                                    @endphp
                                    <span class="total-price-checkout">{{ number_format($total, 0, ',', '.') }}₫</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection