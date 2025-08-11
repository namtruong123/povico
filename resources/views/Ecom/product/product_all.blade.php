@extends('Ecom.layout')
@section('title', 'Tất cả sản phẩm')
@section('content')
@include('Ecom.partials.header')
<div class="space-1"></div>
<div class="space-1"></div>
<div class="page-title relative">
<div class="paralaximg" data-parallax="scroll" data-image-src="{{ asset('assets/frontend/images/page-title/page-title-1.jpg') }}">    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title">Tất cả sản phẩm</h3>
                    <ul class="breadcrumb">
                        {{-- <li><a href="{{ route('home') }}">Trang chủ</a></li> --}}
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
                <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                    <div class="btn-select">
                        <span class="text-sort-value">Bán chạy nhất</span>
                        <span class="icon icon-down"></span>
                    </div>
                    <div class="dropdown-menu">
                        <div class="select-item" data-sort-value="best-selling">
                            <span class="text-value-item">Bán chạy nhất</span>
                        </div>
                        <div class="select-item" data-sort-value="a-z">
                            <span class="text-value-item">Tên A-Z</span>
                        </div>
                        <div class="select-item" data-sort-value="z-a">
                            <span class="text-value-item">Tên Z-A</span>
                        </div>
                        <div class="select-item" data-sort-value="price-low-high">
                            <span class="text-value-item">Giá tăng dần</span>
                        </div>
                        <div class="select-item" data-sort-value="price-high-low">
                            <span class="text-value-item">Giá giảm dần</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper-control-shop">
            <div class="meta-filter-shop">
                <div id="product-count-grid" class="count-text"></div>
                <div id="product-count-list" class="count-text"></div>
                <div id="applied-filters"></div>
                <button id="remove-all" class="remove-all-filters text-btn-uppercase" style="display: none;">
                    XÓA TẤT CẢ <i class="icon icon-close"></i>
                </button>
            </div>
            <div class="row">
                <div class="col-xl-3">
                    <div class="sidebar-filter canvas-filter left">
                        <div class="canvas-wrapper">
                            <div class="canvas-header d-flex d-xl-none">
                                <h5><span class="icon icon-filter"></span>Bộ lọc</h5>
                                <span class="icon-close close-filter"></span>
                            </div>
                            <div class="canvas-body">
                                {{-- Thêm các bộ lọc động ở đây nếu cần --}}
                                @include('Ecom.product.sidebar_filter')
                            </div>
                            <div class="canvas-bottom d-block d-xl-none">
                                <button id="reset-filter" class="tf-btn btn-border btn-reset">Xóa tất cả bộ lọc</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="tf-grid-layout wrapper-shop tf-col-4" id="gridLayout">
                        @foreach($products as $product)
                        <div class="card-product style-1 grid">
                            <div class="card-product-wrapper">
                                <a href="{{ route('product.detail', $product->slug) }}" class="image-wrap">
                                    <img class="lazyload img-product" data-src="{{ asset($product->main_image) }}" src="{{ asset($product->main_image) }}" alt="{{ $product->name }}">
                                    @if($product->galleries->first())
                                    <img class="lazyload img-hover" data-src="{{ asset($product->galleries->first()->image) }}" src="{{ asset($product->galleries->first()->image) }}" alt="{{ $product->name }}">
                                    @endif
                                </a>
                                @if($product->discount_price)
                                <div class="on-sale-wrap"><span class="on-sale-item>
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
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const layoutSwitchers = document.querySelectorAll('.tf-view-layout-switch');
    const gridLayout = document.getElementById('gridLayout');

    layoutSwitchers.forEach(function(item) {
        item.addEventListener('click', function() {
            // Xóa active ở tất cả nút
            layoutSwitchers.forEach(i => i.classList.remove('active'));
            // Thêm active cho nút được chọn
            item.classList.add('active');

            // Lấy giá trị layout
            const layout = item.getAttribute('data-value-layout');
            // Xóa tất cả class layout cũ
            gridLayout.classList.remove('list', 'tf-col-2', 'tf-col-3', 'tf-col-4');
            // Thêm class mới
            gridLayout.classList.add(layout);
        });
    });
});
</script>
<script>
$(function(){
  function refreshCart(){
    $.getJSON('{{ route("cart.modal") }}', function(json){
      $('#shoppingCart .tf-mini-cart-items').html(json.items);
      $('#shoppingCart .tf-totals-total-value').text(json.total);
      $('.count-box.text-button-small').text(json.count);
    });
  }

  // Khi trang vừa load, cập nhật số đơn hàng trên icon
  refreshCart();

  // Add to cart
  $(document).on('click','.add-to-cart-btn',function(e){
    e.preventDefault();
    $.post('{{route("cart.add")}}',{
      _token:'{{csrf_token()}}',
      product_id:$(this).data('product-id'),
      quantity:$(this).data('quantity')||1
    },function(res){
      if(res.success){
        refreshCart();
        // Mở modal giỏ hàng đúng chuẩn Bootstrap 5
        if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
          var modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('shoppingCart'));
          modal.show();
        } else if ($('#shoppingCart').modal) {
          $('#shoppingCart').modal('show');
        }
      }
    });
  });

  // Khi modal mở cũng load lại giỏ hàng
  $('#shoppingCart').on('show.bs.modal', refreshCart);
});
</script>
@endpush