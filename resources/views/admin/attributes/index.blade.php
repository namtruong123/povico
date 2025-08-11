@extends('admin.admin')
@section('title', 'Danh sách phân loại sản phẩm')
@section('content')
@php use Illuminate\Support\Str; @endphp
<div class="container">
    <h2>Danh sách phân loại sản phẩm</h2>
    <a href="{{ route('admin.attributes.create') }}" class="btn btn-primary mb-3">Thêm phân loại</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Slug</th>
                <th>Mô tả</th>
                <th>Nhóm phân loại</th>
                <th>Màu</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attributes as $attribute)
                <tr>
                    <td>{{ $attribute->name }}</td>
                    <td>{{ $attribute->slug }}</td>
                    <td>{{ $attribute->description }}</td>
                    <td>{{ $attribute->group->name ?? '' }}</td>
                    <td>
                        @if(
                            (isset($attribute->group->slug) && $attribute->group->slug === 'color') ||
                            (isset($attribute->group->name) && Str::lower($attribute->group->name) === 'màu sắc')
                        )
                            @if(!empty($attribute->color))
                                <span style="display:inline-block;width:24px;height:24px;border-radius:50%;border:1px solid #ccc;background:{{ $attribute->color }};"></span>
                            @endif
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form action="{{ route('admin.attributes.destroy', $attribute->id) }}" method="POST" style="display:inline-block">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Xóa phân loại này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $attributes->links() }}
</div>
@endsection