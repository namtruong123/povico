{{-- filepath: f:\povico\resources\views\Ecom\order\tracking.blade.php --}}
@extends('Ecom.layout')
@section('title', 'Đơn hàng của tôi')
@section('content')
@include('Ecom.partials.header')
<div class="space-1"></div>
<div class="space-1"></div>
<div class="container py-5">
    <h2 class="mb-4">Đơn hàng của bạn</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ number_format($order->total, 0, ',', '.') }}₫</td>
                    <td>
                        <span class="badge bg-{{ $order->status == 'paid' ? 'success' : 'secondary' }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('order.detail', $order) }}" class="btn btn-sm btn-info">Xem</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Bạn chưa có đơn hàng nào.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection