{{-- filepath: resources/views/Ecom/partials/search_results.blade.php --}}
@if($products->count())
    @foreach($products as $product)
        <div class="card-product style-1 fl-item">
            <div class="card-product-wrapper">
                <a href="{{ route('product.detail', $product->slug) }}" class="image-wrap">
                    <img class="lazyload img-product" src="{{ asset($product->main_image) }}" alt="{{ $product->name }}">
                </a>
                <div class="list-btn-main">
                    <a href="{{ route('product.detail', $product->slug) }}" class="btn-main-product">Xem chi tiết</a>
                </div>
            </div>
            <div class="card-product-info ">
                <a href="{{ route('product.detail', $product->slug) }}" class="title link">{{ $product->name }}</a>
                <div class="price text-body-default ">
                    @if($product->sale_price && $product->sale_price > 0)
                        {{ number_format($product->sale_price) }}₫
                    @elseif($product->price && $product->price > 0)
                        {{ number_format($product->price) }}₫
                    @else
                        <span class="text-danger">Liên hệ</span>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="text-center py-3">Không tìm thấy sản phẩm phù hợp.</div>
@endif