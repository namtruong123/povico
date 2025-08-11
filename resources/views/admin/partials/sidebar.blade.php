<nav>
    <div class="app-logo">
        <a class="logo d-inline-block" href="{{ route('admin.dashboard') }}">
            <img alt="Logo" src="{{ asset('assets/images/logo/1.png') }}">
        </a>
        <span class="bg-light-primary toggle-semi-nav d-flex-center">
            <i class="ti ti-chevron-right"></i>
        </span>
    </div>
    <div class="app-nav" id="app-simple-bar">
        <ul class="main-nav p-0 mt-2">
            <li class="menu-title">
                <span>Dashboard</span>
            </li>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="ti ti-home"></i>
                    Dashboard
                </a>
            </li>
            <li class="menu-title">
                <span>Quản lý người dùng</span>
            </li>
            <li>
                <a data-bs-toggle="collapse" href="#collapse-user" role="button" aria-expanded="false" aria-controls="collapse-user">
                    <i class="ti ti-users"></i>
                    Người dùng
                    <i class="ti ti-chevron-down float-end"></i>
                </a>
                <ul class="collapse list-unstyled ps-3" id="collapse-user">
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="ti ti-users"></i>
                            Xem tất cả người dùng
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.create') }}">
                            <i class="ti ti-user-plus"></i>
                            Thêm người dùng
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-title">
                <span>Quản lý danh mục sản phẩm</span>
            </li>
            <li>
                <a data-bs-toggle="collapse" href="#collapse-category" role="button" aria-expanded="false" aria-controls="collapse-category">
                    <i class="ti ti-category"></i>
                    Danh mục sản phẩm
                    <i class="ti ti-chevron-down float-end"></i>
                </a>
                <ul class="collapse list-unstyled ps-3" id="collapse-category">
                    <li>
                        <a href="{{ route('admin.categories.index') }}">
                            <i class="ti ti-list-details"></i>
                            Xem tất cả danh mục
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.create') }}">
                            <i class="ti ti-plus"></i>
                            Thêm danh mục sản phẩm
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.subcategories') }}">
                            <i class="ti ti-list-numbers"></i>
                            Quản lý danh mục con
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-title">
                <span>Quản lý thuộc tính sản phẩm</span>
            </li>
            <li>
                <a data-bs-toggle="collapse" href="#collapse-attribute" role="button" aria-expanded="false" aria-controls="collapse-attribute">
                    <i class="ti ti-tags"></i>
                    Phân loại sản phẩm
                    <i class="ti ti-chevron-down float-end"></i>
                </a>
                <ul class="collapse list-unstyled ps-3" id="collapse-attribute">
                    <li>
                        <a href="{{ route('admin.attribute_groups.index') }}">
                            <i class="ti ti-list-details"></i>
                            Nhóm phân loại
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.attribute_groups.create') }}">
                            <i class="ti ti-plus"></i>
                            Thêm nhóm phân loại
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.attributes.index') }}">
                            <i class="ti ti-list-numbers"></i>
                            Danh sách phân loại
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.attributes.create') }}">
                            <i class="ti ti-plus"></i>
                            Thêm phân loại
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-title">
                <span>Quản lý sản phẩm</span>
            </li>
            <li>
                <a data-bs-toggle="collapse" href="#collapse-product" role="button" aria-expanded="false" aria-controls="collapse-product">
                    <i class="ti ti-package"></i>
                    Sản phẩm
                    <i class="ti ti-chevron-down float-end"></i>
                </a>
                <ul class="collapse list-unstyled ps-3" id="collapse-product">
                    <li>
                        <a href="{{ route('admin.products.index') }}">
                            <i class="ti ti-list-details"></i>
                            Danh sách sản phẩm
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.create') }}">
                            <i class="ti ti-plus"></i>
                            Thêm sản phẩm
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-title">
                <span>Quản lý đơn hàng</span>
            </li>
            <li>
                <a href="{{ route('admin.orders.index') }}">
                    <i class="ti ti-shopping-cart"></i>
                    Đơn hàng
                </a>
            </li>
            <li class="menu-title">
                <span>Quản lý Lookbook</span>
            </li>
            <li>
                <a href="{{ route('admin.lookbooks.index') }}">
                    <i class="ti ti-photo"></i>
                    Lookbook
                </a>
            </li>
            <li class="menu-title">
                <span>Quản lý Banner</span>
            </li>
            <li>
                <a href="{{ route('admin.banners.index') }}">
                    <i class="ti ti-photo"></i>
                    Banner
                </a>
            </li>
            <li class="menu-title">
                <span>Quản lý Tin tức</span>
            </li>
            <li>
                <a href="{{ route('admin.posts.index') }}">
                    <i class="ti ti-news"></i>
                    Tin tức
                </a>
            </li>
            <!-- Thêm các menu khác tùy ý -->
        </ul>
    </div>
</nav>