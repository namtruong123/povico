{{-- filepath: resources/views/admin/orders/index.blade.php --}}
@extends('admin.admin')
@section('title', 'Quản lý đơn hàng')
@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Danh sách đơn hàng</h2>
    </div>
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="fw-6">Mã đơn</th>
                            <th class="fw-6">Khách hàng</th>
                            <th class="fw-6">SĐT</th>
                            <th class="fw-6">Email</th>
                            <th class="fw-6">Địa chỉ</th>
                            <th class="fw-6">Tổng tiền</th>
                            <th class="fw-6">Trạng thái</th>
                            <th class="fw-6">Ngày đặt</th>
                            <th class="fw-6 text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->customer_phone }}</td>
                            <td>{{ $order->customer_email }}</td>
                            <td>{{ $order->customer_address }}</td>
                            <td class="fw-bold text-primary">{{ number_format($order->total, 0, ',', '.') }}₫</td>
                            <td>
                                @if($order->status == 'paid')
                                    <span class="badge bg-success">Đã thanh toán</span>
                                @elseif($order->status == 'pending')
                                    <span class="badge bg-warning text-dark">Chờ xử lý</span>
                                @else
                                    <span class="badge bg-secondary">{{ $order->status }}</span>
                                @endif
                            </td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="ti ti-eye"></i> Xem
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">Chưa có đơn hàng nào</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-3">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
@endsection