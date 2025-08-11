@extends('Ecom.layout')
@section('title', $product->name)
@section('content')
@include('Ecom.partials.header', ['cart' => $cart])
<div class="tf-breadcrumb">
    <div class="container">
        <div class="tf-breadcrumb-wrap">
            <div class="tf-breadcrumb-list">
                {{-- <a href="{{ route('ecom.home') }}" class="text text-caption-1">Trang chủ</a>
                <i class="icon icon-right"></i>
                <a href="{{ route('shop.category', $product->category->slug ?? '') }}" class="text text-caption-1">{{ $product->category->name ?? '' }}</a>
                <i class="icon icon-right"></i>
                <span class="text_secondary2 text-caption-1">{{ $product->name }}</span> --}}
            </div>
        </div>
    </div>
</div>

<section class="flat-spacing">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="tf-product-media-wrap sticky-top">
                    <div class="thumbs-slider">
                        <div class="swiper tf-product-media-thumbs other-image-zoom" data-direction="vertical">
                            <div class="swiper-wrapper stagger-wrap">
                                @if($product->main_image)
                                <div class="swiper-slide stagger-item">
                                    <div class="item">
                                        <img class="lazyload" data-src="{{ asset($product->main_image) }}" src="{{ asset($product->main_image) }}" alt="">
                                    </div>
                                </div>
                                @endif
                                @foreach($product->galleries as $gallery)
                                <div class="swiper-slide stagger-item">
                                    <div class="item">
                                        <img class="lazyload" data-src="{{ asset($gallery->image) }}" src="{{ asset($gallery->image) }}" alt="">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper tf-product-media-main" id="gallery-swiper-started">
                            <div class="swiper-wrapper">
                                @if($product->main_image)
                                <div class="swiper-slide">
                                    <a href="{{ asset($product->main_image) }}" target="_blank" class="item">
                                        <img class="tf-image-zoom lazyload" data-zoom="{{ asset($product->main_image) }}" data-src="{{ asset($product->main_image) }}" src="{{ asset($product->main_image) }}" alt="">
                                    </a>
                                </div>
                                @endif
                                @foreach($product->galleries as $gallery)
                                <div class="swiper-slide">
                                    <a href="{{ asset($gallery->image) }}" target="_blank" class="item">
                                        <img class="tf-image-zoom lazyload" data-zoom="{{ asset($gallery->image) }}" data-src="{{ asset($gallery->image) }}" src="{{ asset($gallery->image) }}" alt="">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="sticky-top">
                    <div class="tf-product-info-wrap position-relative">
                        <div class="tf-product-info-list other-image-zoom">
                            <div class="tf-product-info-heading">
                                <div class="tf-product-info-name">
                                    <h3 class="name">{{ $product->name }}</h3>
                                    <div class="sub">
                                        @if($product->is_best_seller)
                                            <div class="tf-product-tag text-caption-1">Best Seller</div>
                                        @endif
                                        <div class="tf-product-info-rate">
                                            <div class="list-star-default">
                                                <i class="icon icon-star"></i>
                                                <i class="icon icon-star"></i>
                                                <i class="icon icon-star"></i>
                                                <i class="icon icon-star"></i>
                                                <i class="icon icon-star"></i>
                                            </div>
                                            <div class="text text-caption-1">(0 reviews)</div>
                                        </div>
                                        <div class="tf-product-info-sold">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M16.7076 9.80077L7.95759 19.1758C7.86487 19.2747 7.74247 19.3408 7.60888 19.3641C7.47528 19.3874 7.33773 19.3666 7.21699 19.3049C7.09625 19.2432 6.99886 19.1438 6.93953 19.0219C6.88019 18.8999 6.86213 18.762 6.88806 18.6289L8.03338 12.9L3.53103 11.2094C3.43434 11.1732 3.34811 11.1136 3.28005 11.036C3.21199 10.9584 3.16422 10.8651 3.14101 10.7645C3.11779 10.6639 3.11986 10.5591 3.14702 10.4595C3.17418 10.3599 3.22559 10.2686 3.29666 10.1937L12.0467 0.818744C12.1394 0.719788 12.2618 0.653675 12.3954 0.630383C12.529 0.60709 12.6665 0.627882 12.7873 0.68962C12.908 0.751359 13.0054 0.850694 13.0647 0.972636C13.1241 1.09458 13.1421 1.23251 13.1162 1.36562L11.9677 7.10077L16.4701 8.78906C16.5661 8.82547 16.6516 8.88496 16.7191 8.96228C16.7867 9.0396 16.8341 9.13236 16.8573 9.23237C16.8805 9.33237 16.8786 9.43655 16.852 9.53569C16.8253 9.63482 16.7747 9.72587 16.7045 9.80077H16.7076Z" fill="#DC9056"/>
                                            </svg>
                                            <div class="text text-caption-1">{{ $product->views ?? 0 }} lượt xem</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-product-info-desc">
                                    <div class="tf-product-info-price">
                                        <h5 class="price-on-sale">
                                            @if($product->sale_price && $product->sale_price < $product->price)
                                                {{ number_format($product->sale_price) }}₫
                                                <span class="compare-at-price">{{ number_format($product->price) }}₫</span>
                                            @else
                                                {{ number_format($product->price) }}₫
                                            @endif
                                        </h5>
                                        @if($product->sale_price && $product->sale_price < $product->price)
                                            <div class="badges-on-sale text-btn-uppercase">
                                                -{{ round(100 - ($product->sale_price/$product->price)*100) }}%
                                            </div>
                                        @endif
                                    </div>
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                            <div class="tf-product-info-choose-option gap-19 ">
                                <div class="variant-picker-item">
                                    <div class="variant-picker-label mb_12">
                                        Màu:
                                        <span class="text-title variant-picker-label-value value-currentColor">
                                            {{ $product->attribute->name ?? '' }}
                                        </span>
                                    </div>
                                    <div class="variant-picker-values">
                                        @if($product->attribute)
                                            <span class="btn-checkbox" style="background:{{ $product->attribute->color }};width:32px;height:32px;display:inline-block;border-radius:50%;"></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="tf-product-info-quantity">
                                    <div class="title mb_12">Số lượng:</div>
                                    <div class="wg-quantity">
                                        <span class="btn-quantity btn-decrease">-</span>
                                        <input class="quantity-product" type="text" name="number" value="1">
                                        <span class="btn-quantity btn-increase">+</span>
                                    </div>
                                </div>
                                <div class="tf-product-info-by-btn mb_12">
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="tf-btn btn-primary w-full">Thêm vào giỏ hàng</a>
                                    <a href="javascript:void(0);" class="box-icon hover-tooltip wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Yêu thích</span>
                                    </a>
                                </div>
                                <ul class="tf-product-info-sku">
                                    <li>
                                        <p class="text-caption-1">SKU:</p>
                                        <p class="text-caption-1 text-1">{{ $product->sku }}</p>
                                    </li>
                                    <li>
                                        <p class="text-caption-1">Danh mục:</p>
                                        <p class="text-caption-1 text-1">{{ $product->category->name ?? '' }}</p>
                                    </li>
                                    <li>
                                        <p class="text-caption-1">Tình trạng:</p>
                                        <p class="text-caption-1 text-1">{{ $product->quantity > 0 ? 'Còn hàng' : 'Hết hàng' }}</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="tf-product-info-guranteed mt-3">
                                <div class="text-title">Thanh toán an toàn:</div>
                                <div class="tf-payment d-flex">
                                    <img src="{{ asset('assets/frontend/images/payment/payment-1.png') }}" alt="">
                                    <img src="{{ asset('assets/frontend/images/payment/payment-2.png') }}" alt="">
                                    <img src="{{ asset('assets/frontend/images/payment/payment-3.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="widget-tabs style-1">
                    <ul class="widget-menu-tab">
                        <li class="item-title active"><span class="inner">Mô tả</span></li>
                        <li class="item-title"><span class="inner">Thông số kỹ thuật</span></li>
                    </ul>
                    <div class="widget-content-tab">
                        <div class="widget-content-inner active">
                            <div class="tab-description">
                                {!! $product->description !!}
                            </div>
                        </div>
                        <div class="widget-content-inner">
                            <div class="tab-description">
                                {!! $product->specifications !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div