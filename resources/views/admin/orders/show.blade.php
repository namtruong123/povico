{{-- filepath: f:\povico\resources\views\admin\orders\show.blade.php --}}
@extends('admin.admin')
@section('title', 'Chi tiết đơn hàng')
@section('content')
<div class="container-fluid">
    <div class="row order-details">
        <div class="col-xxl-9">
            <div class="row g-3">
                <!-- Order Details -->
                <div class="col-lg-4">
                    <div class="card order-details-card mb-4 h-100">
                        <div class="card-header">
                            <h5 class="text-nowrap">Thông tin đơn hàng (#{{ $order->id }})</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="f-w-600 text-dark"><i class="ti ti-calendar f-s-18 me-2 text-secondary"></i>Ngày đặt</h6>
                                <div class="text-end">
                                    <p>{{ $order->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <h6 class="f-w-600 text-dark"><i class="ti ti-credit-card f-s-18 me-2"></i>Thanh toán</h6>
                                <div class="text-end">
                                    <p>
                                        @if($order->status == 'paid')
                                            <span class="badge bg-success">Đã thanh toán</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Chờ thanh toán</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <h6 class="f-w-600 text-dark"><i class="ti ti-truck-delivery f-s-18 me-2"></i>Vận chuyển</h6>
                                <div class="text-end">
                                    <p>Giao hàng tiêu chuẩn</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Customer Details -->
                <div class="col-lg-4">
                    <div class="card order-details-card mb-4 h-100">
                        <div class="card-header">
                            <h5>Khách hàng</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="f-w-600 text-dark"><i class="ti ti-user text-secondary f-s-18 me-2"></i>Họ tên</h6>
                                <div class="text-end">
                                    <p>{{ $order->customer_name }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <h6 class="f-w-600 text-dark"><i class="ti ti-mail f-s-18 text-secondary me-2"></i>Email</h6>
                                <div class="text-end">
                                    <p>{{ $order->customer_email }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <h6 class="f-w-600 text-dark"><i class="ti ti-device-mobile f-s-18 text-secondary me-2"></i>SĐT</h6>
                                <div class="text-end">
                                    <p>{{ $order->customer_phone }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <h6 class="f-w-600 text-dark"><i class="ti ti-map-pin f-s-18 text-secondary me-2"></i>Địa chỉ</h6>
                                <div class="text-end">
                                    <p>{{ $order->customer_address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Documents -->
                <div class="col-lg-4">
                    <div class="card order-details-card mb-4 h-100">
                        <div class="card-header">
                            <h5>Thông tin khác</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="f-w-600 text-dark"><i class="ti ti-file-invoice text-secondary f-s-18 me-2"></i>Mã đơn</h6>
                                <div class="text-end">
                                    <p>#{{ $order->id }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <h6 class="f-w-600 text-dark"><i class="ti ti-award f-s-18 text-secondary me-2"></i>Tổng tiền</h6>
                                <div class="text-end">
                                    <p class="fw-bold text-primary">{{ number_format($order->total, 0, ',', '.') }}₫</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <h6 class="f-w-600 text-dark"><i class="ti ti-package f-s-18 text-secondary me-2"></i>Trạng thái</h6>
                                <div class="text-end">
                                    @if($order->status == 'paid')
                                        <span class="badge bg-success">Đã thanh toán</span>
                                    @elseif($order->status == 'pending')
                                        <span class="badge bg-warning text-dark">Chờ xử lý</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $order->status }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Order Items Table -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Sản phẩm đã đặt</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bottom-border text-center align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-start">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                <tr>
                                    <td class="text-start">
                                        <div class="d-flex align-items-center gap-2">
                                            @php
                                                $imagePath = $item->product && $item->product->image
                                                    ? public_path('storage/' . $item->product->image)
                                                    : null;
                                            @endphp
                                            @if($item->product && $item->product->image)
                                                <img src="{{ asset(ltrim($item->product->image, '/')) }}" alt="product-img" class="h-50 bg-light-secondary b-r-10" style="width:50px;object-fit:cover;">
                                            @else
                                                <img src="{{ asset('images/no-image.png') }}" alt="product-img" class="h-50 bg-light-secondary b-r-10" style="width:50px;">
                                            @endif
                                            <div class="text-start">
                                                @if($item->product)
                                                    <a href="{{ route('product.detail', $item->product->slug) }}" target="_blank" class="fw-bold text-dark">{{ $item->product->name }}</a>
                                                @else
                                                    <span class="text-muted">[Đã xóa]</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-success fw-bold">{{ number_format($item->price, 0, ',', '.') }}₫</td>
                                    <td class="fw-6">{{ $item->quantity ?? 1 }}</td>
                                    <td class="fw-6">{{ number_format(($item->price * ($item->quantity ?? 1)), 0, ',', '.') }}₫</td>
                                    <td>
                                        <a href="{{ $item->product ? route('product.detail', $item->product->slug) : '#' }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                            <i class="ti ti-eye"></i> Xem
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @if($order->items->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Không có sản phẩm nào</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <h5 class="mb-0">Tổng tiền: <span class="text-primary fw-bold">{{ number_format($order->total, 0, ',', '.') }}₫</span></h5>
                </div>
            </div>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary"><i class="ti ti-arrow-left"></i> Quay lại danh sách</a>
        </div>
        <!-- Order Status Timeline -->
        <div class="col-xxl-3">
            <div class="card equal-card mb-4">
                <div class="card-header">
                    <h5>Trạng thái đơn hàng</h5>
                </div>
                <div class="card-body">
                    <ul class="app-timeline-box">
                        <li class="timeline-section">
                            <div class="timeline-icon">
                                <span class="text-light-primary h-35 w-35 d-flex-center b-r-50">
                                    <i class="ti ti-shopping-cart f-s-20"></i>
                                </span>
                            </div>
                            <div class="timeline-content bg-light-primary b-1-primary">
                                <div class="d-flex justify-content-between align-items-center timeline-flex">
                                    <h6 class="mt-2 text-primary">Đặt hàng</h6>
                                    <span class="badge text-bg-primary ms-2">{{ $order->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="mt-2 text-dark">Đơn hàng đã được tạo.</p>
                                <p class="text-secondary">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </li>
                        <li class="timeline-section">
                            <div class="timeline-icon">
                                <span class="text-light-secondary h-35 w-35 d-flex-center b-r-50">
                                    <i class="ti ti-checks f-s-20"></i>
                                </span>
                            </div>
                            <div class="timeline-content bg-light-secondary b-1-secondary">
                                <div class="d-flex justify-content-between align-items-center timeline-flex">
                                    <h6 class="mt-2 text-secondary">Chờ xử lý</h6>
                                </div>
                                <p class="mt-2">Đơn hàng đang được xử lý.</p>
                            </div>
                        </li>
                        <li class="timeline-section">
                            <div class="timeline-icon">
                                <span class="text-light-success h-35 w-35 d-flex-center b-r-50">
                                    <i class="ti ti-truck-delivery f-s-20"></i>
                                </span>
                            </div>
                            <div class="timeline-content bg-light-success b-1-success">
                                <div class="d-flex justify-content-between align-items-center timeline-flex">
                                    <h6 class="mt-2 text-success">Đang giao</h6>
                                </div>
                                <p class="mt-2 text-dark">Đơn hàng đang được giao đến bạn.</p>
                            </div>
                        </li>
                        <li class="timeline-section">
                            <div class="timeline-icon">
                                <span class="text-light-info h-35 w-35 d-flex-center b-r-50">
                                    <i class="ti ti-package f-s-20"></i>
                                </span>
                            </div>
                            <div class="timeline-content bg-light-info b-1-info">
                                <div class="d-flex justify-content-between align-items-center timeline-flex">
                                    <h6 class="mt-2 text-info">Hoàn tất</h6>
                                </div>
                                <p class="text-secondary">Đơn hàng đã hoàn tất.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection