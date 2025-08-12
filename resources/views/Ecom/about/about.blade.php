@extends('Ecom.layout')
@section('title', $about->title ?? 'Giới thiệu')
@section('content')
@include('Ecom.partials.header', ['cart' => $cart ?? []])

<style>
    .about-us-main {
        font-size: 15px;
        line-height: 1.8;
        color: #444;
    }
    .about-us-main h1 {
        font-size: 2.4em;
        font-weight: 700;
        margin-bottom: 15px;
        color: #1a1a1a;
        text-align: center;
    }
    .about-us-main p, .about-us-main .text-body-1 {
        margin-bottom: 16px;
        text-align: justify;
    }
    .block {
        margin: 40px auto;
        max-width: 800px;
    }
    .block h3 {
        font-size: 1.6em;
        margin-bottom: 10px;
        color: #000000;
        text-align: left;
    }
</style>
<div class="space-1"></div>
<section class="about-us-main">
  <div class="container">

    <!-- Tiêu đề & intro -->
    <div class="block">
      <h1>{{ $about->title ?? 'Về chúng tôi - Povico Door' }}</h1>
      <p>{!! $about->intro ?? '' !!}</p>
    </div>

    <!-- Sứ mệnh -->
    <div class="block">
      <h3>Sứ mệnh</h3>
      <p>{!! $about->mission ?? '' !!}</p>
    </div>

    <!-- Tầm nhìn -->
    <div class="block">
      <h3>Tầm nhìn</h3>
      <p>{!! $about->vision ?? '' !!}</p>
    </div>

    <!-- Giá trị cốt lõi -->
    @if(!empty($about->core_values))
      <div class="block">
        <h3>Giá trị cốt lõi</h3>
        <p>{!! $about->core_values !!}</p>
      </div>
    @endif

    <!-- Cam kết -->
    @if(!empty($about->commitment))
      <div class="block">
        <h3>Cam kết</h3>
        <p>{!! $about->commitment !!}</p>
      </div>
    @endif

    <!-- Nội dung chi tiết -->
    <div class="block">
      {!! $about->content !!}
    </div>

  </div>
</section>
@endsection
