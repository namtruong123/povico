@php
    $cart = $cart ?? session('cart', []);
    $currentRoute = Route::currentRouteName();
    $whiteHeaderRoutes = ['ecom.home'];
    $isWhiteHeader = in_array($currentRoute, $whiteHeaderRoutes);
@endphp
<style>
.header-dark.bg-dark {
    background: #23272b !important;
}
.header-default.header-fixed {
    position: sticky;
    top: 0;
    z-index: 1002;
    width: 100%;
    min-height: 70px;
}
@media (max-width: 1200px) {
    .container-full {
        padding-left: 15px;
        padding-right: 15px;
    }
}
</style>
<header id="header"
    class="header-default header-absolute header-style-2 header-fixed{{ $isWhiteHeader ? '' : ' header-dark bg-dark' }}">
    <div class="main-header has-border-y">
        <div class="container-full">
            <div class="row wrapper-header align-items-center">
                <div class="col-xl-3 col-2 d-xl-none">
                    <a href="#mobileMenu" class="mobile-menu" data-bs-toggle="offcanvas"
                        aria-controls="mobileMenu">
                        <!-- icon giữ nguyên -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" viewBox="0 0 256 256">
                            <path d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="col-xl-5 d-none d-xl-block">
                    <nav class="box-navigation text-center">
                        <ul class="box-nav-ul justify-content-start">
                            <!-- Trang chủ -->
                            <li class="menu-item">
                                <a href="{{ route('ecom.home') }}" class="item-link {{ $isWhiteHeader ? 'text_white' : 'text-light' }}">TRANG CHỦ</a>
                            </li>
                            <!-- Cửa hàng -->
                            <li class="menu-item">
                                <a href="{{ route('product.all') }}" class="item-link {{ $isWhiteHeader ? 'text_white' : 'text-light' }}">CỬA HÀNG<i class="icon icon-down"></i></a>
                                <div class="sub-menu mega-menu mega-menu-1">
                                    <div class="container">
                                        <div class="row-demo-1">
                                            <div class="mega-menu-list">
                                                <div class="mega-menu-item">
                                                    <div class="list-categories-inner">
                                                        <div class="menu-heading text-title">Danh mục sản phẩm</div>
                                                        <ul>
                                                            @php
                                                                $categories = \App\Models\Category::whereNull('parent_id')->with('children')->get();
                                                            @endphp
                                                            @foreach($categories as $category)
                                                                <li>
                                                                    <a href="{{ route('shop.category', ['slug' => $category->slug]) }}" class="categories-item text_secondary ">
                                                                        <span class="inner-left">
                                                                            {{ $category->name }}
                                                                            @if($category->color)
                                                                                <span style="display:inline-block;width:16px;height:16px;border-radius:50%;background:{{ $category->color }};margin-left:5px;border:1px solid #ccc;"></span>
                                                                            @endif
                                                                            @php
                                                                                $firstProduct = $category->products()->orderBy('price', 'asc')->first();
                                                                            @endphp
                                                                            @if($firstProduct)
                                                                                <span style="margin-left:8px;color:#f60;font-weight:bold;">{{ number_format($firstProduct->price, 0, ',', '.') }}₫</span>
                                                                            @endif
                                                                        </span>
                                                                    </a>
                                                                    @if($category->children->count())
                                                                        <ul class="sub-categories">
                                                                            @foreach($category->children as $child)
                                                                                <li>
                                                                                    <a href="{{ route('shop.category', ['slug' => $child->slug]) }}" class="categories-item text_secondary ">
                                                                                        <span class="inner-left">
                                                                                            {{ $child->name }}
                                                                                            @if($child->color)
                                                                                                <span style="display:inline-block;width:16px;height:16px;border-radius:50%;background:{{ $child->color }};margin-left:5px;border:1px solid #ccc;"></span>
                                                                                            @endif
                                                                                        </span>
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <div class="box-cate-bottom">
                                                            <a href="{{ route('product.all') }}" class="btn-line">
                                                                <span>Xem tất cả sản phẩm</span>
                                                                <i class="icon-arrow-up-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Tin tức -->
                            <li class="menu-item position-relative">
                                <a href="{{ route('posts.index') }}" class="item-link {{ $isWhiteHeader ? 'text_white' : 'text-light' }}">TIN TỨC<i class="icon icon-down"></i></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('about') }}" class="item-link {{ $isWhiteHeader ? 'text_white' : 'text-light' }}">GIỚI THIỆU</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('contact') }}" class="item-link {{ $isWhiteHeader ? 'text_white' : 'text-light' }}">LIÊN HỆ</a>
                            </li>
                        </ul>
                    </nav>
                </div> 
                <div class="col-xl-2 col-8 d-flex justify-content-center">
                    <a href="{{ route('ecom.home') }}" class="logo-header d-flex">
                        <img src="{{ asset('assets/frontend/images/logo/logo-white.svg') }}" alt="logo" class="logo" style="{{ $isWhiteHeader ? '' : 'display:none;' }}">
                        <img src="{{ asset('assets/frontend/images/logo/logo.svg') }}" alt="logo" class="logo-black" style="{{ $isWhiteHeader ? 'display:none;' : '' }}">
                    </a>
                </div>
                <div class="col-xl-5 col-2">
                    <ul class="nav-icon">
                        <li class="nav-search">
                            <a href="#search" data-bs-toggle="modal" class="nav-icon-item {{ $isWhiteHeader ? 'text_white' : 'text-light' }}">
                                <span class="icon icon-search"></span>
                            </a>
                        </li>
                        <li class="nav-cart">
                            <a href="#shoppingCart" data-bs-toggle="modal" class="nav-icon-item {{ $isWhiteHeader ? 'text_white' : 'text-light' }}">
                                <span class="icon icon-cart"></span>
                                <span id="cart-count" class="count-box text-button-small">{{ collect(session('cart', []))->sum('quantity') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>


