{{-- filepath: resources/views/admin/category/index.blade.php --}}
@extends('admin.admin')
@section('title', 'Danh sách danh mục sản phẩm')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Danh sách danh mục sản phẩm</h5>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Thêm danh mục mới</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Danh mục cha</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $cat)
                                <tr>
                                    <td>{{ $cat->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="h-30 w-30 d-flex-center b-r-50 overflow-hidden text-bg-primary me-2 simple-table-avatar">
                                                @if($cat->image)
                                                    <img alt="Ảnh" class="img-fluid" src="{{ asset('assets/images/category/' . $cat->image) }}">
                                                @else
                                                    <img alt="Ảnh" class="img-fluid" src="{{ asset('assets/images/category/default.png') }}">
                                                @endif
                                            </div>
                                            <p class="mb-0 f-w-500">{{ $cat->name }}</p>
                                        </div>
                                    </td>
                                    <td>{{ $cat->slug }}</td>
                                    <td>
                                        @if($cat->image)
                                            <img src="{{ asset($cat->image) }}" alt="Ảnh" width="50">
                                        @endif
                                    </td>
                                    <td>{{ $cat->description }}</td>
                                    <td>{{ $cat->parent ? $cat->parent->name : '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $cat) }}" class="btn btn-sm btn-warning">Sửa</a>
                                        <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Xác nhận xóa?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Chưa có danh mục nào.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection