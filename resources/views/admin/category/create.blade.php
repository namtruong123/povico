{{-- filepath: resources/views/admin/category/create.blade.php --}}
@extends('admin.admin')
@section('title', 'Thêm danh mục sản phẩm')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="mb-0">Thêm danh mục sản phẩm</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" class="app-form">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Tên danh mục <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}" placeholder="Nhập tên danh mục">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Slug <span class="text-muted">(tự động nếu để trống)</span></label>
                            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="Nhập slug">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ảnh danh mục</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Danh mục cha</label>
                            <select name="parent_id" class="form-select">
                                <option value="">-- Không chọn --</option>
                                @foreach($parents as $parent)
                                    @if(is_null($parent->parent_id))
                                        <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex gap-2 justify-content-end mt-4">
                            <button class="btn btn-success px-4">Thêm mới</button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary px-4">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection