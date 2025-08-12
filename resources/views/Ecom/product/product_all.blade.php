@extends('Ecom.layout')
@section('title', 'Tất cả sản phẩm')
@section('content')
@include('Ecom.partials.header')
<div class="space-1"></div>
<div class="space-1"></div>
<div class="page-title relative">
    <div class="paralaximg" data-parallax="scroll" data-image-src="{{ asset('assets/frontend/images/page-title/page-title-1.jpg') }}"></div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title">Tất cả sản phẩm</h3>
                    <ul class="breadcrumb">
                        <li>Sản phẩm</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="flat-spacing">
    <div class="container">
        <div class="tf-shop-control">
            <div class="tf-control-filter">
                <button id="filterShop" class="filterShop tf-btn-filter">
                    <span class="icon icon-filter"></span>
                    <span class="text">Bộ lọc</span>
                </button>
                <div class="d-none d-lg-flex shop-sale-text">
                    <i class="icon icon-checkcircle"></i>
                    <p class="text-caption-1">Chỉ hiển thị sản phẩm khuyến mãi</p>
                </div>
            </div>
            <ul class="tf-control-layout">
                <li class="tf-view-layout-switch sw-layout-list list-layout" data-value-layout="list">
                    <div class="item">
                        <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="6" r="2.5" stroke="#181818" />
                            <rect x="7.5" y="3.5" width="12" height="5" rx="2.5" stroke="#181818" />
                            <circle cx="3" cy="14" r="2.5" stroke="#181818" />
                            <rect x="7.5" y="11.5" width="12" height="5" rx="2.5" stroke="#181818" />
                        </svg>
                    </div>
                </li>
                <li class="tf-view-layout-switch sw-layout-2" data-value-layout="tf-col-2">
                    <div class="item">
                        <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="6" cy="6" r="2.5" stroke="#181818" />
                            <circle cx="14" cy="6" r="2.5" stroke="#181818" />
                            <circle cx="6" cy="14" r="2.5" stroke="#181818" />
                            <circle cx="14" cy="14" r="2.5" stroke="#181818" />
                        </svg>
                    </div>
                </li>
                <li class="tf-view-layout-switch sw-layout-3" data-value-layout="tf-col-3">
                    <div class="item">
                        <svg class="icon" width="22" height="20" viewBox="0 0 22 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="6" r="2.5" stroke="#181818" />
                            <circle cx="11" cy="6" r="2.5" stroke="#181818" />
                            <circle cx="19" cy="6" r="2.5" stroke="#181818" />
                            <circle cx="3" cy="14" r="2.5" stroke="#181818" />
                            <circle cx="11" cy="14" r="2.5" stroke="#181818" />
                            <circle cx="19" cy="14" r="2.5" stroke="#181818" />
                        </svg>
                    </div>
                </li>
                <li class="tf-view-layout-switch sw-layout-4 active" data-value-layout="tf-col-4">
                    <div class="item">
                        <svg class="icon" width="30" height="20" viewBox="0 0 30 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="6" r="2.5" stroke="#181818" />
                            <circle cx="11" cy="6" r="2.5" stroke="#181818" />
                            <circle cx="19" cy="6" r="2.5" stroke="#181818" />
                            <circle cx="27" cy="6" r="2.5" stroke="#181818" />
                            <circle cx="3" cy="14" r="2.5" stroke="#181818" />
                            <circle cx="11" cy="14" r="2.5" stroke="#181818" />
                            <circle cx="19" cy="14" r="2.5" stroke="#181818" />
                            <circle cx="27" cy="14" r="2.5" stroke="#181818" />
                        </svg>
                    </div>
                </li>
            </ul>
            <div class="tf-control-sorting">
                <p class="d-none d-lg-block text-caption-1">Sắp xếp theo:</p>
                <form id="sortForm" method="GET" action="{{ route('products.filter') }}">
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    <input type="hidden" name="color" value="{{ is_array(request('color')) ? implode(',', request('color')) : request('color') }}">
                    <input type="hidden" name="price_min" value="{{ request('price_min') }}">
                    <input type="hidden" name="price_max" value="{{ request('price_max') }}">
                    <input type="hidden" name="is_new" value="{{ request('is_new') }}">
                    <input type="hidden" name="is_best_seller" value="{{ request('is_best_seller') }}">
                    <input type="hidden" name="availability" value="{{ request('availability') }}">
                    <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                        <div class="btn-select">
                            <span class="text-sort-value">
                                @php
                                    $sort = request('sort', 'best-selling');
                                    $sortText = [
                                        'all' => 'Tất cả sản phẩm',
                                        'best-selling' => 'Bán chạy nhất',
                                        'a-z' => 'Tên A-Z',
                                        'z-a' => 'Tên Z-A',
                                        'price-low-high' => 'Giá tăng dần',
                                        'price-high-low' => 'Giá giảm dần'
                                    ];
                                @endphp
                                {{ $sortText[$sort] ?? 'Tất cả sản phẩm' }}
                            </span>
                            <span class="icon icon-down"></span>
                        </div>
                        <div class="dropdown-menu">
                            @foreach($sortText as $key => $text)
                                <div class="select-item" data-sort-value="{{ $key }}">
                                    <span class="text-value-item">{{ $text }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <input type="hidden" name="sort" id="sortInput" value="{{ $sort }}">
                </form>
            </div>
        </div>
        <div class="wrapper-control-shop">
            <div class="meta-filter-shop">
                <div id="product-count-grid" class="count-text">
                    Hiển thị {{ $products->count() }} / {{ $products->total() }} sản phẩm
                </div>
                <div id="applied-filters">
                    @if(request()->hasAny(['category','color','price_min','price_max','is_new','is_best_seller','availability']))
                        <span>Đã chọn:</span>
                        @if(request('category'))
                            <span class="badge bg-secondary">Danh mục: {{ optional($categories->where('id',request('category'))->first())->name }}</span>
                        @endif
                        @if(request('color'))
                            @php
                                $colorNames = [];
                                if(is_array(request('color'))) {
                                    foreach($colors->whereIn('id',request('color')) as $c) $colorNames[] = $c->name;
                                } else {
                                    $c = $colors->where('id',request('color'))->first();
                                    if($c) $colorNames[] = $c->name;
                                }
                            @endphp
                            <span class="badge bg-secondary">Màu: {{ implode(', ', $colorNames) }}</span>
                        @endif
                        @if(request('price_min') || request('price_max'))
                            <span class="badge bg-secondary">Giá: {{ number_format(request('price_min',0)) }}₫ - {{ number_format(request('price_max',50000000)) }}₫</span>
                        @endif
                        @if(request('is_new'))
                            <span class="badge bg-secondary">Hàng mới</span>
                        @endif
                        @if(request('is_best_seller'))
                            <span class="badge bg-secondary">Bán chạy</span>
                        @endif
                        @if(request('availability'))
                            <span class="badge bg-secondary">
                                {{ request('availability') == 'inStock' ? 'Còn hàng' : 'Hết hàng' }}
                            </span>
                        @endif
                        <a href="{{ route('product.all') }}" class="remove-all-filters text-btn-uppercase ms-2">
                            XÓA TẤT CẢ <i class="icon icon-close"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3">
                    <div class="sidebar-filter canvas-filter left">
                        <div class="canvas-wrapper">
                            <div class="canvas-header d-flex d-xl-none">
                                <h5><span class="icon icon-filter"></span>Bộ lọc</h5>
                                <span class="icon-close close-filter"></span>
                            </div>
                            {{-- Sidebar filter --}}
                            @include('Ecom.product.sidebar_filter', [
                                'categories' => $categories,
                                'colors' => $colors
                            ])
                            <div class="canvas-bottom d-block d-xl-none">
                                <button id="reset-filter" class="tf-btn btn-border btn-reset">Xóa tất cả bộ lọc</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="tf-grid-layout wrapper-shop tf-col-4" id="gridLayout">
                        @forelse($products as $product)
                        <div class="card-product style-1 grid">
                            <div class="card-product-wrapper">
                                <a href="{{ route('product.detail', $product->slug) }}" class="image-wrap">
                                    <img class="lazyload img-product" data-src="{{ asset($product->main_image) }}" src="{{ asset($product->main_image) }}" alt="{{ $product->name }}">
                                    @if($product->galleries->first())
                                    <img class="lazyload img-hover" data-src="{{ asset($product->galleries->first()->image) }}" src="{{ asset($product->galleries->first()->image) }}" alt="{{ $product->name }}">
                                    @endif
                                </a>
                                @if($product->discount_price)
                                <div class="on-sale-wrap"><span class="on-sale-item">
                                    -{{ round(100 - ($product->discount_price/$product->price)*100) }}%
                                </span></div>
                                @endif
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Yêu thích</span>
                                    </a>
                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare" class="box-icon compare ">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">So sánh</span>
                                    </a>
                                    <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                        <span class="icon icon-eye"></span>
                                        <span class="tooltip">Xem nhanh</span>
                                    </a>
                                </div>
                                <div class="list-btn-main">
                                    <a href="javascript:void(0);"
                                    class="btn-main-product add-to-cart-btn"
                                    data-product-id="{{ $product->id }}"
                                    data-quantity="1">
                                    Thêm vào giỏ
                                    </a>
                                </div>
                            </div>
                            <div class="card-product-info ">
                                <a href="{{ route('product.detail', $product->slug) }}" class="title link">{{ $product->name }}</a>
                                <div class="price text-body-default ">
                                    @if($product->discount_price)
                                        <span class="text-caption-1 old-price">{{ number_format($product->price) }}₫</span>
                                        <span class="current-price">{{ number_format($product->discount_price) }}₫</span>
                                    @else
                                        <span class="current-price">{{ number_format($product->price) }}₫</span>
                                    @endif
                                </div>
                                <ul class="list-color-product">
                                    @if($product->attribute)
                                    <li class="list-color-item color-swatch active">
                                        <span class="swatch-value" style="background:{{ $product->attribute->color }}"></span>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="alert alert-warning mt-4">Không tìm thấy sản phẩm phù hợp.</div>
                        </div>
                        @endforelse
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $products->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/nouislider@15.7.1/distribute/nouislider.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nouislider@15.7.1/distribute/nouislider.min.css" />
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Layout switch
    const layoutSwitchers = document.querySelectorAll('.tf-view-layout-switch');
    const gridLayout = document.getElementById('gridLayout');
    layoutSwitchers.forEach(function(item) {
        item.addEventListener('click', function() {
            layoutSwitchers.forEach(i => i.classList.remove('active'));
            item.classList.add('active');
            const layout = item.getAttribute('data-value-layout');
            gridLayout.classList.remove('list', 'tf-col-2', 'tf-col-3', 'tf-col-4');
            gridLayout.classList.add(layout);
        });
    });

    // Sort dropdown
    document.querySelectorAll('.select-item').forEach(function(item) {
        item.addEventListener('click', function() {
            document.getElementById('sortInput').value = item.getAttribute('data-sort-value');
            document.getElementById('sortForm').submit();
        });
    });

    // Reset filter
    const resetBtn = document.getElementById('reset-filter');
    if(resetBtn) {
        resetBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = "{{ route('product.all') }}";
        });
    }

    // Price slider (nếu dùng noUiSlider)
    var priceSlider = document.getElementById('price-value-range');
    var minValue = document.getElementById('price-min-value');
    var maxValue = document.getElementById('price-max-value');
    if (priceSlider && window.noUiSlider) {
        noUiSlider.create(priceSlider, {
            start: [{{ request('price_min', 0) }}, {{ request('price_max', 500) }}],
            connect: true,
            range: {
                'min': 0,
                'max': 500
            }
        });
        priceSlider.noUiSlider.on('update', function(values, handle) {
            if (minValue && maxValue) {
                minValue.textContent = Math.round(values[0]);
                maxValue.textContent = Math.round(values[1]);
            }
        });
        priceSlider.noUiSlider.on('change', function(values) {
            // Gửi form filter khi thay đổi giá
            let form = priceSlider.closest('form');
            if(form) {
                let minInput = form.querySelector('input[name="price_min"]');
                let maxInput = form.querySelector('input[name="price_max"]');
                if(!minInput) {
                    minInput = document.createElement('input');
                    minInput.type = 'hidden';
                    minInput.name = 'price_min';
                    form.appendChild(minInput);
                }
                if(!maxInput) {
                    maxInput = document.createElement('input');
                    maxInput.type = 'hidden';
                    maxInput.name = 'price_max';
                    form.appendChild(maxInput);
                }
                minInput.value = Math.round(values[0]);
                maxInput.value = Math.round(values[1]);
                form.submit();
            }
        });
    }
});
</script>
@endpush