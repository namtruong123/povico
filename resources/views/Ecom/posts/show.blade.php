@extends('Ecom.layout')
@section('title', $post->title)
@section('content')
@include('Ecom.partials.header', ['cart' => $cart])
<div class="page-title relative style-2">
    <div class="paralaximg" data-parallax="scroll" data-image-src="{{ asset('images/page-title/page-title-2.jpg') }}"></div>
</div>
<div class="main-content">
    <div class="blog-detail-wrap">
        <div class="inner">
            <div class="heading">
                <ul class="list-tags has-bg ">
                    <li>
                        <a href="#" class="link">Tin tức</a>
                    </li>
                </ul>
                <h3>{{ $post->title }}</h3>
                <div class="wrap-meta">
                    <ul class="meta">
                        <li class="text-body-1"><i class="icon-calendar"></i>
                            <a class="link" href="#">{{ $post->created_at->format('F d, Y') }}</a>
                        </li>
                        <li class="text-body-1"><i class="icon-user"></i>
                            <span>by <a href="#" class="link">Admin</a></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content">
                @if($post->image)
                    <div class="image-wrap mb_24">
                        <img class="lazyload" data-src="{{ asset($post->image) }}" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                    </div>
                @endif
                <div class="text-secondary text-body-1 mb_12">
                    {!! $post->content !!}
                </div>
            </div>
            <div class="bot d-flex justify-content-between gap-10 flex-wrap">
                <ul class="list-tags has-bg">
                    <li class="text-body-default">Tag:</li>
                    <li>
                        <a href="#" class="link text-caption-2">Tin tức</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center justify-content-between gap-16">
                    <p class="text-body-default">Share this post:</p>
                    <ul class="tf-social-icon style-1">
                        <li><a href="#" class="social-facebook"><i class="icon icon-facebook"></i></a></li>
                        <li><a href="#" class="social-twiter"><i class="icon icon-x"></i></a></li>
                        <li><a href="#" class="social-pinterest"><i class="icon icon-instagram"></i></a></li>
                        <li><a href="#" class="social-instagram"><i class="icon icon-telegram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('posts.index') }}" class="tf-btn btn-onsurface">
                    <i class="icon icon-arrow-left"></i> Quay lại danh sách
                </a>
            </div>
        </div>
    </div>

    {{-- Bài viết tiếp theo hoặc đã xem --}}
    @if(isset($relatedPosts) && $relatedPosts->count())
    <div class="related-posts mt-5">
        <h4 class="mb-3">Bài viết liên quan</h4>
        <div class="row">
            @foreach($relatedPosts as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($item->image)
                            <a href="{{ route('posts.show', ['slug' => Str::slug($item->title), 'id' => $item->id]) }}">
                                <img src="{{ asset($item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                            </a>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('posts.show', ['slug' => $item->slug]) }}">
                                    {{ $item->title }}
                                </a>
                            </h5>
                            <p class="card-text text-truncate">{!! Str::limit(strip_tags($item->content), 100) !!}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"><i class="icon-calendar"></i> {{ $item->created_at->format('d/m/Y') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
@php use Illuminate\Support\Str; @endphp