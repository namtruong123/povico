{{-- filepath: resources/views/Ecom/layout.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Povico Door')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- font, icons, css -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/font-icons.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/styles.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/logo/favicon.png') }}">
    @stack('head')
</head>
<body class="preload-wrapper">
    @yield('content')
    @include('Ecom.partials.shopping_cart_modal')
    @include('Ecom.partials.search')
    @include('Ecom.partials.footer')
    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/frontend/js/carousel.js') }}"></script>
    {{-- <script src="{{ asset('assets/frontend/js/bootstrap-select.min.js') }}"></script> --}}
    <script src="{{ asset('assets/frontend/js/lazysize.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/multiple-modal.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/parallax.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/simpleParallaxVanilla.umd.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script> 
    @stack('scripts')
    <script>
$(function() {
    function formatCurrency(number) {
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(number);
    }

    // Cập nhật tổng tiền và số lượng ở trang chính
    function updateTotals(cart) {
        for (const [productId, item] of Object.entries(cart)) {
            const totalPrice = item.price * item.quantity;
            $('#total-price-' + productId).text(formatCurrency(totalPrice));
            $('input.quantity-product[data-id="'+productId+'"]').val(item.quantity);
        }
        const total = Object.values(cart).reduce((sum, i) => sum + i.price * i.quantity, 0);
        $('.total').text(formatCurrency(total));
    }

    // Cập nhật số lượng trên icon giỏ hàng
    function updateCartCount(cart) {
        const totalQty = Object.values(cart).reduce((sum, item) => sum + item.quantity, 0);
        $('#cart-count').text(totalQty);
    }

    // Cập nhật số lượng trong modal mini cart
    function updateMiniCart(cart) {
    // Xóa toàn bộ danh sách cũ
    const $miniCart = $('.tf-mini-cart-items');
    $miniCart.empty();

    if (Object.keys(cart).length === 0) {
        $miniCart.html('<div class="text-center py-4">Giỏ hàng trống.</div>');
        // Cập nhật tổng tiền về 0 luôn
        $('.tf-totals-total-value').text(formatCurrency(0));
        return;
    }

    // Sinh HTML mới theo cart data
    for (const [productId, item] of Object.entries(cart)) {
        const priceText = formatCurrency(item.price);
        const quantity = item.quantity;

        const itemHtml = `
            <div class="tf-mini-cart-item" style="border-bottom: 1px solid #c4c4c4;">
              <div class="tf-mini-cart-image">
                <img src="${item.image ? item.image : ''}" width="40" alt="${item.name}">
              </div>
              <div class="tf-mini-cart-info">
                <p>${item.name}</p>
                <div class="wg-quantity" style="margin-bottom: 10px;">
                  <button type="button" class="btn-quantity1 btn-decrease1" data-id="${productId}">−</button>
                  <input type="text" data-id="${productId}" class="quantity-product1" value="${quantity}">
                  <button type="button" class="btn-quantity1 btn-increase1" data-id="${productId}">+</button>
                </div>
                <span>${priceText} x ${quantity}</span>
                <button type="button" class="tf-btn-remove btn-remove-item icon-close" data-id="${productId}" style="margin-left: 20px;text-decoration: none;"></button>
              </div>
            </div>
        `;
        $miniCart.append(itemHtml);
    }

    // **Cập nhật tổng tiền modal**
    const total = Object.values(cart).reduce((sum, i) => sum + i.price * i.quantity, 0);
    $('.tf-totals-total-value').text(formatCurrency(total));
}

    // Hàm gửi cập nhật số lượng
    function updateCartQty(productId, quantity) {
        console.log('Updating product:', productId, 'Quantity:', quantity);
        $.post('{{ route("cart.update") }}', {
            _token: '{{ csrf_token() }}',
            product_id: productId,
            quantity: quantity
        })
        .done(res => {
            console.log('Update response:', res);
            if (res.success) {
                updateTotals(res.cart);
                updateCartCount(res.cart);
                updateMiniCart(res.cart);
            } else {
                alert(res.message || '❌ Lỗi cập nhật số lượng');
            }
        })
        .fail(() => alert('❌ Lỗi server khi cập nhật số lượng'));
    }

    // Hàm xóa sản phẩm
    function removeCartItem(productId) {
        $.post('{{ route("cart.remove") }}', {
            _token: '{{ csrf_token() }}',
            product_id: productId
        })
        .done(res => {
            if (res.success) {
                // Cập nhật lại giao diện
                updateTotals(res.cart);
                updateCartCount(res.cart);
                updateMiniCart(res.cart);

                // Nếu trang chính có hàng thì xóa dòng đó
                $('tr.tf-cart-item[data-product-id="'+productId+'"]').remove();

                if(Object.keys(res.cart).length === 0) {
                    $('tbody').html('<tr><td colspan="5" class="text-center">Giỏ hàng trống</td></tr>');
                    $('.total').text(formatCurrency(0));
                }
            } else {
                alert(res.message || '❌ Lỗi khi xóa sản phẩm');
            }
        })
        .fail(() => alert('❌ Lỗi server khi xóa sản phẩm'));
    }

    // Xử lý sự kiện tăng giảm ở trang chính
    $(document).off('click', '.btn-increase, .btn-decrease').on('click', '.btn-increase, .btn-decrease', function(e) {
        e.preventDefault();
        const productId = $(this).data('id');
        const $input = $(this).siblings('input.quantity-product');
        let currentQty = parseInt($input.val(), 10);
        if (isNaN(currentQty) || currentQty < 1) currentQty = 1;
        let newQty = $(this).hasClass('btn-increase') ? currentQty + 1 : Math.max(currentQty - 1, 1);
        $input.val(newQty);
        updateCartQty(productId, newQty);
    });

    // Thay đổi số lượng input ở trang chính
    $(document).off('change', '.quantity-product').on('change', '.quantity-product', function() {
        let qty = parseInt($(this).val(), 10);
        if (isNaN(qty) || qty < 1) qty = 1;
        $(this).val(qty);
        const productId = $(this).data('id');
        updateCartQty(productId, qty);
    });

    // Xóa sản phẩm trang chính
    $(document).off('click', '.remove').on('click', '.remove', function(e) {
        e.preventDefault();
        const productId = $(this).data('id');
        removeCartItem(productId);
    });

    // Tăng giảm số lượng modal mini cart
    $(document).off('click', '.btn-increase1, .btn-decrease1').on('click', '.btn-increase1, .btn-decrease1', function(e) {
        e.preventDefault();
        const productId = $(this).data('id');
        const $input = $(this).siblings('input.quantity-product1');
        let currentQty = parseInt($input.val(), 10);
        if (isNaN(currentQty) || currentQty < 1) currentQty = 1;
        let newQty = $(this).hasClass('btn-increase1') ? currentQty + 1 : Math.max(currentQty - 1, 1);
        $input.val(newQty);
        updateCartQty(productId, newQty);
    });

    // Thay đổi số lượng input modal mini cart
    $(document).off('change', '.quantity-product1').on('change', '.quantity-product1', function() {
        let qty = parseInt($(this).val(), 10);
        if (isNaN(qty) || qty < 1) qty = 1;
        $(this).val(qty);
        const productId = $(this).data('id');
        updateCartQty(productId, qty);
    });

    // Xóa sản phẩm modal mini cart
    $(document).off('click', '.remove, .btn-remove-item').on('click', '.remove, .btn-remove-item', function(e) {
    e.preventDefault();

    const productId = $(this).data('id');
    removeCartItem(productId);
});

    // Khởi tạo mini cart khi load trang
    updateMiniCart({!! json_encode($cart) !!});
});
</script>
</body>
</html>