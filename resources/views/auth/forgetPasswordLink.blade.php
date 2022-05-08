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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Quên mật khẩu</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="/">Trang chủ</a></li>
                                <li>Quên mật khẩu</li>
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
                <div class="col-6 pb-5">
                    <h6 class="widget-title border-left mb-50">Quên mật khẩu</h6>
                    <div class="registered-customers">
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                        @endif
                        <form method="POST" action="{{route('insert.password.post')}}">
                            @csrf
                            <div class="login-account p-30 box-shadow">
                                <input type="password" name="password" placeholder="Mật khẩu" class="mb-0 mt-4">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" class="mb-0 mt-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="submit-btn-1 mt-20 btn-hover-1" type="submit"
                                            value="Đổi mật khẩu">Đổi mật khẩu</button>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <button class="submit-btn-1 mt-20 btn-hover-1 f-right"
                                            type="reset">Clear</button>
                                    </div> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout_client.footer')
    @include('layout_client.script')
</body>
</html>

