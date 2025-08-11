@extends('admin.admin')

@section('content')
<div class="container">
    <h2>Thêm Lookbook</h2>
    <form action="{{ route('admin.lookbooks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Tiêu đề</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Ảnh</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Ảnh Hover</label>
            <input type="file" name="hover_image" class="form-control">
        </div>
        <div class="mb-3">
            <label>Link sản phẩm</label>
            <input type="text" name="product_link" class="form-control">
        </div>
        <div class="mb-3">
            <label>Giá</label>
            <input type="number" name="price" class="form-control">
        </div>
        <div class="mb-3">
            <label>Vị trí</label>
            <input type="text" name="position" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('admin.lookbooks.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection