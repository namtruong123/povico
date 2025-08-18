@extends('Ecom.layout')
@section('title', $product->name)
@section('content')
@include('Ecom.partials.header', ['cart' => $cart])

<div class="tf-breadcrumb">
    <div class="container">
        <div class="tf-breadcrumb-wrap">
            <div class="tf-breadcrumb-list">
                <a href="{{ route('ecom.home') }}" class="text text-caption-1">Trang chủ</a>
                <i class="icon icon-right"></i>
                <a href="{{ route('product.all') }}" class="text text-caption-1">Sản phẩm</a>
                <i class="icon icon-right"></i>
                <span class="text_secondary2 text-caption-1">{{ $product->name }}</span>
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
                        <div dir="ltr" class="swiper tf-product-media-thumbs other-image-zoom" data-direction="vertical">
                            <div class="swiper-wrapper stagger-wrap">
                                @foreach($product->galleries as $gallery)
                                <div class="swiper-slide stagger-item">
                                    <div class="item">
                                        <img class="lazyload" data-src="{{ asset($gallery->image) }}" src="{{ asset($gallery->image) }}" alt="">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div dir="ltr" class="swiper tf-product-media-main" id="gallery-swiper-started">
                            <div class="swiper-wrapper">
                                @foreach($product->galleries as $gallery)
                                <div class="swiper-slide">
                                    <a href="{{ asset($gallery->image) }}" target="_blank" class="item"
                                        data-pswp-width="600px" data-pswp-height="600px">
                                        <img class="tf-image-zoom lazyload"
                                            data-zoom="{{ asset($gallery->image) }}"
                                            data-src="{{ asset($gallery->image) }}"
                                            src="{{ asset($gallery->image) }}" alt="">
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
                                    </div>
                                </div>
                                <div class="tf-product-info-desc">
                                    <div class="tf-product-info-price">
                                       @if(($product->discount_price ?? $product->price) == 0)
                                            <h5 class="price-on-sale">Liên hệ</h5>
                                        @else
                                            <h5 class="price-on-sale">{{ number_format($product->discount_price ?? $product->price, 0, ',', '.') }}₫</h5>
                                            @if($product->discount_price)
                                                <div class="compare-at-price">{{ number_format($product->price, 0, ',', '.') }}₫</div>
                                                <div class="badges-on-sale text-btn-uppercase">
                                                    -{{ round(100 - ($product->discount_price/$product->price)*100) }}%
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                    <p>{!! $product->short_desc ?? $product->description !!}</p>
                                </div>
                            </div>
                            <form id="add-to-cart-form">
                                <div class="tf-product-info-choose-option gap-19">
                                    <div class="tf-product-info-quantity">
                                        <div class="title mb_12">Số lượng:</div>
                                        <div class="wg-quantity">
                                            <span class="btn-quantity btn-decrease">-</span>
                                            <input class="quantity-product" type="text" name="quantity" value="1" min="1">
                                            <span class="btn-quantity btn-increase">+</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="tf-product-info-by-btn mb_12">
                                            {{-- <a href="javascript:void(0);" class="tf-btn btn-onsurface flex-grow-1 add-to-cart-btn"
                                               data-product-id="{{ $product->id }}" data-quantity="1">
                                                <span>Thêm vào giỏ - </span>
                                                <span class="tf-qty-price total-price">{{ number_format($product->discount_price ?? $product->price, 0, ',', '.') }}₫</span>
                                            </a> --}}
                                            {{-- <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                               class="box-icon hover-tooltip compare show-compare">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip text-caption-2">So sánh</span>
                                            </a>
                                            <a href="javascript:void(0);" class="box-icon hover-tooltip text-caption-2 wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip text-caption-2">Yêu thích</span>
                                            </a> --}}
                                        </div>
                                        <a href="{{ route('checkout') }}" class="tf-btn btn-primary w-full">Mua ngay</a>
                                    </div>
                                </div>
                            </form>
                            <ul class="tf-product-info-sku">
                                <li style="padding-top: 14px;">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Tab mô tả, đánh giá, vận chuyển --}}
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="widget-tabs style-1">
                    <ul class="widget-menu-tab">
                        <li class="item-title active"><span class="inner">Thông số </span></li>
                        {{-- <li class="item-title"><span class="inner">Đánh giá</span></li>
                        <li class="item-title"><span class="inner">Vận chuyển</span></li> --}}
                    </ul>
                    <div class="widget-content-tab">
                        <div class="widget-content-inner active">
                            <div class="tab-description">
                                {!! $product->specifications !!}
                            </div>
                        </div>
                        <div class="widget-content-inner">
                            {{-- Đánh giá sản phẩm --}}
                           
                        </div>
                        <div class="widget-content-inner">
                            <div class="tab-shipping">
                                <p>Miễn phí giao hàng toàn quốc cho đơn từ 500.000₫</p>
                                <p>Thời gian giao hàng: 2-5 ngày làm việc</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Sản phẩm liên quan --}}
{{-- @include('Ecom.product._related', ['relatedProducts' => $relatedProducts ?? []]) --}}
@endsection

@push('scripts')
<script>
$(function(){
    // Tăng giảm số lượng
    $(document).on('click', '.btn-increase, .btn-decrease', function(){
        let $input = $(this).siblings('.quantity-product');
        let val = parseInt($input.val()) || 1;
        val = $(this).hasClass('btn-increase') ? val+1 : Math.max(val-1,1);
        $input.val(val);
        $('.add-to-cart-btn').data('quantity', val);
    });
    // Thêm vào giỏ
    $(document).on('click', '.add-to-cart-btn', function(e){
        e.preventDefault();
        let pid = $(this).data('product-id');
        let qty = $('.quantity-product').val();
        $.post('{{ route("cart.add") }}', {
            _token: '{{ csrf_token() }}',
            product_id: pid,
            quantity: qty
        }, function(res){
            if(res.success){
                // Mở modal giỏ hàng
                if (typeof bootstrap !== 'undefined') {
                    var modal = new bootstrap.Modal(document.getElementById('shoppingCart'));
                    modal.show();
                }
            }
        });
    });
});
</script>
@endpush