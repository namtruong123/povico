<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Đăng nhập Admin</title>
    <link href="{{ asset('assets/backend/vendor/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/vendor/tabler-icons/tabler-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/vendor/phosphor/phosphor-bold.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/responsive.css') }}" rel="stylesheet">
</head>
<body class="sign-in-bg">
<div class="app-wrapper d-block">
    <div class="">
        <div class="container main-container">
            <div class="row main-content-box">
                <div class="col-lg-7 image-content-box d-none d-lg-block">
                    <div class="form-container">
                        <div class="signup-content mt-4">
                            <span>
                              <img alt="" class="img-fluid " src="{{ asset('assets/images/logo/1.png') }}">
                            </span>
                        </div>
                        <div class="Tsignup-bg-img">
                            <img alt="" class="img-fluid" src="{{ asset('assets/images/login/01.png') }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 form-content-box">
                    <div class="form-container ">
                        <form class="app-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5 text-center text-lg-start">
                                        <h2 class="text-white f-w-600">Welcome To <span class="text-dark">Admin!</span></h2>
                                        <p class="f-s-16 mt-2">Đăng nhập để vào trang quản trị</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="UserName" name="email" placeholder="Email" type="email" required>
                                        <label for="UserName">Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="floatingInput" name="password" placeholder="Mật khẩu" type="password" required>
                                        <label for="floatingInput">Mật khẩu</label>
                                    </div>
                                    <div class="text-end ">
                                        <a class="text-dark f-w-500 text-decoration-underline" href="#">Quên mật khẩu?</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check d-flex align-items-center gap-2 mb-3">
                                        <input class="form-check-input w-25 h-25" id="checkDefault" type="checkbox" name="remember">
                                        <label class="form-check-label text-white mt-2 f-s-16 text-dark" for="checkDefault">
                                            Ghi nhớ đăng nhập
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary btn-lg w-100" type="submit">Đăng nhập</button>
                                </div>
                                <div class="col-12 mt-4">
                                    @if($errors->any())
                                        <div class="alert alert-danger text-center">{{ $errors->first() }}</div>
                                    @endif
                                </div>
                                <div class="app-divider-v light justify-content-center py-lg-5 py-3">
                                    <p>OR</p>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex gap-3 justify-content-center text-center">
                                        <button class="btn btn-light-white  icon-btn w-45 h-45 b-r-15 " type="button">
                                            <i class="ph-bold ph-facebook-logo f-s-20"></i>
                                        </button>
                                        <button class="btn btn-light-white  icon-btn w-45 h-45 b-r-15 " type="button">
                                            <i class="ph-bold  ph-google-logo f-s-20"></i>
                                        </button>
                                        <button class="btn btn-light-white  icon-btn w-45 h-45 b-r-15 " type="button">
                                            <i class="ph-bold  ph-twitter-logo f-s-20"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/backend/js/jquery-3.6.3.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>