<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Povico Admin')</title>
    <meta name="description" content="Povico Admin - Giao diện quản trị hiện đại, linh hoạt, responsive, sử dụng Bootstrap 5.">
    <meta name="keywords" content="povico admin, giao diện quản trị, admin template, dashboard, bootstrap 5, quản lý website">
    <meta name="author" content="Povico Team">
    <link href="{{ asset('assets/images/logo/favicon.png') }}" rel="icon" type="image/x-icon">
    <link href="{{ asset('assets/images/logo/favicon.png') }}" rel="shortcut icon" type="image/x-icon">
    <link href="{{ asset('assets/vendor/animation/animate.min.css') }}" rel="stylesheet">
   <!-- Kết nối trước -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Nạp font Be Vietnam Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700;900&display=swap" rel="stylesheet">


    <link href="{{ asset('assets/backend/vendor/flag-icons-master/flag-icon.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@$ICONS_VERSION/dist/tabler-icons.min.css" />
    <link href="{{ asset('assets/backend/vendor/apexcharts/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/backend/vendor/glightbox/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/backend/vendor/simplebar/simplebar.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/backend/css/responsive.css') }}" rel="stylesheet" type="text/css">
    @stack('styles')
</head>
<body>
<div class="app-wrapper">

    {{-- Loader --}}
    <div class="loader-wrapper">
        <div class="loader_24"></div>
    </div>

    {{-- Sidebar --}}
    @include('admin.partials.sidebar')

    <div class="app-content">
        {{-- Header --}}
        @include('admin.partials.header')

        {{-- Main Content --}}
        <main>
            @yield('content')
        </main>
    </div>

    {{-- Footer --}}
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-12">
                    <p class="footer-text f-w-600 mb-0">No Copyright © 2025 kirse. All rights reserved 💖 V1.0.0</p>
                </div>
                <div class="col-md-3">
                    <div class="footer-text text-end">
                        <a class="f-w-500 text-primary" href="mailto:teqlathemes@gmail.com"> Need Help <i class="ti ti-help"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

{{-- Customizer --}}
<div id="customizer"></div>

{{-- JS --}}
<script src="{{ asset('assets/backend/js/jquery-3.6.3.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/simplebar/simplebar.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/phosphor/phosphor.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/glightbox/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/customizer.js') }}"></script>
<script src="{{ asset('assets/backend/js/ecommerce_dashboard.js') }}"></script>
<script src="{{ asset('assets/backend/js/script.js') }}"></script>
@stack('scripts')
</body>
</html>