{{-- filepath: resources/views/admin/category/edit.blade.php --}}
@extends('admin.admin')
@section('title', 'Chỉnh sửa danh mục')
@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Chỉnh sửa danh mục</h4>
    <form method="POST" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Tên danh mục</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $category->name) }}">
        </div>
        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $category->slug) }}">
        </div>
        <div class="mb-3">
            <label>Ảnh danh mục</label>
            @if($category->image)
                <img src="{{ asset('assets/images/category/' . $category->image) }}" alt="Ảnh" width="80" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label>Mô tả</label>
            <textarea name="description" class="form-control">{{ old('description', $category->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label>Danh mục cha</label>
            <select name="parent_id" class="form-select">
                <option value="">-- Không chọn --</option>
                @foreach($parents as $parent)
                    <option value="{{ $parent->id }}" {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection