@extends('admin.admin')
@section('title', 'Nhóm phân loại')
@section('content')
<div class="container">
    <h2>Danh sách nhóm phân loại</h2>
    <a href="{{ route('admin.attribute_groups.create') }}" class="btn btn-primary mb-3">Thêm nhóm phân loại</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên nhóm</th>
                <th>Slug</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->slug }}</td>
                    <td>{{ $group->description }}</td>
                    <td>
                        <a href="{{ route('admin.attribute_groups.edit', $group->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form action="{{ route('admin.attribute_groups.destroy', $group->id) }}" method="POST" style="display:inline-block">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Xóa nhóm này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection