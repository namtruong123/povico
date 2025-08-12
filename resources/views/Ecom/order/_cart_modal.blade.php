<div class="tf-mini-cart-items">
 @forelse($cart as $item)
<div class="tf-mini-cart-item">
  <div class="tf-mini-cart-image">
    <img src="{{ asset($item['image']) }}" width="40">
  </div>
  <div class="tf-mini-cart-info">
    <p>{{ $item['name'] }}</p>
    <div class="wg-quantity">
      <button type="button" class="btn-quantity1 btn-decrease1" data-id="{{ $item['product_id'] }}">−</button>
      <input type="text" data-id="{{ $item['product_id'] }}" class="quantity-product1" value="{{ $item['quantity'] }}">
      <button type="button" class="btn-quantity1 btn-increase1" data-id="{{ $item['product_id'] }}">+</button>
    </div>
    <button type="button" class="tf-btn-remove btn-remove-item" data-id="{{ $item['product_id'] }}">Xóa</button>
    <span>{{ number_format($item['price'],0,',','.') }}₫ x {{ $item['quantity'] }}</span>
  </div>
</div>
@empty
<div class="text-center py-4">Giỏ hàng trống.</div>


@endforelse
</div>