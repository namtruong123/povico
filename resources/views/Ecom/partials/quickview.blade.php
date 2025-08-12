{{-- filepath: resources/views/Ecom/partials/quickview.blade.php --}}
<div class="tf-quick-view-image">
    <div class="wrap-quick-view wrapper-scroll-quickview">
        @foreach($product->galleries as $gallery)
            <div class="quickView-item item-scroll-quickview">
                <img class="lazyload" data-src="{{ asset($gallery->image) }}" src="{{ asset($gallery->image) }}" alt="">
            </div>
        @endforeach
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
                <h3 class="name">{{ $product->name }}</h3>
                <div class="sub">
                    <div class="tf-product-info-rate">
                        <div class="list-star-default">
                            @for($i=1;$i<=5;$i++)
                                <i class="icon icon-star"></i>
                            @endfor
                        </div>
                        <div class="text text-caption-1">({{ $product->reviews_count ?? 0 }} reviews)</div>
                    </div>
                </div>
            </div>
            <div class="tf-product-info-desc">
                <div class="tf-product-info-price">
                    @if($product->sale_price && $product->sale_price < $product->price)
                        <h5 class="price-on-sale">{{ number_format($product->sale_price) }}₫</h5>
                        <div class="compare-at-price">{{ number_format($product->price) }}₫</div>
                        <div class="badges-on-sale text-btn-uppercase">
                            -{{ round(100 - ($product->sale_price / $product->price * 100)) }}%
                        </div>
                    @else
                        <h5 class="price-on-sale">{{ number_format($product->price) }}₫</h5>
                    @endif
                </div>
                <p>{{ $product->short_description ?? $product->description }}</p>
            </div>
        </div>
        <div class="tf-product-info-choose-option">
            {{-- Tùy chỉnh các option màu, size nếu có --}}
            {{-- ... --}}
            <div>
                <form method="POST" action="{{ route('cart.add') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button class="tf-btn btn-onsurface flex-grow-1" type="submit">
                        Thêm vào giỏ - {{ number_format($product->sale_price ?? $product->price) }}₫
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>