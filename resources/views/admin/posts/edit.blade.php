@extends('admin.admin')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header">
            <h4>Chỉnh sửa bài đăng tin tức</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tiêu đề</label>
                        <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ảnh đại diện</label>
                        @if($post->image)
                            <div class="mb-2">
                                <img src="{{ asset($post->image) }}" width="120">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                        <div class="mt-2">
                            <img id="preview" src="#" alt="Preview" style="display:none;max-width:150px;">
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">Nội dung</label>
                        <textarea id="content" name="content" class="form-control" rows="10" required>{{ $post->content }}</textarea>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- CKEditor 4.25.1-lts CDN, đã tắt cảnh báo bảo mật -->
<script src="https://cdn.ckeditor.com/4.25.1-lts/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', {
        // Tắt cảnh báo bảo mật
        on: {
            instanceReady: function(evt) {
                var warning = document.querySelector('.cke_notification_warning');
                if(warning) warning.style.display = 'none';
            }
        }
    });
    function previewImage(event) {
        const [file] = event.target.files;
        if (file) {
            const preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    }
</script>
@endpush