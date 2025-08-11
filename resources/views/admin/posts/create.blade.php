@extends('admin.admin')

@section('content')
<style>
    .cke_notification, .cke_notification_message {
        display: none !important;
    }
</style>
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header">
            <h4>Thêm bài đăng tin tức</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tiêu đề</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ảnh đại diện</label>
                        <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                        <div class="mt-2">
                            <img id="preview" src="#" alt="Preview" style="display:none;max-width:150px;">
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">Nội dung</label>
                        <textarea id="content" name="content" class="form-control" rows="10" required></textarea>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
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