@extends('admin.admin')

@section('content')
<div class="container">
    <h2>Sửa Lookbook</h2>
    <form action="{{ route('admin.lookbooks.update', $lookbook->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Tiêu đề</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title', $lookbook->title) }}">
        </div>
        <div class="mb-3">
            <label>Ảnh</label>
            <input type="file" name="image" class="form-control">
            @if($lookbook->image)
                <img src="{{ asset($lookbook->image) }}" width="80">
            @endif
        </div>
        <div class="mb-3">
            <label>Ảnh Hover</label>
            <input type="file" name="hover_image" class="form-control">
            @if($lookbook->hover_image)
                <img src="{{ asset($lookbook->hover_image) }}" width="80">
            @endif
        </div>
        <div class="mb-3">
            <label>Link sản phẩm</label>
            <input type="text" name="product_link" class="form-control" value="{{ old('product_link', $lookbook->product_link) }}">
        </div>
        <div class="mb-3">
            <label>Giá</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $lookbook->price) }}">
        </div>
        <div class="mb-3">
            <label>Vị trí</label>
            <input type="number" name="position" class="form-control" value="{{ old('position', $lookbook->position) }}">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
</div>
@endsection