{{-- filepath: resources/views/admin/user/index.blade.php --}}
@extends('admin.admin')
@section('title', 'Quản lý người dùng')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <div class="row m-1">
        <div class="col-12">
            <h5>Quản lý người dùng</h5>
            <ul class="app-line-breadcrumbs mb-3">
                <li>
                    <a class="f-s-14 f-w-500" href="#">
                        <span>
                            <i class="ph-duotone ph-users-three f-s-16"></i> Người dùng
                        </span>
                    </a>
                </li>
                <li class="active">
                    <a class="f-s-14 f-w-500" href="#">Danh sách</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <div class="row table-section">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Danh sách người dùng</h5>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                        <i class="ti ti-user-plus"></i> Tạo tài khoản
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Quyền</th>
                                    <th scope="col" class="text-end">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($users as $i => $user)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                            <img src="{{ $user->avatar
                                                ? asset('assets/backend/images/avatar/' . basename($user->avatar))
                                                : asset('assets/backend/images/avatar/default.png') }}"
                                                alt="avatar"
                                                class="me-2"
                                                style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                                                <span class="mb-0 f-w-500">{{ $user->name }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <span class="badge
                                                @if($user->role == 'admin') bg-primary
                                                @elseif($user->role == 'giamdoc') bg-danger
                                                @elseif($user->role == 'marketing') bg-info
                                                @elseif($user->role == 'sale_cuahang') bg-warning
                                                @elseif($user->role == 'sale_online') bg-success
                                                @else bg-secondary
                                                @endif">
                                                {{ $user->role }}
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-warning me-1">
                                                <i class="ti ti-edit"></i> Sửa
                                            </a>
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Xóa?')">
                                                    <i class="ti ti-trash"></i> Xóa
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection