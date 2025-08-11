@extends('admin.admin')

@section('content')
<div class="container">
    <h2>Danh sách Lookbook</h2>
    <a href="{{ route('admin.lookbooks.create') }}" class="btn btn-primary mb-3">Thêm Lookbook</a>
    <a href="{{ route('admin.lookbooks.index') }}">Quay lại</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Ảnh</th>
                <th>Ảnh Hover</th>
                <th>Link sản phẩm</th>
                <th>Giá</th>
                <th>Vị trí</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lookbooks as $lookbook)
            <tr>
                <td>{{ $lookbook->title }}</td>
                <td><img src="{{ asset($lookbook->image) }}" width="60"></td>
                <td>
                    @if($lookbook->hover_image)
                        <img src="{{ asset($lookbook->hover_image) }}" width="60">
                    @endif
                </td>
                <td>{{ $lookbook->product_link }}</td>
                <td>{{ number_format($lookbook->price, 0, ',', '.') }}₫</td>
                <td>{{ $lookbook->position }}</td>
                <td>
                    <a href="{{ route('admin.lookbooks.edit', $lookbook->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                    <form action="{{ route('admin.lookbooks.destroy', $lookbook->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Xóa?')" class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $lookbooks->links() }}
</div>
@endsection