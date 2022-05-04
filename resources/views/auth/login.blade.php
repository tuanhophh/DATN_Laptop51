<!DOCTYPE html>

<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <title>Bệnh Viện Laptop 51</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layout_client.style')


</head>

<body>

    @include('layout_client.menu')
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Đăng nhập</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="/">Trang chủ</a></li>
                                <li>Đăng nhập</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login-section mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 pb-5">
                    <div class="registered-customers">
                        <h6 class="widget-title border-left mb-50">Đăng nhập</h6>
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                        @endif
                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="login-account p-30 box-shadow">
                                <p>Bạn chưa có tài khoản? <a href="/register"> Nhấp vào đây để đăng ký!</a></p>
                                <input type="text" class="@error('phone') is-invalid @enderror mb-0 mt-4"
                                    value="{{ old('phone') }}" name="phone" placeholder="Số điện thoại">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input type="password" name="password" class="mb-0 mt-4" placeholder="Mật khẩu">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <p class="text-end"><small><a href="/forget-password">Bạn quên mật khẩu?</a></small></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="submit-btn-1 btn-hover-1" type="submit">Đăng nhập</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="/login-otp" class="btn-hover-1 f-right" type="reset">Đăng nhâp bằng
                                            OTP</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- new-customers -->
                <!-- <div class="col-lg-6  pb-5">
                    <div class="new-customers">
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                        @endif
                        <form method="POST" action="{{route('register')}}">
                            @csrf
                            <h6 class="widget-title border-left mb-50">Đăng ký</h6>
                            <div class="login-account p-30 box-shadow">
                                <input type="text" class="@error('name') is-invalid @enderror mb-0 mt-4"
                                    value="{{ old('name') }}" name="name" placeholder="Họ và tên">
                                @error('name')
                                <span class="invalid-feedback pb-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input type="text" class="@error('phone') is-invalid @enderror mb-0 mt-4"
                                    value="{{ old('phone') }}" name="phone" placeholder="Số điện thoại">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input type="password" placeholder="Mật khẩu" class="mb-0 mt-4">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input type="password" placeholder="Nhập lại mật khẩu" class="mb-0 mt-4"> -->

                                <!-- <div class="checkbox">
                                    <label class="mr-10">
                                        <small>
                                            <input type="checkbox" name="signup">Sign up for our newsletter!
                                        </small>
                                    </label>
                                    <label>
                                        <small>
                                            <input type="checkbox" name="signup">Receive special offers from our
                                            partners!
                                        </small>
                                    </label>
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <button class="submit-btn-1 mt-20 btn-hover-1" type="submit"
                                            value="register">Đăng ký</button>
                                    </div> -->
                                    <!-- <div class="col-md-6">
                                        <button class="submit-btn-1 mt-20 btn-hover-1 f-right"
                                            type="reset">Clear</button>
                                    </div> -->
                                <!-- </div>
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout_client.footer')
    @include('layout_client.script')

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
</script>

</html>