{{-- filepath: f:\povico\resources\views\Ecom\partials\banner.blade.php --}}
@php
    $banners = \App\Models\Banner::orderBy('order')->get();
@endphp
<!-- Slideshow -->
<div class="tf-slideshow style-3 slider-effect-fade ">
    <div dir="ltr" class="swiper tf-sw-slideshow" data-preview="1" data-tablet="1" data-mobile="1"
        data-centered="false" data-space="15" data-space-mb="0" data-loop="false" data-auto-play="true">
        <div class="swiper-wrapper">
            @foreach($banners as $banner)
            <div class="swiper-slide">
                <div class="wrap-slider">
                    <div class="img-style">
                        <img class="lazyload"
                            data-src="{{ asset($banner->image) }}"
                            src="{{ asset($banner->image) }}"
                            alt="{{ $banner->title }}">
                    </div>
                    <div class="box-content">
                        <div class="box-title">
                            <div class="text-white text-display fade-item fade-item-1 ">{{ $banner->title }}</div>
                        </div>
                        <div class="fade-item fade-item-3">
                            @if($banner->link)
                            <a href="{{ $banner->link }}" class="tf-btn btn-white mx-auto ">Explore Collection <i class="icon-arrow-up-right"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="wrap-pagination">
            <div class="container">
                <div class="sw-dots sw-pagination-slider type-circle white-circle-line justify-content-center">
                </div>
            </div>
        </div>
        <div class="sw-button swiper-button-next navigation-next-slider"></div>
        <div class="sw-button swiper-button-prev navigation-prev-slider"></div>
    </div>
</div>