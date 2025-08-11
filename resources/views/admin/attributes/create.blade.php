@extends('admin.admin')
@section('title', 'Thêm phân loại sản phẩm')
@section('content')
<div class="container">
    <h2>Thêm phân loại sản phẩm</h2>
    <form action="{{ route('admin.attributes.store') }}" method="POST">
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
        <div class="mb-3">
            <label>Nhóm phân loại</label>
            <select name="group_id" class="form-control" required>
                <option value="">-- Chọn nhóm --</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3" id="color-picker-group" style="display: none;">
            <label>Chọn màu</label><br>
            <input type="color" name="color" id="color-picker-input" style="width: 40px; height: 40px; border: none; padding: 0; border-radius: 50%; overflow: hidden; cursor: pointer;">
        </div>
        <button class="btn btn-success">Lưu</button>
        <a href="{{ route('admin.attributes.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const groupSelect = document.querySelector('select[name="group_id"]');
        const colorGroup = document.getElementById('color-picker-group');

        groupSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption.text.trim().toLowerCase() === 'màu sắc') {
                colorGroup.style.display = 'block';
            } else {
                colorGroup.style.display = 'none';
            }
        });
        // Hiển thị đúng khi load trang (nếu có giá trị đã chọn)
        const selectedOption = groupSelect.options[groupSelect.selectedIndex];
        if (selectedOption && selectedOption.text.trim().toLowerCase() === 'màu sắc') {
            colorGroup.style.display = 'block';
        }
    });
</script>
@endsection