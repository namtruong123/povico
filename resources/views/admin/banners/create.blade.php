{{-- filepath: f:\povico\resources\views\admin\banners\create.blade.php --}}
@extends('admin.admin')

@section('content')
<div class="container">
    <h2>Thêm Banner</h2>
    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Tiêu đề</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label>Ảnh</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Link</label>
            <input type="text" name="link" class="form-control">
        </div>
        <div class="mb-3">
            <label>Thứ tự</label>
            <input type="number" name="order" class="form-control" value="0">
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection