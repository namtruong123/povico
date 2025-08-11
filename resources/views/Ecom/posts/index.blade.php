@extends('Ecom.layout')
@section('title', 'Tin tức')
@section('content')
@section('meta_description', 'Tin tức mới nhất về sản phẩm, khuyến mãi và sự kiện của chúng tôi.')
@include('Ecom.partials.header', ['cart' => $cart])

<div class="space-1"></div>
<div class="main-content">
    <div class="blog-grid-main flat-spacing">
        <div class="container">
            <div class="row">
                <div class="tf-grid-layout md-col-3 mb_48">
                    @foreach($posts as $post)
                    <div class="blog-article-item">
                        <div class="article-thumb">
                            <a href="{{ route('posts.show', $post->slug) }}">
                                <img class="lazyload" data-src="{{ asset($post->image ?? 'images/blog/blog-1.jpg') }}"
                                    src="{{ asset($post->image ?? 'images/blog/blog-1.jpg') }}" alt="img-blog">
                            </a>
                            <div class="article-label">
                                <a href="#" class="text-button-small">Tin tức</a>
                            </div>
                        </div>
                        <div class="article-content">
                            <ul class="meta">
                                <li class="text-button-small">
                                    <a href="#" class="link">{{ $post->created_at->format('F d, Y') }}</a>
                                </li>
                                <li class="text-button-small">
                                    by <a href="#" class="link">Admin</a>
                                </li>
                            </ul>
                            <h5 class="article-title">
                                <a href="{{ route('posts.show', $post->slug) }}" class="line-clamp-2 link">
                                    {{ $post->title }}
                                </a>
                            </h5>
                            <p class="article-description text_secondary text-body-default">
                                {{ \Illuminate\Support\Str::limit(strip_tags($post->content), 120) }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-12">
                    <ul class="wg-pagination justify-content-center">
                        {{ $posts->links('pagination::bootstrap-4') }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection