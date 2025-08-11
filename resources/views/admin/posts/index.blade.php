@extends('admin.admin')
@section('content')
<div class="container">
    <h2>Danh sách Tin tức</h2>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-success mb-2">Thêm bài viết</a>
    <table class="table">
        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Tiêu đề</th>
                <th>Ngày đăng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>
                    @if($post->image)
                        <img src="{{ asset($post->image) }}" width="100">
                    @endif
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa bài viết này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection