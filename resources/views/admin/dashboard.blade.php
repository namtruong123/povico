@extends('admin.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Tổng quan -->
            <div class="col-lg-5 col-xxl-3 eshop-cards-container">
                <div class="row">
                    <div class="col-6 col-md-3 col-lg-6">
                        <div class="card">
                            <span class="bg-primary h-50 w-50 d-flex-center rounded-circle m-auto eshop-icon-box">
                                <i class="ph ph-currency-circle-dollar f-s-24"></i>
                            </span>
                            <div class="card-body eshop-cards">
                                <span class="ripple-effect"></span>
                                <h3 class="text-primary mb-0">1.2M</h3>
                                <p class="mg-b-35 f-w-600 text-dark-800 txt-ellipsis-1">Tổng doanh số</p>
                                <span class="badge bg-light-primary">Xem báo cáo</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-6">
                        <div class="card">
                            <span class="bg-danger h-50 w-50 d-flex-center rounded-circle m-auto eshop-icon-box">
                                <i class="ph ph-x-circle f-s-24"></i>
                            </span>
                            <div class="card-body eshop-cards">
                                <span class="ripple-effect"></span>
                                <h3 class="text-danger mb-0">125</h3>
                                <p class="mg-b-35 f-w-600 text-dark-800 txt-ellipsis-1">Đơn hủy</p>
                                <span class="badge bg-light-danger">Đã hoàn tiền</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-6">
                        <div class="card">
                            <span class="bg-warning h-50 w-50 d-flex-center rounded-circle m-auto eshop-icon-box">
                                <i class="ph-duotone ph-certificate f-s-24"></i>
                            </span>
                            <div class="card-body eshop-cards">
                                <span class="ripple-effect"></span>
                                <h3 class="text-warning mb-0 txt-ellipsis-1">95%</h3>
                                <p class="mg-b-35 f-w-600 text-dark-800 txt-ellipsis-1">Top sản phẩm</p>
                                <span class="badge bg-light-dark">watch X200</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-6">
                        <div class="card">
                            <span class="bg-success h-50 w-50 d-flex-center rounded-circle m-auto eshop-icon-box">
                                <i class="ph-duotone ph-user-circle-plus f-s-24"></i>
                            </span>
                            <div class="card-body eshop-cards">
                                <span class="ripple-effect"></span>
                                <h3 class="text-success mb-0">8.5k</h3>
                                <p class="mg-b-35 f-w-600 text-dark-800 txt-ellipsis-1">Khách hàng mới</p>
                                <span class="badge bg-light-success">Đang hoạt động</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Đơn hàng & tiến trình -->
            <div class="col-lg-7 col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-sm-6 position-relative">
                                <div class="location-container">
                                    <div class="glass-effect-box position-absolute bottom-0">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <div class="w-65 h-65 overflow-hidden position-absolute top-0 start-0 d-flex-center">
                                                <img alt="image" class="img-fluid" src="{{ asset('assets/images/dashboard/ecommerce-dashboard/order1.gif') }}">
                                            </div>
                                            <div class="flex-grow-1 ps-5">
                                                <p class="fw-medium mb-0">Mã đơn</p>
                                                <h6 class="text-primary mb-0 txt-ellipsis-1">r72qU2892</h6>
                                            </div>
                                            <span class="badge text-bg-primary f-s-10 ms-2">• Đang giao</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 cart-side-card mt-3 mt-sm-0">
                                <div class="mb-2">
                                    <h6 class="text-dark mb-0 txt-ellipsis-1">Ngày giao dự kiến: 20/02/2025</h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table cart-side-table mb-0">
                                        <tbody>
                                            <tr class="total-price">
                                                <th>Tạm tính :</th>
                                                <th class="text-end"><span id="cart-sub">$359.96</span></th>
                                            </tr>
                                            <tr>
                                                <td><p class="mb-0 txt-ellipsis-1">Giảm giá:</p></td>
                                                <td class="text-end text-success">-$53.00</td>
                                            </tr>
                                            <tr>
                                                <td><p class="mb-0 txt-ellipsis-1">Thuế (12.5%) :</p></td>
                                                <td class="text-end text-danger">$44.99</td>
                                            </tr>
                                            <tr class="total-price">
                                                <th><p class="mb-0 txt-ellipsis-1">Tổng cộng (USD) :</p></th>
                                                <th class="text-end"><span id="cart-total">$415.96</span></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p class="f-w-500 mb-0 txt-ellipsis-1">
                                    Hỗ trợ: <a href="#" class="link-primary text-d-underline">https://support.aicom.com/order?r72qU2892</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tiến trình giao hàng -->
                <div class="card">
                    <div class="card-body">
                        <ul class="app-side-timeline shipping-timeline">
                            <li class="side-timeline-section w-100 right-side complete-step">
                                <div class="side-timeline-icon">
                                    <span class="bg-primary h-35 w-35 d-flex-center b-r-50">
                                        <i class="ph-fill ph-shopping-bag-open f-s-18"></i>
                                    </span>
                                </div>
                                <div class="timeline-content p-0">
                                    <div>
                                        <h6 class="f-s-15 mb-2 txt-ellipsis-1">Đặt hàng</h6>
                                        <p class="mb-0 text-dark-800 f-w-400">14/02/2025 <span class="text-primary f-w-500">10:15 AM</span></p>
                                    </div>
                                </div>
                            </li>
                            <li class="side-timeline-section w-100 right-side complete-step">
                                <div class="side-timeline-icon">
                                    <span class="bg-primary h-35 w-35 d-flex-center b-r-50">
                                        <i class="ph-fill ph-seal-check f-s-18"></i>
                                    </span>
                                </div>
                                <div class="timeline-content p-0">
                                    <div>
                                        <h6 class="f-s-15 mb-2 txt-ellipsis-1">Xác nhận đơn</h6>
                                        <p class="mb-0 text-dark-800 f-w-400">14/02/2025 <span class="text-primary f-w-500">10:30 AM</span></p>
                                    </div>
                                </div>
                            </li>
                            <li class="side-timeline-section w-100 right-side">
                                <div class="side-timeline-icon">
                                    <span class="bg-light-secondary text-dark-400 h-35 w-35 d-flex-center b-r-50">
                                        <i class="ph-fill ph-truck f-s-18"></i>
                                    </span>
                                </div>
                                <div class="timeline-content p-0">
                                    <div>
                                        <h6 class="f-s-15 mb-2 txt-ellipsis-1">Đã gửi hàng</h6>
                                        <p class="mb-0 text-dark-800 f-w-400">15/02/2025 <span class="text-primary f-w-500">9:00 AM</span></p>
                                    </div>
                                </div>
                            </li>
                            <li class="side-timeline-section w-100 right-side">
                                <div class="side-timeline-icon">
                                    <span class="bg-light-secondary text-dark-400 h-35 w-35 d-flex-center b-r-50">
                                        <i class="ph-fill ph-house f-s-18"></i>
                                    </span>
                                </div>
                                <div class="timeline-content p-0">
                                    <div>
                                        <h6 class="f-s-15 mb-2 txt-ellipsis-1">Đã giao</h6>
                                        <p class="mb-0 text-dark-800 f-w-400">18/02/2025 <span class="text-primary f-w-500">3:45 PM</span></p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Thông báo đơn hàng -->
            <div class="col-sm-7 col-lg-4 col-xxl-3">
                <ul class="notifications-list box-list mb-4">
                    <li class="d-flex align-items-center justify-content-between gap-3 b-s-4-primary">
                        <div>
                            <h6 class="txt-ellipsis-1 mb-0">Thông báo đơn hàng</h6>
                            <p class="text-secondary mb-0">Cập nhật 2 giờ gần nhất</p>
                        </div>
                        <div class="h-45 w-45 d-flex-center rounded-circle flex-shrink-0 bg-light-primary position-relative">
                            <i class="ph ph-bell-ringing f-s-20"></i>
                            <span class="position-absolute translate-middle badge rounded-pill bg-danger badge-notification">4</span>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="h-45 w-45 d-flex-center b-r-12 overflow-hidden flex-shrink-0 bg-primary">OR</div>
                        <div class="ms-3">
                            <p class="mb-0 f-w-500 f-s-16 txt-ellipsis-1">Đơn hàng mới</p>
                            <p class="mb-0 text-secondary">5 phút trước</p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="h-45 w-45 d-flex-center b-r-12 overflow-hidden flex-shrink-0 bg-success-400">
                            <img alt="order" class="img-fluid" src="{{ asset('assets/images/avatar/2.png') }}">
                        </div>
                        <div class="ms-3">
                            <p class="mb-0 f-w-500 f-s-16 txt-ellipsis-1">Đơn #1024 đã gửi</p>
                            <p class="mb-0 text-secondary">10 phút trước</p>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="h-45 w-45 d-flex-center b-r-12 overflow-hidden flex-shrink-0 bg-danger-400">
                            <img alt="order" class="img-fluid" src="{{ asset('assets/images/avatar/5.png') }}">
                        </div>
                        <div class="ms-3">
                            <p class="mb-0 f-w-500 f-s-16 txt-ellipsis-1">Đơn #1022 đã hủy</p>
                            <p class="mb-0 text-secondary">20 phút trước</p>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Doanh thu tuần -->
            <div class="col-sm-5 col-lg-4 col-xxl-3">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="px-4 py-3">
                            <h4 class="text-primary">$65,563.24</h4>
                            <p class="mb-0 text-secondary"><span class="text-light-danger">38.3%-</span> Tuần trước</p>
                        </div>
                        <div class="earning-chart">
                            <div id="earningChart" style="min-height: 257px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mua gần đây -->
            <div class="col-sm-6 col-lg-4 col-xxl-3">
                <ul class="box-list mb-4">
                    <li class="b-s-4-primary">
                        <h5>Mua gần đây</h5>
                    </li>
                    <li class="d-flex align-items-center justify-between gap-2">
                        <div class="b-1-light bg-primary-200 p-1 h-40 w-40 d-flex-center b-r-12 flex-shrink-0 overflow-hidden box-list-img">
                            <img alt="Headphones" class="img-fluid" src="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/02.png') }}">
                        </div>
                        <div class="mg-s-45 flex-grow-1">
                            <h6 class="mb-0 text-dark-800 f-w-500 txt-ellipsis-1">Headphones</h6>
                            <p class="text-secondary-800 mb-0">AudioTech</p>
                        </div>
                        <span class="badge bg-light-primary">$120</span>
                    </li>
                    <li class="d-flex align-items-center justify-between gap-2">
                        <div class="b-1-light bg-primary-200 p-1 h-40 w-40 d-flex-center b-r-12 flex-shrink-0 overflow-hidden box-list-img">
                            <img alt="Digital Camera" class="img-fluid" src="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/03.png') }}">
                        </div>
                        <div class="mg-s-45 flex-grow-1">
                            <h6 class="mb-0 text-dark-800 f-w-500 txt-ellipsis-1">Digital Camera</h6>
                            <p class="text-secondary-800 mb-0">LensPro</p>
                        </div>
                        <span class="badge bg-light-primary">$350</span>
                    </li>
                    <li class="d-flex align-items-center justify-between gap-2">
                        <div class="b-1-light bg-primary-200 p-1 h-40 w-40 d-flex-center b-r-12 flex-shrink-0 overflow-hidden box-list-img">
                            <img alt="Smart Watch" class="img-fluid" src="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/01.png') }}">
                        </div>
                        <div class="mg-s-45 flex-grow-1">
                            <h6 class="mb-0 text-dark-800 f-w-500 txt-ellipsis-1">Smart Watch</h6>
                            <p class="text-secondary-800 mb-0">TechWear</p>
                        </div>
                        <span class="badge bg-light-primary">$199</span>
                    </li>
                </ul>
            </div>

            <!-- Top thương hiệu -->
            <div class="col-sm-6 col-lg-4 col-xxl-3">
                <ul class="list-box top-brand-list mb-4">
                    <li class="b-s-4-primary">
                        <h5>Top thương hiệu</h5>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="b-1-light bg-primary-200 p-1 h-40 w-40 d-flex-center b-r-12 flex-shrink-0 overflow-hidden box-list-img">
                            <img alt="Stylique" class="img-fluid" src="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/04.png') }}">
                        </div>
                        <div class="flex-grow-1 mg-s-45">
                            <h6 class="mb-0 f-w-500 text-dark-800 txt-ellipsis-1">Stylique</h6>
                            <p class="text-secondary-800 mb-0">Clothing</p>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-light-primary">96.85%</span>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="b-1-light bg-primary-200 p-1 h-40 w-40 d-flex-center b-r-12 flex-shrink-0 overflow-hidden box-list-img">
                            <img alt="Techspire" class="img-fluid" src="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/06.png') }}">
                        </div>
                        <div class="flex-grow-1 mg-s-45">
                            <h6 class="mb-0 f-w-500 text-dark-800 txt-ellipsis-1">Techspire</h6>
                            <p class="text-secondary-800 mb-0">Electronics</p>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-light-success">89.42%</span>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <div class="b-1-light bg-primary-200 p-1 h-40 w-40 d-flex-center b-r-12 flex-shrink-0 overflow-hidden box-list-img">
                            <img alt="TrekVibe" class="img-fluid" src="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/07.png') }}">
                        </div>
                        <div class="flex-grow-1 mg-s-45">
                            <h6 class="mb-0 f-w-500 text-dark-800 txt-ellipsis-1">TrekVibe</h6>
                            <p class="text-secondary-800 mb-0">Bag's</p>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-light-danger">74.30%</span>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Offer card -->
            <div class="col-sm-6 col-lg-4 col-xxl-3">
                <div class="card offer-card-box">
                    <div class="circle-ribbon circle-left ribbon-danger b-4-white">50%</div>
                    <div class="card-body offer-card-body overflow-hidden">
                        <div>
                            <div class="my-3">
                                <span class="badge text-primary f-s-10 bg-white-500">Clothing</span>
                                <span class="badge text-primary f-s-10 bg-white-500">Toys</span>
                                <span class="badge text-primary f-s-10 bg-white-500">Accessories</span>
                            </div>
                            <h5 class="text-white mt-4">Super <span class="text-bg-primary p-1 f-s-26 f-w-700">Kids’</span> Weekend<br>
                                <span class="text-danger highlight-word p-1">Sale</span>
                            </h5>
                        </div>
                        <div>
                            <a href="#" class="btn btn-white f-w-500 w-100 my-2">Mua ngay</a>
                            <a class="f-s-12 f-w-500 text-white text-d-underline" href="#">Đơn tối thiểu $30. Áp dụng online & cửa hàng.</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- AI Commerce -->
            <div class="col-sm-6 col-md-4 col-xxl-2 order-3-md">
                <div class="card service-trial-card">
                    <div class="card-body">
                        <h5 class="text-white f-w-600 txt-ellipsis-1">AI Commerce</h5>
                        <p class="text-white mt-2 txt-ellipsis-2">Mua sắm thông minh, tăng trưởng nhanh</p>
                        <div class="service-img-box"></div>
                        <div class="mt-3">
                            <a href="#" class="btn btn-primary btn-sm w-100 text-nowrap">Dùng thử miễn phí</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tổng sale tuần -->
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="mb-2">
                            <h4 class="text-primary">98.65% <span class="f-s-14 text-dark">Tổng sale</span></h4>
                        </div>
                        <div id="revenueChart" style="min-height: 245px;"></div>
                    </div>
                </div>
            </div>

            <!-- Sản phẩm nổi bật -->
            <div class="col-md-8 col-xxl-6">
                <div class="card ecommerce-product-box">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="row g-2 h-100">
                                    <div class="col-6">
                                        <a href="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/product-01.jpg') }}" class="glightbox brand-img-box" data-glightbox="type: image; zoomable: true;">
                                            <img src="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/product-01.jpg') }}" class="w-100" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-6 position-relative">
                                        <div class="box-ribbon box-right">
                                            <div class="ribbonbox ribbon-danger">Mới</div>
                                        </div>
                                        <a href="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/product-02.jpg') }}" class="glightbox brand-img-box" data-glightbox="type: image;">
                                            <img src="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/product-02.jpg') }}" class="w-100" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/product-03.jpg') }}" class="glightbox brand-img-box" data-glightbox="type: image;">
                                            <img src="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/product-03.jpg') }}" class="w-100" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/product-04.jpg') }}" class="glightbox brand-img-box" data-glightbox="type: image;">
                                            <img src="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/product-04.jpg') }}" class="w-100" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/product-05.jpg') }}" class="glightbox brand-img-box" data-glightbox="type: image;">
                                            <img src="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/product-05.jpg') }}" class="w-100" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/product-06.jpg') }}" class="glightbox brand-img-box" data-glightbox="type: image;">
                                            <img src="{{ asset('assets/images/dashboard/ecommerce-dashboard/product/product-06.jpg') }}" class="w-100 rounded" alt="...">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="my-3">
                                    <h3 class="text-dark-800 f-w-700 txt-ellipsis-1">$58,902.90 <span class="f-s-16 f-w-500 text-secondary">Tuần trước</span></h3>
                                    <div class="custom-progress-container">
                                        <div class="progress-bar"></div>
                                        <div class="progress-bar"></div>
                                        <div class="progress-bar"></div>
                                        <div class="progress-bar"></div>
                                    </div>
                                </div>
                                <h6>Chọn tags</h6>
                                <div class="form-selectgroup products-tags-list my-3">
                                    <label class="select-items">
                                        <input checked class="select-input" type="checkbox">
                                        <span class="select-box"><span class="selectitem">○  Hàng mới về</span></span>
                                    </label>
                                    <label class="select-items">
                                        <input class="select-input" type="checkbox">
                                        <span class="select-box"><span class="selectitem">○  Bán chạy</span></span>
                                    </label>
                                    <label class="select-items">
                                        <input checked class="select-input" type="checkbox">
                                        <span class="select-box"><span class="selectitem">○  Xu hướng</span></span>
                                    </label>
                                    <label class="select-items">
                                        <input class="select-input" type="checkbox">
                                        <span class="select-box"><span class="selectitem">○  Độc quyền</span></span>
                                    </label>
                                    <label class="select-items">
                                        <input checked class="select-input" type="checkbox">
                                        <span class="select-box"><span class="selectitem">○  Đang giảm giá</span></span>
                                    </label>
                                    <label class="select-items">
                                        <input class="select-input" type="checkbox">
                                        <span class="select-box"><span class="selectitem">○  Miễn phí ship</span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection