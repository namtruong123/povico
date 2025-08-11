@extends('admin.admin')
@section('title', 'Thêm phân loại')
@section('content')
<div class="container">
    <h2>Thêm phân loại sản phẩm</h2>
    <form action="{{ route('admin.attribute_groups.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tên phân loại</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>
        <div class="mb-3">
            <label>Mô tả</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button class="btn btn-success">Lưu</button>
        <a href="{{ route('admin.attribute_groups.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection