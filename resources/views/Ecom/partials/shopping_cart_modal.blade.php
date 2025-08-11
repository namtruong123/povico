  <div class="modal fullRight fade modal-shopping-cart" id="shoppingCart">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- You May Also Like -->
                <div class="tf-minicart-recommendations">
                    <h6 class="title">You May Also Like</h6>
                    <div class="wrap-recommendations">
                        <div class="list-cart">
                            @if(!empty($recommendProducts))
                                @foreach($recommendProducts as $product)
                                    <div class="list-cart-item">
                                        <div class="image">
                                            <img class="lazyload" src="{{ asset($product->main_image) }}" alt="{{ $product->name }}">
                                        </div>
                                        <div class="content">
                                            <div class="name">
                                                <a class="link text-line-clamp-1" href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
                                            </div>
                                            <div class="cart-item-bot">
                                                <div class="text-button price">{{ number_format($product->sale_price ?? $product->price) }}₫</div>
                                                <form method="POST" action="{{ route('cart.add') }}">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <button type="submit" class="link text-button">Add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-3">No recommendations.</div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Shopping Cart -->
                <div class="d-flex flex-column flex-grow-1 h-100">
                    <div class="header">
                        <h5 class="title">Shopping Cart</h5>
                        <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                    </div>
                    <div class="wrap">
                        <div class="tf-mini-cart-threshold">
                            <div class="tf-progress-bar">
                                <div class="value" style="width: 0%;" data-progress="75">
                                    <i class="icon icon-shipping"></i>
                                </div>
                            </div>
                            <div class="text-caption-1">
                                Congratulations! You've got free shipping!
                            </div>
                        </div>
                        <div class="tf-mini-cart-wrap">
                            <div class="tf-mini-cart-main">
                                <div class="tf-mini-cart-sroll">
                                    <div class="tf-mini-cart-items">
                                        @if(empty($cart))
                                            <div class="text-center py-4">Giỏ hàng trống.</div>
                                        @else
                                            @include('Ecom.order._cart_modal', ['cart' => $cart])
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tf-mini-cart-bottom">
                                <div class="tf-mini-cart-tool">
                                    <div class="tf-mini-cart-view-checkout d-flex gap-2 mb-2">
                                        <a href="{{ route('cart.index') }}" class="tf-btn btn-white has-border flex-fill">Xem giỏ hàng</a>
                                        <a href="{{ route('checkout') }}" class="tf-btn btn-onsurface flex-fill">Thanh toán</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="link btn-line btn-continue-shopping" href="#" data-bs-dismiss="modal">Tiếp tục mua hàng</a>
                                    </div>
                                </div>
                                <div class="tf-mini-cart-bottom-wrap">
                                    <div class="tf-cart-totals-discounts">
                                        <h5>Tổng tiền</h5>
                                        <h5 class="tf-totals-total-value">
                                            {{ number_format(collect($cart)->sum(function($item){return $item['price']*$item['quantity'];}), 0, ',', '.') }}₫
                                        </h5>
                                    </div>
                                    <!-- ...checkbox, checkout giữ nguyên... -->
                                </div>
                                <!-- ...note, shipping, coupon giữ nguyên... -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>