{{-- filepath: f:\povico\resources\views\Ecom\home.blade.php --}}
@extends('Ecom.layout')
@section('title', 'Trang chủ Povico Door')
@section('content')
    @include('Ecom.partials.header')
    @include('Ecom.partials.banner')

    <!-- Categories -->
    <section class="flat-spacing-2">
        <div class="container">
            <div class="col-12">
                <div class="heading-section style-2">
                    <div class="left">
                        <h3 class="wow fadeInUp">Danh mục sản phẩm</h3>
                        <p class="text-body-default text_secondary wow fadeInUp" data-wow-delay="0.1s">Bộ sưu tập cửa mới đã
                            có mặt! Tô điểm vẻ đẹp hiện đại cho ngôi nhà bạn.</p>
                    </div>
                    <div class="right wow fadeInUp">
                        <a href="shop-default.html" class="btn-line">
                            <span>Xem tất cả sản phẩm</span>
                            <i class="icon-arrow-up-right"></i>
                        </a>
                    </div>
                </div>
                <div class="wrap-categories overflow-x-auto style-2">
                    @foreach ($categories as $category)
                        <div class="categories-item hover-img style-2 wow fadeInUp" data-wow-delay="0s">
                            <div class="img-style">
                                <a href="{{ route('shop.category', $category->slug) }}">
                                    <img src="{{ asset($category->image ?? 'assets/frontend/images/section/default-category.jpg') }}"
                                        alt="{{ $category->name }}">
                                </a>
                            </div>
                            <div class="content">
                                <h5 class="title">
                                    <a href="{{ route('shop.category', $category->slug) }}"
                                        class="link">{{ $category->name }}</a>
                                </h5>
                                {{-- @if (isset($category->products_count))
                                    <p class="text-body-default text_secondary">{{ $category->products_count }} sản phẩm</p>
                                @endif --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Our Picks For You -->
    <section class="flat-spacing-2 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-section text-center">
                        <h3 class="wow fadeInUp">SẢN PHẨM MỚI</h3>
                        <p class="text-body-default text_secondary wow fadeInUp" data-wow-delay="0.1s">Fresh styles just in!
                            Elevate your look.</p>
                    </div>
                    <div class="tf-grid-layout tf-col-2 lg-col-4 ">
                        @foreach ($newProducts as $product)
                            <div class="card-product style-3 wow fadeInUp" data-wow-delay="0s">
                                <div class="card-product-wrapper">
                                    <a href="{{ route('product.detail', $product->slug) }}" class="image-wrap">
                                        <img class="lazyload img-product" src="{{ asset($product->main_image) }}"
                                            alt="{{ $product->name }}">
                                    </a>
                                    <div class="list-product-btn">
                                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                                        <span class="icon icon-heart"></span>
                                                        <span class="tooltip">Wishlist</span>
                                                    </a>
                                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                                        class="box-icon compare ">
                                                        <span class="icon icon-compare"></span>
                                                        <span class="tooltip">Compare</span>
                                                    </a>
                                                    <a href="#quickView" data-bs-toggle="modal"
                                                        class="box-icon quickview tf-btn-loading">
                                                        <span class="icon icon-eye"></span>
                                                        <span class="tooltip">Quick View</span>
                                                    </a>
                                                </div>
                                    <div class="list-btn-main">
                                        <form method="POST" action="{{ route('cart.add') }}" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button class="btn-main-product" type="submit">Thêm vào giỏ</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-product-info ">
                                    <a href="{{ route('product.detail', $product->slug) }}"
                                        class="text-body-default link">{{ $product->name }}</a>
                                    <div class="price text-body-default ">
                                        @if ($product->sale_price && $product->sale_price < $product->price)
                                            <span
                                                class="text-caption-1 old-price">{{ number_format($product->price) }}₫</span>
                                            {{ number_format($product->sale_price) }}₫
                                        @else
                                            {{ number_format($product->price) }}₫
                                        @endif
                                    </div>
                                    @if (isset($product->attribute) && !empty($product->attribute->color))
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span
                                                    class="d-none text-capitalize color-filter">{{ $product->attribute->name }}</span>
                                                <span class="swatch-value"
                                                    style="background:{{ $product->attribute->color }}"></span>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lookbook -->
    <section class="section-lookbook">
        <div class="left-img">
            <div class="cls-lookbook">
                <div class="img-style ">
                    <img class="lazyload" data-src="{{ asset('assets/frontend/images/banner/banner-lookbook-1.jpg') }}"
                        src="{{ asset('assets/frontend/images/banner/banner-lookbook-1.jpg') }}" alt="banner-cls">
                </div>
                <div class="lookbook-item position1 swiper-button" data-slide="0">
                    <div class="dropup-center dropup">
                        <div class="tf-pin-btn style-2">
                            <span></span>
                        </div>
                        <div class="loobook-product-wrap">
                            <div class="loobook-product">
                                <div class="img-style">
                                    <img src="{{ asset('assets/frontend/images/gallery/lookbook-3.jpg') }}" alt="img">
                                </div>
                                <div class="content">
                                    <div class="info">
                                        <a href="product-detail.html" class="text-title text-line-clamp-1 link">Double
                                            Standing Desk</a>
                                        <div class="price text-button">$69.99</div>
                                    </div>
                                    <a href="#quickView" data-bs-toggle="modal" class="btn-lookbook btn-line">Quick
                                        View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lookbook-item position2 swiper-button" data-slide="1">
                    <div class="dropup-center dropup">
                        <div class="tf-pin-btn style-2">
                            <span></span>
                        </div>
                        <div class="loobook-product-wrap">
                            <div class="loobook-product">
                                <div class="img-style">
                                    <img src="{{ asset('assets/frontend/images/gallery/lookbook-1.jpg') }}"
                                        alt="img">
                                </div>
                                <div class="content">
                                    <div class="info">
                                        <a href="product-detail.html" class="text-title text-line-clamp-1 link">Ergonomic
                                            Headrest</a>
                                        <div class="price text-button">$69.99</div>
                                    </div>
                                    <a href="#quickView" data-bs-toggle="modal" class="btn-lookbook btn-line">Quick
                                        View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-product">
            <div class="heading-section">
                <h3 class="wow fadeInUp">Start With These <br> Curated Spaces</h3>
                <p class="text-body-default text_secondary wow fadeInUp" data-wow-delay="0s">
                    Comfort and style meet to blissful perfection
                </p>
            </div>
            <div class="swiper tf-sw-lookbook sw-lookbook-wrap" data-loop="true" data-preview="1" data-tablet="1"
                data-mobile="1" data-space-lg="20" data-space-md="20" data-space="10" data-pagination="1"
                data-pagination-md="1" data-pagination-lg="1">
                <div class="swiper-wrapper">
                    @foreach($lookbooks as $lookbook)
                    <div class="swiper-slide">
                        <div class="card-product style-1">
                            <div class="card-product-wrapper">
                                <a href="{{ $lookbook->product_link }}" class="image-wrap">
                                    <img class="lazyload img-product" src="{{ asset($lookbook->image) }}" alt="image-product">
                                    @if($lookbook->hover_image)
                                    <img class="lazyload img-hover" src="{{ asset($lookbook->hover_image) }}" alt="image-product">
                                    @endif
                                </a>
                                <!-- ...các nút Wishlist, Compare, QuickView... -->
                            </div>
                            <div class="card-product-info ">
                                <a href="{{ $lookbook->product_link }}" class="text-title title link">{{ $lookbook->title }}</a>
                                <div class="price text-body-default ">{{ number_format($lookbook->price, 0, ',', '.') }}₫</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="sw-pagination-lookbook sw-dots type-circle justify-content-center"></div>
            </div>
        </div>
    </section>

    <!-- Top Sellers -->
    <section class="flat-spacing-2 pt-0 section-best-sellers">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-section text-center">
                        <h3 class="wow fadeInUp">Sản phẩm bán chạy</h3>
                        <p class="text-body-default text_secondary wow fadeInUp" data-wow-delay="0.1s">
                            Những sản phẩm được khách hàng lựa chọn nhiều nhất!
                        </p>
                    </div>
                    <div class="sw-button-over">
                        <div class="swiper tf-sw-collection" data-preview="3" data-tablet="3" data-mobile-sm="2"
                            data-mobile="1" data-space-lg="30" data-space-md="20" data-space="15" data-loop="false">
                            <div class="swiper-wrapper">
                                @forelse($bestSellerProducts as $product)
                                    <div class="swiper-slide">
                                        <div class="card-product style-1">
                                            <div class="card-product-wrapper">
                                                <a href="{{ route('product.detail', $product->slug) }}" class="image-wrap">
                                                    <img class="lazyload img-product"
                                                        src="{{ asset($product->main_image) }}"
                                                        alt="{{ $product->name }}">
                                                    @if($product->hover_image)
                                                        <img class="lazyload img-hover"
                                                            src="{{ asset($product->hover_image) }}"
                                                            alt="{{ $product->name }}">
                                                    @endif
                                                </a>
                                                {{-- Tag HOT --}}
                                                <div class="product-labels">
                                                    <span class="badge badge-danger" style="position:absolute;top:10px;left:10px;z-index:2;">HOT</span>
                                                </div>
                                                @if($product->sale_price && $product->sale_price < $product->price)
                                                    <div class="on-sale-wrap">
                                                        <span class="on-sale-item">
                                                            -{{ round(100 - ($product->sale_price / $product->price * 100)) }}%
                                                        </span>
                                                    </div>
                                                @endif
                                                <div class="list-product-btn">
                                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                                        <span class="icon icon-heart"></span>
                                                        <span class="tooltip">Wishlist</span>
                                                    </a>
                                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                                        class="box-icon compare ">
                                                        <span class="icon icon-compare"></span>
                                                        <span class="tooltip">Compare</span>
                                                    </a>
                                                    <a href="#quickView" data-bs-toggle="modal"
                                                        class="box-icon quickview tf-btn-loading">
                                                        <span class="icon icon-eye"></span>
                                                        <span class="tooltip">Quick View</span>
                                                    </a>
                                                </div>
                                                <div class="list-btn-main">
                                                    <form method="POST" action="{{ route('cart.add') }}" style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <input type="hidden" name="quantity" value="1">
                                                        <button class="btn-main-product" type="submit">Thêm vào giỏ</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="card-product-info ">
                                                <a href="{{ route('product.detail', $product->slug) }}" class="text-body-default link">
                                                    {{ $product->name }}
                                                </a>
                                                <div class="price text-body-default ">
                                                    @if(empty($product->price) || $product->price == 0)
                                                        <span class="text-danger">Liên hệ</span>
                                                    @elseif($product->sale_price && $product->sale_price < $product->price)
                                                        <span class="text-caption-1 old-price">{{ number_format($product->price) }}₫</span>
                                                        {{ number_format($product->sale_price) }}₫
                                                    @else
                                                        {{ number_format($product->price) }}₫
                                                    @endif
                                                </div>
                                                @if (isset($product->attribute) && !empty($product->attribute->color))
                                                    <ul class="list-color-product">
                                                        <li class="list-color-item color-swatch active">
                                                            <span class="d-none text-capitalize color-filter">{{ $product->attribute->name }}</span>
                                                            <span class="swatch-value" style="background:{{ $product->attribute->color }}"></span>
                                                        </li>
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-4 w-100">Không có sản phẩm bán chạy.</div>
                                @endforelse
                            </div>
                            <div class="sw-pagination-collection sw-dots  type-circle d-flex justify-content-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial -->
    <section class="flat-spacing-2 pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="swiper md-mb-30 tf-sw-testimonial sw-button-bottom-right" data-preview="1"
                        data-tablet="1" data-mobile="1" data-space-lg="15" data-space-md="15" data-space="15"
                        data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-item hover-img style-3">
                                    <div class="content">
                                        <div class="content-top">
                                            <div class="box-icon wow fadeInUp">
                                                <div class="icon ">
                                                    <i class="icon-quote-1"></i>
                                                </div>
                                                <p class="text-title">Customer Say!</p>
                                            </div>
                                            <h4 class="text-onsurface wow fadeInUp" data-wow-delay="0.1s">"Fantastic shop!
                                                Great selection, fair
                                                prices, and
                                                friendly staff. Highly recommended. The quality of the products is
                                                exceptional,
                                                and the prices are very reasonable!"</h4>
                                            <div class="box-author d-flex gap-6 wow fadeInUp" data-wow-delay="0.2s">
                                                <div class="list-star-default color-primary">
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                </div>
                                                <h6 class=" author"><a href="#" class="link">Lisa K.<span
                                                            class="text-title text_secondary2">/ Stylist</span></a>
                                                </h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-item hover-img style-3">
                                    <div class="content">
                                        <div class="content-top">
                                            <div class="box-icon">
                                                <div class="icon">
                                                    <i class="icon-quote-1"></i>
                                                </div>
                                                <p class="text-title">Customer Say!</p>
                                            </div>
                                            <h4 class="text-onsurface">"Fantastic shop! Great selection, fair
                                                prices, and
                                                friendly staff. Highly recommended. The quality of the products is
                                                exceptional,
                                                and the prices are very reasonable!"</h4>
                                            <div class="box-author d-flex gap-6">
                                                <div class="list-star-default color-primary">
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                </div>
                                                <h6 class=" author"><a href="#" class="link">Lisa K.<span
                                                            class="text-title text_secondary2">/ Stylist</span></a>
                                                </h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-button">
                            <div class="sw-button swiper-button-prev nav-prev-testimonial has-border"></div>
                            <div class="sw-button swiper-button-next nav-next-testimonial has-border"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="collection-position style-3">
                        <div class="img-style ">
                            <img class="lazyload effect-paralax"
                                data-src="{{ asset('assets/frontend/images/banner/banner-2.jpg') }}"
                                src="{{ asset('assets/frontend/images/banner/banner-2.jpg') }}" alt="banner-cls">
                        </div>
                        <div class="content cls-content">
                            <div class="cart-item style-2 bundle-hover-item">
                                <div class="image-cart">
                                    <img src="{{ asset('assets/frontend/images/shop/cart-item-3.jpg') }}" alt="">
                                </div>
                                <div class="info">
                                    <div class="name text-body-default">
                                        <a href="product-detail.html" class="link text-title">
                                            Open Box - Adjustable Laptop Stand
                                        </a>
                                    </div>
                                    <div class="price text-button">
                                        $60.00
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Collection -->
    <section>
        <div class="container-2">
            <div class="row">
                <div class="col-12">
                    <div class="collection-position style-full style-6">
                        <div class="img-style">
                            <img class="lazyload effect-paralax"
                                data-src="{{ asset('assets/frontend/images/banner/banner-9.jpg') }}"
                                src="{{ asset('assets/frontend/images/banner/banner-9.jpg') }}" alt="banner-cls">
                        </div>
                        <div class="content cls-content">
                            <div class="cls-heading">
                                <h3 class="wow fadeInUp"> <a href="product-detail.html" class="link text_white"> Super
                                        Sale Up To 50% </a>
                                </h3>
                                <p class="text_white text-body-default wow fadeInUp" data-wow-delay="0.1s">Reserved for
                                    special occasions</p>
                            </div>
                            <a href="product-detail.html" class="tf-btn btn-white mx-auto wow fadeInUp"
                                data-wow-delay="0.2s">Explore Collection <i class="icon-arrow-up-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tin tức -->
    <section class="flat-spacing-2 section-news-insight">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-section">
                        <h3 class="wow fadeInUp">News Insight</h3>
                        <p class="text-body-default text_secondary wow fadeInUp" data-wow-delay="0.1s">
                            Browse our Top Trending: the hottest picks loved by all.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                    $mainPost = $posts->first();
                    $otherPosts = $posts->slice(1, 2);
                @endphp
                <div class="col-lg-6 col-xl-7">
                    @if($mainPost)
                    <div class="collection-position style-2 spacing-2 has-over">
                        <a href="{{ route('posts.show', $mainPost->slug) }}" class="img-style no-opacity w-100">
                            <img class="lazyload"
                                data-src="{{ asset($mainPost->image ?? 'assets/frontend/images/banner/banner-10.jpg') }}"
                                src="{{ asset($mainPost->image ?? 'assets/frontend/images/banner/banner-10.jpg') }}"
                                alt="{{ $mainPost->title }}">
                        </a>
                        <div class="content cls-content">
                            <div class="cls-heading">
                                <ul class="meta mb-0">
                                    <li class="text-button-small">
                                        <a href="#" class="link text-white">{{ $mainPost->created_at->format('F d, Y') }}</a>
                                    </li>
                                    <li class="text-button-small text-white">
                                        by <a href="#" class="link text-white">Admin</a>
                                    </li>
                                </ul>
                                <div>
                                    <h4 class="mb_8">
                                        <a href="{{ route('posts.show', $mainPost->slug) }}" class="link text_white">
                                            {{ $mainPost->title }}
                                        </a>
                                    </h4>
                                    <p class="text_white">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($mainPost->content), 120) }}
                                    </p>
                                </div>
                            </div>
                            <a href="{{ route('posts.show', $mainPost->slug) }}" class="link text-white text-button">Read More</a>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-6 col-xl-5">
                    <div class="relatest-post">
                        @foreach($otherPosts as $post)
                        <div class="relatest-post-item style-2 style-row hover-image">
                            <div class="image">
                                <a href="{{ route('posts.show', $post->slug) }}">
                                    <img class="lazyload"
                                        data-src="{{ asset($post->image ?? 'assets/frontend/images/banner/banner-11.jpg') }}"
                                        src="{{ asset($post->image ?? 'assets/frontend/images/banner/banner-11.jpg') }}"
                                        alt="{{ $post->title }}">
                                </a>
                                <div class="article-label">
                                    <a href="#" class="text-button-small">Tin tức</a>
                                </div>
                            </div>
                            <div class="content">
                                <ul class="meta">
                                    <li class="text-button-small">
                                        <a href="#" class="link">{{ $post->created_at->format('F d, Y') }}</a>
                                    </li>
                                    <li class="text-button-small">
                                        by <a href="#" class="link">Admin</a>
                                    </li>
                                </ul>
                                <h5 class="title mb-0">
                                    <a class="link" href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                                </h5>
                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 80) }}</p>
                                <a href="{{ route('posts.show', $post->slug) }}" class="text-button link text-decoration">Read More</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Instagram -->
    <section class="flat-spacing-2 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-section text-center">
                        <h3>Shop Instagram</h3>
                        <p class="text-body-default text_secondary">Elevate your wardrobe with fresh finds today!
                        </p>
                    </div>
                    <div class="swiper tf-sw-shop-gallery" data-preview="5" data-tablet="3" data-mobile="2"
                        data-space-lg="10" data-space-md="10" data-space="8" data-pagination="2" data-pagination-md="3"
                        data-pagination-lg="1">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="gallery-item hover-overlay hover-img wow fadeInUp" data-wow-delay="0s">
                                    <div class="img-style">
                                        <img class="lazyload img-hover"
                                            data-src="{{ asset('assets/frontend/images/gallery/gallery-1.jpg') }}"
                                            src="{{ asset('assets/frontend/images/gallery/gallery-1.jpg') }}"
                                            alt="image-gallery">
                                    </div>
                                    <a href="product-detail.html" class="box-icon hover-tooltip"><span
                                            class="icon icon-eye"></span> <span class="tooltip">View
                                            Product</span></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-item hover-overlay hover-img wow fadeInUp" data-wow-delay=".1s">
                                    <div class="img-style">
                                        <img class="lazyload img-hover"
                                            data-src="{{ asset('assets/frontend/images/gallery/gallery-2.jpg') }}"
                                            src="{{ asset('assets/frontend/images/gallery/gallery-2.jpg') }}"
                                            alt="image-gallery">
                                    </div>
                                    <a href="product-detail.html" class="box-icon hover-tooltip"><span
                                            class="icon icon-eye"></span> <span class="tooltip">View
                                            Product</span></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-item hover-overlay hover-img wow fadeInUp" data-wow-delay=".2s">
                                    <div class="img-style">
                                        <img class="lazyload img-hover"
                                            data-src="{{ asset('assets/frontend/images/gallery/gallery-3.jpg') }}"
                                            src="{{ asset('assets/frontend/images/gallery/gallery-3.jpg') }}"
                                            alt="image-gallery">
                                    </div>
                                    <a href="product-detail.html" class="box-icon hover-tooltip"><span
                                            class="icon icon-eye"></span> <span class="tooltip">View
                                            Product</span></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-item hover-overlay hover-img wow fadeInUp" data-wow-delay=".3s">
                                    <div class="img-style">
                                        <img class="lazyload img-hover"
                                            data-src="{{ asset('assets/frontend/images/gallery/gallery-4.jpg') }}"
                                            src="{{ asset('assets/frontend/images/gallery/gallery-4.jpg') }}"
                                            alt="image-gallery">
                                    </div>
                                    <a href="product-detail.html" class="box-icon hover-tooltip"><span
                                            class="icon icon-eye"></span> <span class="tooltip">View
                                            Product</span></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-item hover-overlay hover-img wow fadeInUp" data-wow-delay=".4s">
                                    <div class="img-style">
                                        <img class="lazyload img-hover"
                                            data-src="{{ asset('assets/frontend/images/gallery/gallery-5.jpg') }}"
                                            src="{{ asset('assets/frontend/images/gallery/gallery-5.jpg') }}"
                                            alt="image-gallery">
                                    </div>
                                    <a href="product-detail.html" class="box-icon hover-tooltip"><span
                                            class="icon icon-eye"></span> <span class="tooltip">View
                                            Product</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="sw-pagination-gallery sw-dots type-circle justify-content-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefit -->
    <section class="flat-spacing-2 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div dir="ltr" class="swiper tf-sw-iconbox" data-preview="4" data-tablet="3"
                        data-mobile-sm="2" data-mobile="1" data-space-lg="30" data-space-md="30" data-space="15"
                        data-pagination="1" data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="4">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="tf-box-icon">
                                    <div class="icon">
                                        <i class="icon-package"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">Free & fast delivery</h5>
                                        <p>No extra costs, just the price you see.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-box-icon">
                                    <div class="icon">
                                        <i class="icon-arrow-down-left"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">14-Day Returns</h5>
                                        <p>Risk-free shopping with easy returns.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-box-icon">
                                    <div class="icon">
                                        <i class="icon-lifebuoy"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">24/7 Support</h5>
                                        <p>24/7 support, always here just for you</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-box-icon">
                                    <div class="icon">
                                        <i class="icon-sealpercent"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">Member Discounts</h5>
                                        <p>Special prices for our loyal customers.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sw-pagination-iconbox sw-dots type-circle d-flex justify-content-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer" class="footer">
        <footer id="footer" class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-body">
                            <div class="footer-left">
                                <div class="footer-infor flex-grow-1">
                                    <div class="footer-menu">
                                        <div class="footer-col-block">
                                            <h5 class="footer-heading text_white footer-heading-mobile">
                                                Infomation
                                            </h5>
                                            <div class="tf-collapse-content">
                                                <ul class="footer-menu-list">
                                                    <li class="text-body-default">
                                                        <a href="about.html" class="link footer-menu_item">About Us</a>
                                                    </li>
                                                    <li class="text-body-default">
                                                        <a href="store-list.html" class="link footer-menu_item">Our
                                                            Stories</a>
                                                    </li>
                                                    <li class="text-body-default">
                                                        <a href="#" class="link footer-menu_item">Size Guide</a>
                                                    </li>
                                                    <li class="text-body-default">
                                                        <a href="contact.html" class="link footer-menu_item">Contact
                                                            us</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="footer-col-block">
                                            <h5 class="footer-heading text_white footer-heading-mobile">
                                                Customer Services
                                            </h5>
                                            <div class="tf-collapse-content">
                                                <ul class="footer-menu-list">
                                                    <li class="text-body-default">
                                                        <a href="#" class="link footer-menu_item">Shipping</a>
                                                    </li>
                                                    <li class="text-body-default">
                                                        <a href="#" class="link footer-menu_item">Return &amp;
                                                            Refund</a>
                                                    </li>
                                                    <li class="text-body-default">
                                                        <a href="#" class="link footer-menu_item">Privacy Policy</a>
                                                    </li>
                                                    <li class="text-body-default">
                                                        <a href="term-of-use.html" class="link footer-menu_item">Terms
                                                            &amp; Conditions</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-phone-number">
                                        <h4 class="text_white number">+61 (9) 567 8765 43</h4>
                                        <h4 class="text_white mail">hello@yourname.com</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-col-block footer-newsletter">
                                <h3 class="footer-heading footer-heading-mobile text_white">
                                    Stay in the loop with Weekly newsletters
                                </h3>
                                <div class="tf-collapse-content">
                                    <form id="subscribe-form" action="#" class="form-newsletter subscribe-form"
                                        method="post" accept-charset="utf-8" data-mailchimp="true">
                                        <div id="subscribe-content" class="subscribe-content">
                                            <fieldset class="email">
                                                <input id="subscribe-email" type="email" name="email-form"
                                                    class="subscribe-email" placeholder="Enter your e-mail"
                                                    tabindex="0" aria-required="true">
                                            </fieldset>
                                            <div class="button-submit">
                                                <button id="subscribe-button" class="subscribe-button text-body-default "
                                                    type="button">Subscribe<i class="icon-arrow-up-right"></i></button>
                                            </div>
                                        </div>
                                        <div id="subscribe-msg" class="subscribe-msg"></div>
                                    </form>
                                    <ul class="tf-social-icon type-2">
                                        <li><a href="#" class="social-facebook"><i
                                                    class="icon icon-facebook"></i></a></li>
                                        <li><a href="#" class="social-twiter"><i class="icon icon-x"></i></a></li>
                                        <li><a href="#" class="social-instagram"><i
                                                    class="icon icon-instagram"></i></a>

                                        <li><a href="#" class="social-amazon"><i
                                                    class="icon icon-telegram"></i></a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-bottom-wrap">
                                <div class="left">
                                    <p class="text-body-default text_white">Copyright ©2025 GearO. All Rights Reserved.</p>
                                </div>
                                <div class="center">
                                    <div class="tf-currencies">
                                        <select class="image-select center style-default style-box  type-currencies">
                                            <option selected data-thumbnail="images/country/us.svg">English (USD)
                                            </option>
                                            <option data-thumbnail="images/country/vn.svg">Vietnam (VND)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tf-payment">
                                    <ul>
                                        <li>
                                            <img src="{{ asset('assets/frontend/images/payment/payment-1.png') }}"
                                                alt="">
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/frontend/images/payment/payment-2.png') }}"
                                                alt="">
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/frontend/images/payment/payment-3.png') }}"
                                                alt="">
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/frontend/images/payment/payment-4.png') }}"
                                                alt="">
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/frontend/images/payment/payment-5.png') }}"
                                                alt="">
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/frontend/images/payment/payment-6.png') }}"
                                                alt="">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </footer>

    <!-- Toolbar Bottom -->
    <div class="tf-toolbar-bottom">
        <div class="toolbar-item">
            <a href="shop-default.html">
                <div class="toolbar-icon">
                    <span class="icon icon-squaresfour"></span>
                </div>
                <div class="toolbar-label">Shop</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="#shopCategories" data-bs-toggle="offcanvas" aria-controls="shopCategories">
                <div class="toolbar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000"
                        viewBox="0 0 256 256">
                        <path
                            d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
                        </path>
                    </svg>
                </div>
                <div class="toolbar-label">Categories</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="#search" data-bs-toggle="modal">
                <div class="toolbar-icon">
                    <span class="icon icon-search"></span>
                </div>
                <div class="toolbar-label">Search</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="wish-list.html">
                <div class="toolbar-icon">
                    <span class="icon icon-heart"></span>
                </div>
                <div class="toolbar-label">Wishlist</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="#shoppingCart" data-bs-toggle="modal">
                <div class="toolbar-icon">
                    <span class="icon icon-cart"></span>
                </div>
                <div class="toolbar-label">Cart</div>
            </a>
        </div>
    </div>

      <!-- mobile menu -->
    <div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
        <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        <div class="mb-canvas-content">
            <div class="mb-body">
                <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                    <li class="nav-mb-item active">
                        <a href="#dropdown-menu-one" class="collapsed mb-menu-link" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-one">
                            <span>Home</span>
                            <span class="btn-open-sub"></span>
                        </a>
                        <div id="dropdown-menu-one" class="collapse">
                            <ul class="sub-nav-menu">
                                <li><a href="index.html" class="sub-nav-link">Homepage 01</a></li>
                                <li><a href="home-2.html" class="sub-nav-link">Homepage 02</a></li>
                                <li><a href="home-3.html" class="sub-nav-link">Homepage 03</a></li>
                                <li><a href="home-4.html" class="sub-nav-link">Homepage 04</a></li>
                                <li><a href="home-5.html" class="sub-nav-link active">Homepage 05</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-two" class="collapsed mb-menu-link" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dropdown-menu-two">
                            <span>Shop</span>
                            <span class="btn-open-sub"></span>
                        </a>
                        <div id="dropdown-menu-two" class="collapse">
                            <ul class="sub-nav-menu">
                                <li>
                                    <a href="#sub-shop-one" class="sub-nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" aria-controls="sub-shop-one">
                                        <span>Shop Layout</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-shop-one" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="shop-default.html" class="sub-nav-link">Shop Default</a></li>
                                            <li><a href="shop-list.html" class="sub-nav-link">Shop List</a></li>
                                            <li><a href="shop-full-grid.html" class="sub-nav-link">Shop Full Grid</a></li>
                                            <li><a href="shop-full-list.html" class="sub-nav-link">Shop Full List</a></li>
                                            <li><a href="shop-sidebar-left.html" class="sub-nav-link">Shop Sidebar Left</a></li>
                                            <li><a href="shop-sidebar-right.html" class="sub-nav-link">Shop Sidebar Right</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#sub-shop-two" class="sub-nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" aria-controls="sub-shop-two">
                                        <span>Shop Filter</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-shop-two" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="shop-filter-canvas.html" class="sub-nav-link">Filter Canvas</a></li>
                                            <li><a href="shop-filter-dropdown.html" class="sub-nav-link">Filter Dropdown</a></li>
                                            <li><a href="shop-filter-sidebar.html" class="sub-nav-link">Filter Sidebar</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#sub-shop-three" class="sub-nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" aria-controls="sub-shop-three">
                                        <span>Shop Pagination</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-shop-three" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="shop-pagination.html" class="sub-nav-link">Pagination</a></li>
                                            <li><a href="shop-load-button.html" class="sub-nav-link">Load Button</a></li>
                                            <li><a href="shop-infinite-scrolling.html" class="sub-nav-link">Infinite Scrolling</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#sub-shop-four" class="sub-nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" aria-controls="sub-shop-four">
                                        <span>Product Style</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-shop-four" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="product-style-01.html" class="sub-nav-link">Product Style 1</a></li>
                                            <li><a href="product-style-02.html" class="sub-nav-link">Product Style 2</a></li>
                                            <li><a href="product-style-03.html" class="sub-nav-link">Product Style 3</a></li>
                                            <li><a href="product-style-04.html" class="sub-nav-link">Product Style 4</a></li>
                                            <li><a href="product-style-05.html" class="sub-nav-link">Product Style 5</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#sub-shop-five" class="sub-nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" aria-controls="sub-shop-five">
                                        <span>My Pages</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-shop-five" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="shopping-cart.html" class="sub-nav-link">Shopping Cart</a></li>
                                            <li><a href="checkout.html" class="sub-nav-link">Check Out</a></li>
                                            <li><a href="order.html" class="sub-nav-link">Order Tracking</a></li>
                                            <li><a href="login.html" class="sub-nav-link">Login/Register</a></li>
                                            <li><a href="wish-list.html" class="sub-nav-link">Wish List</a></li>
                                            <li><a href="search-result.html" class="sub-nav-link">Search</a></li>
                                            <li><a href="my-account.html" class="sub-nav-link">My Account</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-three" class="collapsed mb-menu-link" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dropdown-menu-three">
                            <span>Products</span>
                            <span class="btn-open-sub"></span>
                        </a>
                        <div id="dropdown-menu-three" class="collapse">
                            <ul class="sub-nav-menu">
                                <li>
                                    <a href="#sub-products-one" class="sub-nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" aria-controls="sub-products-one">
                                        <span>Products Layout</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-products-one" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="product-detail.html" class="sub-nav-link">Product Detail</a></li>
                                            <li><a href="product-thumbnails-right.html" class="sub-nav-link">Product Thumbnails Right</a></li>
                                            <li><a href="product-thumbnails-bottom.html" class="sub-nav-link">Product Thumbnails Bottom</a></li>
                                            <li><a href="product-grid-1.html" class="sub-nav-link">Product Grid 1</a></li>
                                            <li><a href="product-grid-2.html" class="sub-nav-link">Product Grid 2</a></li>
                                            <li><a href="product-stacked.html" class="sub-nav-link">Product Stacked</a></li>
                                            <li><a href="product-description-accordion.html" class="sub-nav-link">Product Description Accordion</a></li>
                                            <li><a href="product-description-list.html" class="sub-nav-link">Product Description List</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#sub-products-two" class="sub-nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" aria-controls="sub-products-two">
                                        <span>Colors Swatched</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-products-two" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="product-swatch-image.html" class="sub-nav-link">Product Swatch Image</a></li>
                                            <li><a href="product-swatch-image-rounded.html" class="sub-nav-link">Product Swatch Image Rounded</a></li>
                                            <li><a href="product-swatch-dropdown.html" class="sub-nav-link">Product Swatch Dropdown</a></li>
                                            <li><a href="product-swatch-dropdown-color.html" class="sub-nav-link">Product Swatch Dropdown Color</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#sub-products-three" class="sub-nav-link collapsed" data-bs-toggle="collapse" aria-expanded="true" aria-controls="sub-products-three">
                                        <span>Products Features</span>
                                        <span class="btn-open-sub"></span>
                                    </a>
                                    <div id="sub-products-three" class="collapse">
                                        <ul class="sub-nav-menu sub-menu-level-2">
                                            <li><a href="product-bought-together.html" class="sub-nav-link">Product Bought Together</a></li>
                                            <li><a href="product-bought-together-2.html" class="sub-nav-link">Product Bought Together 2</a></li>
                                            <li><a href="product-up-sell.html" class="sub-nav-link">Product Up Sell</a></li>
                                            <li><a href="product-pre-order.html" class="sub-nav-link">Product Pre Order</a></li>
                                            <li><a href="product-grouped.html" class="sub-nav-link">Product Grouped</a></li>
                                            <li><a href="product-out-of-stock.html" class="sub-nav-link">Product Out Of Stock</a></li>
                                            <li><a href="product-pickup-available.html" class="sub-nav-link">Product Pickup Available</a></li>
                                            <li><a href="product-external.html" class="sub-nav-link">Product External</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-four" class="collapsed mb-menu-link" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-four">
                            <span>Blog</span>
                            <span class="btn-open-sub"></span>
                        </a>
                        <div id="dropdown-menu-four" class="collapse">
                            <ul class="sub-nav-menu">
                                <li><a href="blog-list.html" class="sub-nav-link">Blog List</a></li>
                                <li><a href="blog-grid.html" class="sub-nav-link">Blog Grid</a></li>
                                <li><a href="blog-details.html" class="sub-nav-link">Blog Detail</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-five" class="collapsed mb-menu-link" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-five">
                            <span>Page</span>
                            <span class="btn-open-sub"></span>
                        </a>
                        <div id="dropdown-menu-five" class="collapse">
                            <ul class="sub-nav-menu">
                                <li><a href="about.html" class="sub-nav-link">About Us</a></li>
                                <li><a href="faqs.html" class="sub-nav-link">Faqs</a></li>
                                <li><a href="store-list.html" class="sub-nav-link">Store List</a></li>
                                <li><a href="term-of-use.html" class="sub-nav-link">Term Of Use</a></li>
                                <li><a href="contact.html" class="sub-nav-link">Contact Us</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class="mb-other-content">
                    <div class="group-icon">
                        <a href="wish-list.html" class="site-nav-icon">
                            <svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20.8401 4.60987C20.3294 4.09888 19.7229 3.69352 19.0555 3.41696C18.388 3.14039 17.6726 2.99805 16.9501 2.99805C16.2276 2.99805 15.5122 3.14039 14.8448 3.41696C14.1773 3.69352 13.5709 4.09888 13.0601 4.60987L12.0001 5.66987L10.9401 4.60987C9.90843 3.57818 8.50915 2.99858 7.05012 2.99858C5.59109 2.99858 4.19181 3.57818 3.16012 4.60987C2.12843 5.64156 1.54883 7.04084 1.54883 8.49987C1.54883 9.95891 2.12843 11.3582 3.16012 12.3899L4.22012 13.4499L12.0001 21.2299L19.7801 13.4499L20.8401 12.3899C21.3511 11.8791 21.7565 11.2727 22.033 10.6052C22.3096 9.93777 22.4519 9.22236 22.4519 8.49987C22.4519 7.77738 22.3096 7.06198 22.033 6.39452C21.7565 5.72706 21.3511 5.12063 20.8401 4.60987V4.60987Z"
                                    stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Wishlist
                        </a>
                        <a href="search-result.html" class="site-nav-icon">
                            <svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                                    stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21.35 21.0004L17 16.6504" stroke="#181818" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Search
                        </a>
                        <a href="login.html" class="site-nav-icon">
                            <svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21"
                                    stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"
                                    stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Login
                        </a>

                    </div>
                    <div class="mb-notice">
                        <a href="contact.html" class="text-need">Need help ?</a>
                    </div>
                    <ul class="mb-info">
                        <li>Address: 1234 Fashion Street, Suite 567, <br> New York, NY 10001</li>
                        <li>Email: <b>example@example.com</b></li>
                        <li>Phone: <b>(212) 555-1234</b></li>
                    </ul>
                </div>
            </div>
            <div class="mb-bottom">
                <div class="bottom-bar-language">
                    <div class="tf-currencies">
                        <select class="image-select center style-default type-currencies">
                            <option selected data-thumbnail="images/country/us.svg">USD</option>
                            <option data-thumbnail="images/country/vn.svg">VND</option>
                        </select>
                    </div>
                    <div class="tf-languages">
                        <select class="image-select center style-default type-languages">
                            <option>English</option>
                            <option>Vietnam</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /mobile menu -->

    <!-- Categories -->
    <div class="offcanvas offcanvas-start canvas-filter canvas-categories" id="shopCategories">
        <div class="canvas-wrapper">
            <div class="canvas-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256">
                                    <path d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
                                    </path>
                                </svg>
                <h5>Categories</h5>
                <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
            </div>
            <div class="canvas-body">
                <div class="wd-facet-categories">
                    <div role="dialog" class="facet-title collapsed" data-bs-target="#forChair" data-bs-toggle="collapse" aria-expanded="true" aria-controls="forChair">
                        <img class="avt" src="images/shop/product-1.jpg" alt="avt">
                        <span class="title">Chair</span>
                        <span class="icon icon-down"></span>
                    </div>
                    <div id="forChair" class="collapse">
                        <ul class="facet-body">
                            <li>
                                <a href="shop-default.html" class="item link"><img class="avt" src="images/shop/product-1.jpg" alt="avt"><span class="title-sub text-caption-1 text-secondary">Saddle Chair</span></a>
                            </li>
                            <li>
                                <a href="shop-default.html" class="item link"><img class="avt" src="images/shop/product-1.jpg" alt="avt"><span class="title-sub text-caption-1 text-secondary">Ergonomic Chair</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="wd-facet-categories">
                    <div role="dialog" class="facet-title collapsed" data-bs-target="#forDesk" data-bs-toggle="collapse" aria-expanded="true" aria-controls="forDesk">
                        <img class="avt" src="images/shop/popup-slidebar-item-2.jpg" alt="avt">
                        <span class="title">Desk</span>
                        <span class="icon icon-down"></span>
                    </div>
                    <div id="forDesk" class="collapse">
                        <ul class="facet-body">
                            <li>
                                <a href="shop-default.html" class="item link"><img class="avt" src="images/shop/popup-slidebar-item-2.jpg" alt="avt"><span class="title-sub text-caption-1 text-secondary">Office Desk</span></a>
                            </li>
                            <li>
                                <a href="shop-default.html" class="item link"><img class="avt" src="images/shop/popup-slidebar-item-2.jpg" alt="avt"><span class="title-sub text-caption-1 text-secondary">Standing Desk</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="wd-facet-categories">
                    <div role="dialog" class="facet-title collapsed" data-bs-target="#forPhone" data-bs-toggle="collapse" aria-expanded="true" aria-controls="forPhone">
                        <img class="avt" src="images/shop/product-5.jpg" alt="avt">
                        <span class="title">Phone</span>
                        <span class="icon icon-down"></span>
                    </div>
                    <div id="forPhone" class="collapse">
                        <ul class="facet-body">
                            <li>
                                <a href="shop-default.html" class="item link"><img class="avt" src="images/shop/product-5.jpg" alt="avt"><span class="title-sub text-caption-1 text-secondary">Charging Pad</span></a>
                            </li>
                            <li>
                                <a href="shop-default.html" class="item link"><img class="avt" src="images/shop/product-5.jpg" alt="avt"><span class="title-sub text-caption-1 text-secondary">Charging Stand</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="wd-facet-categories">
                    <div role="dialog" class="facet-title collapsed" data-bs-target="#forLamp" data-bs-toggle="collapse" aria-expanded="true" aria-controls="forLamp">
                        <img class="avt" src="images/gallery/gallery-3.jpg" alt="avt">
                        <span class="title">Lamp</span>
                        <span class="icon icon-down"></span>
                    </div>
                    <div id="forLamp" class="collapse">
                        <ul class="facet-body">
                            <li>
                                <a href="shop-default.html" class="item link"><img class="avt" src="images/gallery/gallery-3.jpg" alt="avt"><span class="title-sub text-caption-1 text-secondary">Reflection Lamp</span></a>
                            </li>
                            <li>
                                <a href="shop-default.html" class="item link"><img class="avt" src="images/gallery/gallery-3.jpg" alt="avt"><span class="title-sub text-caption-1 text-secondary">Shore Lamp</span></a>
                            </li>
                        </ul>
                    </div>
                </div>     
            </div>
        </div>
    </div> 
    <!-- /Categories -->

    <!-- shoppingCart -->
    <!-- Modal Giỏ hàng -->
  
    <!-- /shoppingCart -->

    <!-- .quickView -->
    <div class="modal fullRight fade modal-quick-view" id="quickView">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="tf-quick-view-image">
                    <div class="wrap-quick-view wrapper-scroll-quickview">
                        <div class="quickView-item item-scroll-quickview" data-scroll-quickview="beige">
                            <img class="lazyload" data-src="images/shop/quickview-slidebar-1.jpg"
                                src="images/shop/quickview-slidebar-1.jpg" alt="">
                        </div>
                        <div class="quickView-item item-scroll-quickview" data-scroll-quickview="gray">
                            <img class="lazyload" data-src="images/shop/quickview-slidebar-2.jpg"
                                src="images/shop/quickview-slidebar-2.jpg" alt="">
                        </div>
                        <div class="quickView-item item-scroll-quickview" data-scroll-quickview="grey">
                            <img class="lazyload" data-src="images/shop/quickview-slidebar-3.jpg"
                                src="images/shop/quickview-slidebar-3.jpg" alt="">
                        </div>
                        <div class="quickView-item item-scroll-quickview">
                            <img class="lazyload" data-src="images/shop/quickview-slidebar-4.jpg"
                                src="images/shop/quickview-slidebar-4.jpg" alt="">
                        </div>
                        <div class="quickView-item item-scroll-quickview">
                            <img class="lazyload" data-src="images/shop/quickview-slidebar-5.jpg"
                                src="images/shop/quickview-slidebar-5.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="wrap">
                    <div class="header">
                        <h5 class="title">Quick View</h5>
                        <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                    </div>
                    <div class="tf-product-info-list">
                        <div class="tf-product-info-heading">
                            <div class="tf-product-info-name">
                                <h3 class="name">Ergonomic Chair Pro</h3>
                                <div class="sub">
                                    <div class="tf-product-info-rate">
                                        <div class="list-star-default">
                                            <i class="icon icon-star"></i>
                                            <i class="icon icon-star"></i>
                                            <i class="icon icon-star"></i>
                                            <i class="icon icon-star"></i>
                                            <i class="icon icon-star"></i>
                                        </div>
                                        <div class="text text-caption-1">(134 reviews)</div>
                                    </div>
                                    <div class="tf-product-info-sold">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.7076 9.80077L7.95759 19.1758C7.86487 19.2747 7.74247 19.3408 7.60888 19.3641C7.47528 19.3874 7.33773 19.3666 7.21699 19.3049C7.09625 19.2432 6.99886 19.1438 6.93953 19.0219C6.88019 18.8999 6.86213 18.762 6.88806 18.6289L8.03338 12.9L3.53103 11.2094C3.43434 11.1732 3.34811 11.1136 3.28005 11.036C3.21199 10.9584 3.16422 10.8651 3.14101 10.7645C3.11779 10.6639 3.11986 10.5591 3.14702 10.4595C3.17418 10.3599 3.22559 10.2686 3.29666 10.1937L12.0467 0.818744C12.1394 0.719788 12.2618 0.653675 12.3954 0.630383C12.529 0.60709 12.6665 0.627882 12.7873 0.68962C12.908 0.751359 13.0054 0.850694 13.0647 0.972636C13.1241 1.09458 13.1421 1.23251 13.1162 1.36562L11.9677 7.10077L16.4701 8.78906C16.5661 8.82547 16.6516 8.88496 16.7191 8.96228C16.7867 9.0396 16.8341 9.13236 16.8573 9.23237C16.8805 9.33237 16.8786 9.43655 16.852 9.53569C16.8253 9.63482 16.7747 9.72587 16.7045 9.80077H16.7076Z"
                                                fill="#DC9056" />
                                        </svg>

                                        <div class="text text-caption-1">18 sold in last 32 hours</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tf-product-info-desc">
                                <div class="tf-product-info-price">
                                    <h5 class="price-on-sale">$79.99</h5>
                                    <div class="compare-at-price">$98.99</div>
                                    <div class="badges-on-sale text-btn-uppercase">-25%
                                    </div>
                                </div>
                                <p>The garments labelled as Committed are products that have been produced using
                                    sustainable fibres or processes, reducing their environmental impact.</p>
                                <div class="tf-product-info-liveview">
                                    <i class="icon icon-eye"></i>
                                    <p class="text-caption-1">
                                        <span class="liveview-count">28</span>
                                        people are viewing this right now
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tf-product-info-choose-option">
                            <div class="variant-picker-item">
                                <div class="variant-picker-label mb_12">
                                    Colors:<span class="text-title variant-picker-label-value">Beige</span>
                                </div>
                                <div class="variant-picker-values">
                                    <input id="values-beige1" type="radio" name="color2" checked>
                                    <label
                                        class="hover-tooltip tooltip-bot radius-60 color-btn btn-scroll-quickview active"
                                        data-slide="0" data-price="79.99" for="values-beige1" data-value="Beige"
                                        data-scroll-quickview="beige">
                                        <span class="btn-checkbox bg-color-beige1"></span>
                                        <span class="tooltip">Beige</span>
                                    </label>
                                    <input id="values-gray1" type="radio" name="color2">
                                    <label class="hover-tooltip tooltip-bot radius-60 color-btn btn-scroll-quickview"
                                        data-slide="1" data-price="79.99" for="values-gray1" data-value="Gray"
                                        data-scroll-quickview="gray">
                                        <span class="btn-checkbox bg-color-gray"></span>
                                        <span class="tooltip">Gray</span>
                                    </label>
                                    <input id="values-grey1" type="radio" name="color2">
                                    <label class="hover-tooltip tooltip-bot radius-60 color-btn btn-scroll-quickview"
                                        data-slide="2" data-price="89.99" for="values-grey1" data-value="Grey"
                                        data-scroll-quickview="grey">
                                        <span class="btn-checkbox bg-color-grey"></span>
                                        <span class="tooltip">Grey</span>
                                    </label>
                                </div>
                            </div>
                            <div class="variant-picker-item">
                                <div class="d-flex justify-content-between mb_12">
                                    <div class="variant-picker-label">
                                        Size:<span class="text-title variant-picker-label-value">Size c -
                                            Large</span>
                                    </div>
                                    <a class="size-guide text-title link show-size-guide">Size Guide</a>
                                </div>
                                <div class="variant-picker-values gap12">
                                    <input type="radio" name="size2" id="values-s1">
                                    <label class="style-text size-btn" for="values-s1" data-value="Size A - Small">
                                        <span class="text-title">Size A - Small</span>
                                    </label>
                                    <input type="radio" name="size2" id="values-m1">
                                    <label class="style-text size-btn" for="values-m1" data-price="89.99"
                                        data-value="Size B - Medium">
                                        <span class="text-title">Size B - Medium</span>
                                    </label>

                                </div>
                            </div>
                            <div class="tf-product-info-quantity">
                                <div class="title mb_12">Quantity:</div>
                                <div class="wg-quantity">
                                    <span class="btn-quantity btn-decrease">-</span>
                                    <input class="quantity-product" type="text" name="number" value="1">
                                    <span class="btn-quantity btn-increase">+</span>
                                </div>
                            </div>
                            <div>
                                <div class="tf-product-info-by-btn mb_10">
                                    <a class="tf-btn btn-onsurface flex-grow-1   show-shopping-cart">
                                        <span>Add to cart -&nbsp;</span>
                                        <span class="tf-qty-price total-price">$79.99</span>
                                    </a>
                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                        class="box-icon hover-tooltip compare  show-compare">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip text-caption-2">Compare</span>
                                    </a>
                                    <a href="javascript:void(0);"
                                        class="box-icon hover-tooltip text-caption-2 wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip text-caption-2">Wishlist</span>
                                    </a>
                                </div>
                                <a href="#" class="tf-btn btn-primary w-full">Buy it now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.quickView -->

    <!-- size-guide -->
    <div class="modal fade modal-size-guide" id="size-guide">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content widget-tabs style-2">
                <table class="tab-sizeguide-table">
                    <thead>
                        <tr>
                            <th>Size</th>
                            <th>US</th>
                            <th>Bust</th>
                            <th>Waist</th>
                            <th>Low Hip</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>XS</td>
                            <td>2</td>
                            <td>32</td>
                            <td>24 - 25</td>
                            <td>33 - 34</td>
                        </tr>
                        <tr>
                            <td>S</td>
                            <td>4</td>
                            <td>26 - 27</td>
                            <td>34 - 35</td>
                            <td>35 - 26</td>
                        </tr>
                        <tr>
                            <td>M</td>
                            <td>6</td>
                            <td>28 - 29</td>
                            <td>36 - 37</td>
                            <td>38 - 40</td>
                        </tr>
                        <tr>
                            <td>L</td>
                            <td>8</td>
                            <td>30 - 31</td>
                            <td>38 - 29</td>
                            <td>42 - 44</td>
                        </tr>
                        <tr>
                            <td>XL</td>
                            <td>10</td>
                            <td>32 - 33</td>
                            <td>40 - 41</td>
                            <td>45 - 47</td>
                        </tr>
                        <tr>
                            <td>XXL</td>
                            <td>12</td>
                            <td>34 - 35</td>
                            <td>42 - 43</td>
                            <td>48 - 50</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /size-guide -->

    <!-- search -->
    <div class="modal fade modal-search" id="search">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Search</h5>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <form class="form-search">
                    <fieldset class="text">
                        <input type="text" placeholder="Searching..." class="" name="text" tabindex="0" value=""
                            aria-required="true" required="">
                    </fieldset>
                    <button class="" type="submit">
                        <svg class="icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                                stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M21.35 21.0004L17 16.6504" stroke="#181818" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </form>
                <div>
                    <h5 class="mb_16">Feature keywords Today</h5>
                    <ul class="list-tags">
                        <li><a href="#" class="radius-60 link">Dresses</a></li>
                        <li><a href="#" class="radius-60 link">Dresses women</a></li>
                        <li><a href="#" class="radius-60 link">Dresses midi</a></li>
                        <li><a href="#" class="radius-60 link">Dress summer</a></li>
                    </ul>
                </div>
                <div>
                    <h6 class="mb_16">Recently viewed products</h6>
                    <div class="tf-grid-layout tf-col-2 lg-col-3 xl-col-4 loadmore-item" data-display="4"
                        data-count="4">
                        <div class="card-product style-1 fl-item">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="image-wrap">
                                    <img class="lazyload img-product" data-src="images/shop/product-1.jpg"
                                        src="images/shop/product-1.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/shop/product-1.1.jpg"
                                        src="images/shop/product-1.1.jpg" alt="image-product">
                                </a>
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Wishlist</span>
                                    </a>
                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                        class="box-icon compare ">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                    <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <span class="icon icon-eye"></span>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info ">
                                <a href="product-detail.html" class="title link">Ergonomic Chair Pro</a>
                                <div class="price text-body-default "><span
                                        class="text-caption-1 old-price">$98.00</span>$79.99</div>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active">
                                        <span class="d-none text-capitalize color-filter">Light Blue</span>
                                        <span class="swatch-value bg-light-blue"></span>
                                        <img class="lazyload" data-src="images/shop/product-1.2.jpg"
                                            src="images/shop/product-1.2.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Blue</span>
                                        <span class="swatch-value bg-light-blue-2"></span>
                                        <img class="lazyload" data-src="images/shop/product-1.3.jpg"
                                            src="images/shop/product-1.3.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-product style-1 fl-item">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="image-wrap">
                                    <img class="lazyload img-product" data-src="images/shop/product-2.jpg"
                                        src="images/shop/product-2.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/shop/product-2.1.jpg"
                                        src="images/shop/product-2.1.jpg" alt="image-product">
                                </a>
                                <div class="on-sale-wrap"><span class="on-sale-item">-25%</span>
                                </div>
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Wishlist</span>
                                    </a>
                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                        class="box-icon compare ">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                    <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <span class="icon icon-eye"></span>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info ">
                                <a href="product-detail.html" class="title link">Open Box - Adjustable Laptop Stand</a>
                                <div class="price text-body-default "><span
                                        class="text-caption-1 old-price">$98.00</span>$79.99</div>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active">
                                        <span class="d-none text-capitalize color-filter">Light Blue</span>
                                        <span class="swatch-value bg-light-blue"></span>
                                        <img class="lazyload" data-src="images/shop/product-2.jpg"
                                            src="images/shop/product-2.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Blue</span>
                                        <span class="swatch-value bg-light-blue-2"></span>
                                        <img class="lazyload" data-src="images/shop/product-2.2.jpg"
                                            src="images/shop/product-2.2.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-product style-1 fl-item">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="image-wrap">
                                    <img class="lazyload img-product" data-src="images/shop/product-3.jpg"
                                        src="images/shop/product-3.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/shop/product-3.1.jpg"
                                        src="images/shop/product-3.1.jpg" alt="image-product">
                                </a>
                                <div class="on-sale-wrap"><span class="on-sale-item">-25%</span>
                                </div>
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Wishlist</span>
                                    </a>
                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                        class="box-icon compare ">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                    <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <span class="icon icon-eye"></span>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info ">
                                <a href="product-detail.html" class="title link">Laptop Stand</a>
                                <div class="price text-body-default "><span
                                        class="text-caption-1 old-price">$98.00</span>$89.99</div>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active">
                                        <span class="d-none text-capitalize color-filter">Light Orange</span>
                                        <span class="swatch-value bg-light-orange"></span>
                                        <img class="lazyload" data-src="images/shop/product-3.2.jpg"
                                            src="images/shop/product-3.2.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Grey</span>
                                        <span class="swatch-value bg-light-grey"></span>
                                        <img class="lazyload" data-src="images/shop/product-3.3.jpg"
                                            src="images/shop/product-3.3.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-product style-1 fl-item">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="image-wrap">
                                    <img class="lazyload img-product" data-src="images/shop/product-4.jpg"
                                        src="images/shop/product-4.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/shop/product-4.1.jpg"
                                        src="images/shop/product-4.1.jpg" alt="image-product">
                                </a>
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Wishlist</span>
                                    </a>
                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                        class="box-icon compare ">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                    <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <span class="icon icon-eye"></span>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info ">
                                <a href="product-detail.html" class="title link">Double Standing Desk</a>
                                <div class="price text-body-default ">$69.99</div>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active">
                                        <span class="d-none text-capitalize color-filter">Light Brown</span>
                                        <span class="swatch-value bg-light-brown"></span>
                                        <img class="lazyload" data-src="images/shop/product-4.2.jpg"
                                            src="images/shop/product-4.2.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Bink</span>
                                        <span class="swatch-value bg-light-pink"></span>
                                        <img class="lazyload" data-src="images/shop/product-4.3.jpg"
                                            src="images/shop/product-4.3.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Grey</span>
                                        <span class="swatch-value bg-dark-grey-2"></span>
                                        <img class="lazyload" data-src="images/shop/product-4.4.jpg"
                                            src="images/shop/product-4.4.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-product style-1 fl-item">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="image-wrap">
                                    <img class="lazyload img-product" data-src="images/shop/product-5.jpg"
                                        src="images/shop/product-5.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/shop/product-5.1.jpg"
                                        src="images/shop/product-5.1.jpg" alt="image-product">
                                </a>
                                <div class="on-sale-wrap"><span class="on-sale-item">-25%</span>
                                </div>
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Wishlist</span>
                                    </a>
                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                        class="box-icon compare ">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                    <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <span class="icon icon-eye"></span>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info ">
                                <a href="product-detail.html" class="title link">Wireless Charging Dock</a>
                                <div class="price text-body-default "><span
                                        class="text-caption-1 old-price">$98.00</span>$89.99</div>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active">
                                        <span class="d-none text-capitalize color-filter">Light Orange</span>
                                        <span class="swatch-value bg-light-orange"></span>
                                        <img class="lazyload" data-src="images/shop/product-5.2.jpg"
                                            src="images/shop/product-5.2.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Grey</span>
                                        <span class="swatch-value bg-light-grey"></span>
                                        <img class="lazyload" data-src="images/shop/product-5.3.jpg"
                                            src="images/shop/product-5.3.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-product style-1 fl-item">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="image-wrap">
                                    <img class="lazyload img-product" data-src="images/shop/product-6.jpg"
                                        src="images/shop/product-6.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/shop/product-6.1.jpg"
                                        src="images/shop/product-6.1.jpg" alt="image-product">
                                </a>
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Wishlist</span>
                                    </a>
                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                        class="box-icon compare ">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                    <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <span class="icon icon-eye"></span>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info ">
                                <a href="product-detail.html" class="title link">Ergonomic Headrest</a>
                                <div class="price text-body-default "><span
                                        class="text-caption-1 old-price">$98.00</span>$79.99</div>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active">
                                        <span class="d-none text-capitalize color-filter">Light Blue</span>
                                        <span class="swatch-value bg-light-blue"></span>
                                        <img class="lazyload" data-src="images/shop/product-6.jpg"
                                            src="images/shop/product-6.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Blue</span>
                                        <span class="swatch-value bg-light-blue-2"></span>
                                        <img class="lazyload" data-src="images/shop/product-6.2.jpg"
                                            src="images/shop/product-6.2.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-product style-1 fl-item">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="image-wrap">
                                    <img class="lazyload img-product" data-src="images/shop/product-7.jpg"
                                        src="images/shop/product-7.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/shop/product-7.1.jpg"
                                        src="images/shop/product-7.1.jpg" alt="image-product">
                                </a>
                                <div class="on-sale-wrap"><span class="on-sale-item">-25%</span>
                                </div>
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Wishlist</span>
                                    </a>
                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                        class="box-icon compare ">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                    <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <span class="icon icon-eye"></span>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info ">
                                <a href="product-detail.html" class="title link">Hybrid Laptop Sleeve</a>
                                <div class="price text-body-default "><span
                                        class="text-caption-1 old-price">$98.00</span>$79.99</div>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active">
                                        <span class="d-none text-capitalize color-filter">Light Blue</span>
                                        <span class="swatch-value bg-light-blue"></span>
                                        <img class="lazyload" data-src="images/shop/product-7.2.jpg"
                                            src="images/shop/product-7.2.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Blue</span>
                                        <span class="swatch-value bg-light-blue-2"></span>
                                        <img class="lazyload" data-src="images/shop/product-7.3.jpg"
                                            src="images/shop/product-7.3.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-product style-1 fl-item">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="image-wrap">
                                    <img class="lazyload img-product" data-src="images/shop/product-8.jpg"
                                        src="images/shop/product-8.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/shop/product-8.1.jpg"
                                        src="images/shop/product-8.1.jpg" alt="image-product">
                                </a>
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Wishlist</span>
                                    </a>
                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                        class="box-icon compare ">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                    <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <span class="icon icon-eye"></span>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info ">
                                <a href="product-detail.html" class="title link">Wireless Charging Tray</a>
                                <div class="price text-body-default ">$69.99</div>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active">
                                        <span class="d-none text-capitalize color-filter">Light Brown</span>
                                        <span class="swatch-value bg-light-brown"></span>
                                        <img class="lazyload" data-src="images/shop/product-8.2.jpg"
                                            src="images/shop/product-8.2.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Bink</span>
                                        <span class="swatch-value bg-light-pink"></span>
                                        <img class="lazyload" data-src="images/shop/product-8.3.jpg"
                                            src="images/shop/product-8.3.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Grey</span>
                                        <span class="swatch-value bg-dark-grey-2"></span>
                                        <img class="lazyload" data-src="images/shop/product-8.4.jpg"
                                            src="images/shop/product-8.4.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-product style-1 fl-item">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="image-wrap">
                                    <img class="lazyload img-product" data-src="images/shop/product-9.jpg"
                                        src="images/shop/product-9.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/shop/product-9.1.jpg"
                                        src="images/shop/product-9.1.jpg" alt="image-product">
                                </a>
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Wishlist</span>
                                    </a>
                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                        class="box-icon compare ">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                    <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <span class="icon icon-eye"></span>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info ">
                                <a href="product-detail.html" class="title link">Softside Chair</a>
                                <div class="price text-body-default "><span
                                        class="text-caption-1 old-price">$98.00</span>$79.99</div>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active">
                                        <span class="d-none text-capitalize color-filter">Light Blue</span>
                                        <span class="swatch-value bg-light-blue"></span>
                                        <img class="lazyload" data-src="images/shop/product-9.2.jpg"
                                            src="images/shop/product-9.2.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Blue</span>
                                        <span class="swatch-value bg-light-blue-2"></span>
                                        <img class="lazyload" data-src="images/shop/product-9.3.jpg"
                                            src="images/shop/product-9.3.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-product style-1 fl-item">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="image-wrap">
                                    <img class="lazyload img-product" data-src="images/shop/product-10.jpg"
                                        src="images/shop/product-10.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/shop/product-10.1.jpg"
                                        src="images/shop/product-10.1.jpg" alt="image-product">
                                </a>
                                <div class="on-sale-wrap"><span class="on-sale-item">-25%</span>
                                </div>
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Wishlist</span>
                                    </a>
                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                        class="box-icon compare ">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                    <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <span class="icon icon-eye"></span>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info ">
                                <a href="product-detail.html" class="title link">Double Standing Desk</a>
                                <div class="price text-body-default "><span
                                        class="text-caption-1 old-price">$98.00</span>$79.99</div>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active">
                                        <span class="d-none text-capitalize color-filter">Light Blue</span>
                                        <span class="swatch-value bg-light-blue"></span>
                                        <img class="lazyload" data-src="images/shop/product-10.2.jpg"
                                            src="images/shop/product-10.2.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Blue</span>
                                        <span class="swatch-value bg-light-blue-2"></span>
                                        <img class="lazyload" data-src="images/shop/product-10.3.jpg"
                                            src="images/shop/product-10.3.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-product style-1 fl-item">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="image-wrap">
                                    <img class="lazyload img-product" data-src="images/shop/product-11.jpg"
                                        src="images/shop/product-11.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/shop/product-11.1.jpg"
                                        src="images/shop/product-11.1.jpg" alt="image-product">
                                </a>
                                <div class="on-sale-wrap"><span class="on-sale-item">-25%</span>
                                </div>
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Wishlist</span>
                                    </a>
                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                        class="box-icon compare ">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                    <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <span class="icon icon-eye"></span>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info ">
                                <a href="product-detail.html" class="title link">Duo Standing Desk</a>
                                <div class="price text-body-default "><span
                                        class="text-caption-1 old-price">$98.00</span>$89.99</div>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active">
                                        <span class="d-none text-capitalize color-filter">Light Orange</span>
                                        <span class="swatch-value bg-light-orange"></span>
                                        <img class="lazyload" data-src="images/shop/product-11.2.jpg"
                                            src="images/shop/product-11.2.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Grey</span>
                                        <span class="swatch-value bg-light-grey"></span>
                                        <img class="lazyload" data-src="images/shop/product-11.3.jpg"
                                            src="images/shop/product-11.3.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-product style-1 fl-item">
                            <div class="card-product-wrapper">
                                <a href="product-detail.html" class="image-wrap">
                                    <img class="lazyload img-product" data-src="images/shop/product-12.jpg"
                                        src="images/shop/product-12.jpg" alt="image-product">
                                    <img class="lazyload img-hover" data-src="images/shop/product-12.1.jpg"
                                        src="images/shop/product-12.1.jpg" alt="image-product">
                                </a>
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Wishlist</span>
                                    </a>
                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                        class="box-icon compare ">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a>
                                    <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <span class="icon icon-eye"></span>
                                        <span class="tooltip">Quick View</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                        cart</a>
                                </div>
                            </div>
                            <div class="card-product-info ">
                                <a href="product-detail.html" class="title link">Alumina Lamp</a>
                                <div class="price text-body-default ">$69.99</div>
                                <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active">
                                        <span class="d-none text-capitalize color-filter">Light Brown</span>
                                        <span class="swatch-value bg-light-brown"></span>
                                        <img class="lazyload" data-src="images/shop/product-12.2.jpg"
                                            src="images/shop/product-12.2.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Bink</span>
                                        <span class="swatch-value bg-light-pink"></span>
                                        <img class="lazyload" data-src="images/shop/product-12.3.jpg"
                                            src="images/shop/product-12.3.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Grey</span>
                                        <span class="swatch-value bg-dark-grey-2"></span>
                                        <img class="lazyload" data-src="images/shop/product-12.4.jpg"
                                            src="images/shop/product-12.4.jpg" alt="image-product">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Load Item -->
                <div class="wd-load view-more-button text-center">
                    <button class="tf-loading btn-loadmore tf-btn btn-reset"><span
                            class="text text-btn text-btn-uppercase">Load more</span></button>
                </div>
            </div>
        </div>
    </div>
    <!-- /search -->
  
@endsection

@push('scripts')
<script>
$(function(){
  function refresh(){
    $.getJSON('{{ route("cart.modal") }}', function(json){
      $('#shoppingCart .tf-mini-cart-items').html(json.items);
      $('#shoppingCart .tf-totals-total-value').text(json.total);
      $('.count-box.text-button-small').text(json.count);
    });
  }

  refresh();

  // Add to cart
  $(document).on('click','.add-to-cart-btn',function(e){
    e.preventDefault();
    $.post('{{route("cart.add")}}',{
      _token:'{{csrf_token()}}',
      product_id:$(this).data('product-id'),
      quantity:$(this).data('quantity')||1
    },function(res){
      if(res.success) {
        refresh();
        // Mở modal giỏ hàng
        if (typeof bootstrap !== 'undefined') {
          var modal = new bootstrap.Modal(document.getElementById('shoppingCart'));
          modal.show();
        }
      }
    });
  });

  // Update quantity
  $(document).on('click','.btn-increase, .btn-decrease',function(){
    let id=$(this).data('id'),
        cur= parseInt($('[data-id="'+id+'"].quantity-product').val()),
        qty= $(this).hasClass('btn-increase')?cur+1:cur-1;
    qty=Math.max(qty,1);
    $.post('{{route("cart.update")}}',{
      _token:'{{csrf_token()}}',
      product_id:id, quantity:qty
    },function(res){ if(res.success) refresh(); });
  });

  // Remove sản phẩm
  $(document).on('click','.tf-btn-remove, .btn-remove-item',function(e){
    e.preventDefault();
    let id=$(this).data('id');
    $.post('{{route("cart.remove")}}',{
      _token:'{{csrf_token()}}',
      product_id:id
    },function(res){ if(res.success) refresh(); });
  });

  // Khi modal mở cũng load lại giỏ hàng
  document.getElementById('shoppingCart')?.addEventListener('show.bs.modal', refresh);

  // Đảm bảo các nút mở modal đều hoạt động ở mọi trang
  $(document).on('click', '[data-bs-toggle="modal"][data-bs-target="#shoppingCart"], a[href="#shoppingCart"]', function(e){
    e.preventDefault();
    if (typeof bootstrap !== 'undefined') {
      var modal = new bootstrap.Modal(document.getElementById('shoppingCart'));
      modal.show();
    }
    refresh();
  });
});
</script>
@endpush