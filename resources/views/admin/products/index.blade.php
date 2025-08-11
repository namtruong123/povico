@extends('admin.admin')
@section('title', 'Danh sách sản phẩm')
@section('content')
<div class="container">
    <h2>Danh sách sản phẩm</h2>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Thêm sản phẩm</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Hình</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Phân loại</th>
                <th>Giá gốc</th>
                <th>Giá KM</th>
                <th>Số lượng</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    @if($product->main_image)
                        <img src="{{ asset($product->main_image) }}" width="60">
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name ?? '' }}</td>
                <td>
                    @if(isset($product->attribute) && !empty($product->attribute->color))
                        <span style="display:inline-block;width:24px;height:24px;border-radius:50%;border:1px solid #ccc;background:{{ $product->attribute->color }};" title="{{ $product->attribute->name }}"></span>
                        <span class="ms-2">{{ $product->attribute->name }}</span>
                    @else
                        {{ $product->attributeGroup->name ?? '' }}
                    @endif
                </td>
                <td>{{ number_format($product->price) }}</td>
                <td>{{ number_format($product->sale_price) }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    @if($product->is_favorite)
                        <span class="badge bg-success mb-1">Yêu thích</span><br>
                    @endif
                    @if($product->is_new)
                        <span class="badge bg-info mb-1">Mới</span><br>
                    @endif
                    @if($product->is_best_seller)
                        <span class="badge bg-warning mb-1">Bán chạy</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Xóa sản phẩm này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>
@endsection