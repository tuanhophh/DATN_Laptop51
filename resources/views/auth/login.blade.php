<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bệnh Viện Laptop 51</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body>

    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Đăng nhập</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a
                            href="/forget-password">Quên mật khẩu</a></div>
                </div>

                <div style="padding-top:30px" class="panel-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                    <!-- @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif -->
                    @error('error')
                    <span class="invalid-feedback text-danger small" role="alert">
                        <strong>{{ $error }}</strong>
                    </span>
                    @enderror
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="loginform" method="POST" action="{{ route('login') }}" class="form-horizontal"
                        role="form">
                        @csrf
                        @error('phone')
                        <span class="invalid-feedback text-danger small" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="phone"
                                value="{{ old('phone') }}" placeholder="Số điện thoại">
                        </div>
                        @error('password')
                        <span class="invalid-feedback text-danger small" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password"
                                placeholder="Mật khẩu">
                        </div>

                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Ghi nhớ đăng
                                    nhập
                                </label>
                            </div>
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button id="btn-login" class="btn btn-success">Đăng nhập</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                    Bạn chưa có tài khoản?
                                    <a href="{{route('register')}}">
                                        Đăng ký ngay
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>