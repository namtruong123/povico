@extends('admin.admin')
@section('title', 'Chỉnh sửa Footer')
@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('admin.footers.update', $footer->id) }}" method="POST" class="row g-3">
    @csrf
    @method('PUT')

    <div class="col-md-6">
        <label class="form-label">Tiêu đề cột 1</label>
        <input type="text" name="info_title" class="form-control" value="{{ $footer->info_title }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Tiêu đề cột 2</label>
        <input type="text" name="customer_service_title" class="form-control" value="{{ $footer->customer_service_title }}">
    </div>

    <div class="col-md-3">
        <label class="form-label">About Us (text)</label>
        <input type="text" name="about_text" class="form-control" value="{{ $footer->about_text }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">About Us (link)</label>
        <input type="text" name="about_link" class="form-control" value="{{ $footer->about_link }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Our Stories (text)</label>
        <input type="text" name="stories_text" class="form-control" value="{{ $footer->stories_text }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Our Stories (link)</label>
        <input type="text" name="stories_link" class="form-control" value="{{ $footer->stories_link }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Size Guide (text)</label>
        <input type="text" name="size_guide_text" class="form-control" value="{{ $footer->size_guide_text }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Size Guide (link)</label>
        <input type="text" name="size_guide_link" class="form-control" value="{{ $footer->size_guide_link }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Contact Us (text)</label>
        <input type="text" name="contact_text" class="form-control" value="{{ $footer->contact_text }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Contact Us (link)</label>
        <input type="text" name="contact_link" class="form-control" value="{{ $footer->contact_link }}">
    </div>

    <div class="col-md-3">
        <label class="form-label">Shipping (text)</label>
        <input type="text" name="shipping_text" class="form-control" value="{{ $footer->shipping_text }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Shipping (link)</label>
        <input type="text" name="shipping_link" class="form-control" value="{{ $footer->shipping_link }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Return & Refund (text)</label>
        <input type="text" name="return_text" class="form-control" value="{{ $footer->return_text }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Return & Refund (link)</label>
        <input type="text" name="return_link" class="form-control" value="{{ $footer->return_link }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Privacy Policy (text)</label>
        <input type="text" name="privacy_text" class="form-control" value="{{ $footer->privacy_text }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Privacy Policy (link)</label>
        <input type="text" name="privacy_link" class="form-control" value="{{ $footer->privacy_link }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Terms & Conditions (text)</label>
        <input type="text" name="terms_text" class="form-control" value="{{ $footer->terms_text }}">
    </div>
    <div class="col-md-3">
        <label class="form-label">Terms & Conditions (link)</label>
        <input type="text" name="terms_link" class="form-control" value="{{ $footer->terms_link }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Hotline</label>
        <input type="text" name="hotline" class="form-control" value="{{ $footer->hotline }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control" value="{{ $footer->email }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Tiêu đề nhận tin</label>
        <input type="text" name="newsletter_title" class="form-control" value="{{ $footer->newsletter_title }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Placeholder email</label>
        <input type="text" name="newsletter_placeholder" class="form-control" value="{{ $footer->newsletter_placeholder }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Nút nhận tin</label>
        <input type="text" name="newsletter_button" class="form-control" value="{{ $footer->newsletter_button }}">
    </div>

    <div class="col-md-2">
        <label class="form-label">Facebook</label>
        <input type="text" name="facebook" class="form-control" value="{{ $footer->facebook }}">
    </div>
    <div class="col-md-2">
        <label class="form-label">Zalo</label>
        <input type="text" name="zalo" class="form-control" value="{{ $footer->zalo }}">
    </div>
    <div class="col-md-2">
        <label class="form-label">Tiktok</label>
        <input type="text" name="tiktok" class="form-control" value="{{ $footer->tiktok }}">
    </div>
    <div class="col-md-2">
        <label class="form-label">Youtube</label>
        <input type="text" name="youtube" class="form-control" value="{{ $footer->youtube }}">
    </div>
    <div class="col-md-2">
        <label class="form-label">Instagram</label>
        <input type="text" name="instagram" class="form-control" value="{{ $footer->instagram }}">
    </div>

    <div class="col-md-12">
        <label class="form-label">Copyright</label>
        <input type="text" name="copyright" class="form-control" value="{{ $footer->copyright }}">
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
    </div>
</form>
@endsection