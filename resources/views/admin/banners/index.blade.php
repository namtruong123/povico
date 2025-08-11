{{-- resources/views/admin/banners/index.blade.php --}}
@extends('admin.admin')
@section('content')
<div class="container">
    <h2>Danh sách Banner</h2>
    <a href="{{ route('admin.banners.create') }}" class="btn btn-success mb-2">Thêm Banner</a>
    <table class="table">
        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Tiêu đề</th>
                <th>Link</th>
                <th>Thứ tự</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banners as $banner)
            <tr>
                <td><img src="{{ asset($banner->image) }}" width="120"></td>
                <td>{{ $banner->title }}</td>
                <td>{{ $banner->link }}</td>
                <td>{{ $banner->order }}</td>
                <td>
                    <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa banner này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection