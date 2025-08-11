@extends('admin.admin')
@section('title', 'Tạo tài khoản')
@section('content')
<div class="container-fluid">
    <div class="row m-1">
        <div class="col-12">
            <h5>Tạo tài khoản mới</h5>
            <ul class="app-line-breadcrumbs mb-3">
                <li>
                    <a class="f-s-14 f-w-500" href="{{ route('admin.users.index') }}">
                        <i class="ph-duotone ph-users-three f-s-16"></i> Người dùng
                    </a>
                </li>
                <li class="active"><span class="f-s-14 f-w-500">Tạo mới</span></li>
            </ul>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            {{-- Card Avatar --}}
           <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header"><strong>Ảnh đại diện</strong></div>
                    <div class="card-body d-flex flex-column align-items-center justify-content-start" style="min-height: 550px; padding-top: 30px;">
                        <div class="d-flex justify-content-center align-items-center mb-3" style="height: 400px; padding-bottom: 15px;">
                            <img id="avatar-preview"
                                src="{{ asset('assets/images/avatar/default.png') }}"
                                alt="Xem trước ảnh"
                                style="width: 400px; height: 400px; object-fit: cover; border-radius: 50%; border: 4px solid #ddd; box-shadow: 0 4px 10px rgba(0,0,0,0.15); transition: all 0.3s ease;">
                        </div>

                        <input type="file" name="avatar" id="avatar" class="d-none" accept="image/*" onchange="previewAvatar(event)">
                        <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('avatar').click()">Chọn ảnh</button>
                    </div>
                </div>
            </div>
            {{-- Card Thông tin --}}
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header"><strong>Thông tin tài khoản</strong></div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div>
                            <div class="mb-3">
                                <label class="form-label" for="name">Tên người dùng</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên" value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">Mật khẩu</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="role">Quyền</label>
                                <select name="role" id="role" class="form-select">
                                    <option value="user" {{ old('role', $user->role ?? '') == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="giamdoc" {{ old('role', $user->role ?? '') == 'giamdoc' ? 'selected' : '' }}>Giám đốc</option>
                                    <option value="sale_cuahang" {{ old('role', $user->role ?? '') == 'sale_cuahang' ? 'selected' : '' }}>Sale cửa hàng</option>
                                    <option value="sale_online" {{ old('role', $user->role ?? '') == 'sale_online' ? 'selected' : '' }}>Sale online</option>
                                    <option value="marketing" {{ old('role', $user->role ?? '') == 'marketing' ? 'selected' : '' }}>Marketing</option>
                                </select>
                            </div>
                            <div class="form-check mb-3 d-flex gap-2">
                                <input class="form-check-input" type="checkbox" id="active" name="active" checked>
                                <label class="form-check-label" for="active">Kích hoạt tài khoản</label>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay lại</a>
                            <button class="btn btn-primary">Tạo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function previewAvatar(event) {
    const [file] = event.target.files;
    if (file) {
        document.getElementById('avatar-preview').src = URL.createObjectURL(file);
    }
}
</script>
@endsection
