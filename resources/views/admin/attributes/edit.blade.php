@extends('admin.admin')
@section('title', 'Sửa phân loại sản phẩm')
@section('content')
<div class="container">
    <h2>Sửa phân loại sản phẩm</h2>
    <form action="{{ route('admin.attributes.update', $attribute->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Tên phân loại</label>
            <input type="text" name="name" class="form-control" value="{{ $attribute->name }}" required>
        </div>
        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ $attribute->slug }}">
        </div>
        <div class="mb-3">
            <label>Mô tả</label>
            <textarea name="description" class="form-control">{{ $attribute->description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Nhóm phân loại</label>
            <select name="group_id" class="form-control" id="group_id" required>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}" data-slug="{{ $group->slug }}" {{ $attribute->group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3" id="color-picker-group" style="display: none;">
            <label>Chọn màu</label><br>
            <input type="color" name="color" id="color-picker-input"
                   value="{{ $attribute->color ?? '#000000' }}"
                   style="width: 40px; height: 40px; border: none; padding: 0; border-radius: 50%; overflow: hidden; cursor: pointer;">
        </div>
        <button class="btn btn-success">Cập nhật</button>
        <a href="{{ route('admin.attributes.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const groupSelect = document.getElementById('group_id');
        const colorGroup = document.getElementById('color-picker-group');
        function toggleColorPicker() {
            const selectedOption = groupSelect.options[groupSelect.selectedIndex];
            if (selectedOption.text.trim().toLowerCase() === 'màu sắc') {
                colorGroup.style.display = 'block';
            } else {
                colorGroup.style.display = 'none';
            }
        }
        groupSelect.addEventListener('change', toggleColorPicker);
        toggleColorPicker(); // Hiển thị đúng khi load trang
    });
</script>
@endsection