@extends('admin.admin')
@section('content')
<style>
    .cke_notification, .cke_notification_message {
        display: none !important;
    }
</style>
<div class="container">
    <h2>Chỉnh sửa trang Giới thiệu</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('admin.about.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tiêu đề</label>
            <input type="text" name="title" class="form-control" value="{{ $about->title }}">
        </div>
        <div class="mb-3">
            <label>Giới thiệu ngắn</label>
            <textarea name="intro" class="form-control" id="intro-editor" rows="3">{{ $about->intro }}</textarea>
        </div>
        <div class="mb-3">
            <label>Sứ mệnh</label>
            <textarea name="mission" class="form-control" id="mission-editor" rows="3">{{ $about->mission }}</textarea>
        </div>
        <div class="mb-3">
            <label>Tầm nhìn</label>
            <textarea name="vision" class="form-control" id="vision-editor" rows="3">{{ $about->vision }}</textarea>
        </div>
        <div class="mb-3">
            <label>Nội dung chi tiết</label>
            <textarea name="content" class="form-control" id="content-editor" rows="6">{{ $about->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('intro-editor');
    CKEDITOR.replace('mission-editor');
    CKEDITOR.replace('vision-editor');
    CKEDITOR.replace('content-editor');
</script>
@endpush