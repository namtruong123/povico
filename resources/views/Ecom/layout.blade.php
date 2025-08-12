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
    @include('Ecom.partials.footer')
    <!-- Javascript -->
    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/frontend/js/carousel.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/lazysize.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/multiple-modal.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/parallax.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/simpleParallaxVanilla.umd.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script> 
    @stack('scripts')

    
</body>
</html>