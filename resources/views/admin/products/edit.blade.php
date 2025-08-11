{{-- filepath: resources/views/admin/products/edit.blade.php --}}
@extends('admin.admin')
@section('title', 'Chỉnh sửa sản phẩm')
@section('content')
<div class="container">
    <h2>Chỉnh sửa sản phẩm</h2>
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Tên sản phẩm:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
        </div>
        <div class="mb-3">
            <label>SKU:</label>
            <input type="text" name="sku" class="form-control" value="{{ old('sku', $product->sku) }}">
        </div>
        <div class="mb-3">
            <label>Slug:</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $product->slug) }}">
        </div>
        <div class="mb-3">
            <label>Danh mục:</label>
            <select name="category_id" class="form-control">
                <option value="">-- Chọn danh mục --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Nhóm phân loại:</label>
            <select name="attribute_group_id" class="form-control">
                <option value="">-- Chọn nhóm --</option>
                @foreach($attributeGroups as $group)
                    <option value="{{ $group->id }}" {{ $product->attribute_group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Chọn màu:</label>
            <select name="attribute_id" class="form-control">
                <option value="">-- Chọn màu --</option>
                @foreach($attributes as $attr)
                    <option value="{{ $attr->id }}" {{ $product->attribute_id == $attr->id ? 'selected' : '' }}>{{ $attr->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Giá gốc:</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}">
        </div>
        <div class="mb-3">
            <label>Giá khuyến mãi:</label>
            <input type="number" name="sale_price" class="form-control" value="{{ old('sale_price', $product->sale_price) }}">
        </div>
        <div class="mb-3">
            <label>Số lượng:</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}">
        </div>
        <div class="mb-3">
            <label>Mô tả:</label>
            <textarea name="description" class="form-control ckeditor">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label>Thông số kỹ thuật:</label>
            <textarea name="specifications" class="form-control ckeditor">{{ old('specifications', $product->specifications) }}</textarea>
        </div>
        <div class="mb-3">
            <label>
                <input type="checkbox" name="is_favorite" value="1" {{ $product->is_favorite ? 'checked' : '' }}> Yêu thích
            </label>
            <label class="ms-3">
                <input type="checkbox" name="is_new" value="1" {{ $product->is_new ? 'checked' : '' }}> Mới
            </label>
            <label class="ms-3">
                <input type="checkbox" name="is_best_seller" value="1" {{ $product->is_best_seller ? 'checked' : '' }}> Bán chạy
            </label>
        </div>
        <div class="mb-3">
            <label>Ảnh chính hiện tại:</label><br>
            @if($product->main_image)
                <img src="{{ asset($product->main_image) }}" width="100">
            @endif
            <input type="file" name="main_image" class="form-control mt-2">
        </div>
        <div class="mb-3">
            <label>Gallery hiện tại:</label><br>
            @foreach($product->galleries as $gallery)
                <div style="display:inline-block;position:relative;">
                    <img src="{{ asset($gallery->image) }}" width="70" style="margin:2px;">
                    <form action="{{ route('admin.products.deleteGallery', $gallery->id) }}" method="POST" style="position:absolute;top:0;right:0;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-xs btn-danger" style="width:18px;height:18px;padding:0;font-size:12px;">×</button>
                    </form>
                </div>
            @endforeach
            <input type="file" name="gallery[]" class="form-control mt-2" multiple>
        </div>
        <button class="btn btn-success">Cập nhật</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof CKEDITOR !== 'undefined') {
            document.querySelectorAll('.ckeditor').forEach(function(el) {
                CKEDITOR.replace(el);
            });
        }
    });
</script>
@endsection