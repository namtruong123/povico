{{-- filepath: resources/views/admin/partials/header.blade.php --}}
<header class="header-main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 col-sm-6 d-flex align-items-center header-left p-0">
                <span class="header-toggle ">
                    <i class="ph ph-squares-four"></i>
                </span>
                <div class="header-searchbar w-100">
                    <form action="#" class="mx-sm-3 app-form app-icon-form ">
                        <div class="position-relative">
                            <input aria-label="Search" class="form-control" placeholder="Search..." type="search">
                            <i class="ti ti-search text-dark"></i>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-4 col-sm-6 d-flex align-items-center justify-content-end header-right p-0">
                <ul class="d-flex align-items-center">
                    <li class="header-language">
                        <div class="flex-shrink-0 dropdown" id="lang_selector">
                            <a aria-expanded="false" class="d-block head-icon ps-0" data-bs-toggle="dropdown" href="#">
                                <div class="lang-flag lang-en ">
                                    <span class="flag rounded-circle overflow-hidden">
                                        <i class=""></i>
                                    </span>
                                </div>
                            </a>
                            <ul class="dropdown-menu language-dropdown header-card border-0">
                                <li class="lang lang-en selected dropdown-item p-2" title="US">
                                    <span class="d-flex align-items-center">
                                        <i class="flag-icon flag-icon-usa flag-icon-squared rounded-circle f-s-20"></i>
                                        <span class="ps-2">US</span>
                                    </span>
                                </li>
                                <li class="lang lang-fra dropdown-item p-2" title="FR">
                                    <span class="d-flex align-items-center">
                                        <i class="flag-icon flag-icon-fra flag-icon-squared rounded-circle f-s-20"></i>
                                        <span class="ps-2">France</span>
                                    </span>
                                </li>
                                <li class="lang lang-gbr dropdown-item p-2" title="UK">
                                    <span class="d-flex align-items-center">
                                        <i class="flag-icon flag-icon-gbr flag-icon-squared rounded-circle f-s-20"></i>
                                        <span class="ps-2">UK</span>
                                    </span>
                                </li>
                                <li class="lang lang-ita dropdown-item p-2" title="IT">
                                    <span class="d-flex align-items-center">
                                        <i class="flag-icon flag-icon-ita flag-icon-squared rounded-circle f-s-20"></i>
                                        <span class="ps-2">Italy</span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="header-apps">
                        <a class="d-block head-icon bg-light-dark rounded-circle f-s-22 p-2" href="#">
                            <i class="ph ph-bounding-box"></i>
                        </a>
                    </li>
                    <li class="header-cart">
                        <a class="d-block head-icon position-relative bg-light-dark rounded-circle f-s-22 p-2" href="#">
                            <i class="ph ph-shopping-cart-simple"></i>
                            <span class="position-absolute translate-middle badge rounded-pill bg-danger badge-notification">4</span>
                        </a>
                    </li>
                    <li class="header-dark">
                        <div class="sun-logo head-icon bg-light-dark rounded-circle f-s-22 p-2">
                            <i class="ph ph-moon-stars"></i>
                        </div>
                        <div class="moon-logo head-icon bg-light-dark rounded-circle f-s-22 p-2">
                            <i class="ph ph-sun-dim"></i>
                        </div>
                    </li>
                    <li class="header-notification">
                        <a class="d-block head-icon position-relative bg-light-dark rounded-circle f-s-22 p-2" href="#">
                            <i class="ph ph-bell"></i>
                            <span class="position-absolute translate-middle p-1 bg-primary border border-light rounded-circle animate__animated animate__fadeIn animate__infinite animate__slower"></span>
                        </a>
                    </li>
                    <li class="dropdown profile-menu-dropdown">
                        <a aria-expanded="false" data-bs-toggle="dropdown" href="#" role="button">
                            <span class="h-45 w-45 d-flex-center b-r-10 position-relative bg-danger m-auto">
                               @php
                                    $user = Auth::user();
                                    $avatarFilename = basename($user->avatar ?? '');
                                    $avatarPath = $avatarFilename
                                        ? asset('assets/backend/images/avatar/' . $avatarFilename)
                                        : asset('assets/backend/images/avatar/default.png');
                                @endphp

                                <img alt="avatar" class="img-fluid b-r-10" src="{{ $avatarPath }}">
                                <span class="position-absolute top-0 end-0 p-1 bg-success border border-light rounded-circle"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a class="f-w-500" href="#">
                                    <i class="ph-duotone ph-user-circle pe-1 f-s-20"></i> Profile Details
                                </a>
                            </li>
                            <li class="dropdown-item">
                                <a class="f-w-500" href="#">
                                    <i class="ph-duotone ph-gear pe-1 f-s-20"></i> Settings
                                </a>
                            </li>
                            <li class="dropdown-item">
                                <a class="mb-0 text-danger" href="{{ route('logout') }}">
                                    <i class="ph-duotone ph-sign-out pe-1 f-s-20"></i> Log Out
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>