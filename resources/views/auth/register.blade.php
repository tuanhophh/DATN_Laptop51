<!-- <div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
                @csrf
					<span class="login100-form-title p-b-26">
						Chào mừng đến với Laptop 51
					</span>
                <span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>
                <div class="wrap-input100 validate-input">

                    <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <span class="focus-input100" data-placeholder="Tên đăng nhập"></span>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                    <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="Mật khẩu">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <span class="focus-input100" data-placeholder="Mật khẩu"></span>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password">
                    <span class="focus-input100" data-placeholder="Nhập lại mật khẩu"></span>
                </div>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn">
                            Đăng Ký
                        </button>
                    </div>
                </div>

                <div class="text-center p-t-115">
						<span class="txt1">
							Bạn đã có tài khoản?
						</span>

                    <a class="txt2" href="/login">
                        Đăng nhập
                    </a>
                </div>
            </form>

        </div>
    </div>
</div> -->

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

    <!-- <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title p-b-26">
                        Chào mừng đến với Laptop 51
                    </span>
                    <span class="login100-form-title p-b-48">
                        <i class="zmdi zmdi-font"></i>
                    </span>

                    @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                    @endif


                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="focus-input100" data-placeholder="Email"></span>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">
                        <span class="focus-input100" data-placeholder="Mật khẩu"></span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="pb-0 d-flex justify-content-end">
                            <a style="color: #1a73e8;" class="" href="/forget-password">Quên mật khẩu</a>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Đăng Nhập
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-115">
                        <span class="txt1">
                            Bạn không có tài khoản?
                        </span>

                        <a class="txt2" href="/register">
                            Đăng ký
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div> -->
    <div class="container">
        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Đăng ký</div>
                    <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink"
                            href="{{route('login')}}">Đăng nhập</a></div>
                </div>
                @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="panel-body">
                    <form id="signupform" method="POST" action="{{ route('register') }}" class="form-horizontal"
                        role="form">
                        @csrf
                        <div id="signupalert" style="display:none" class="alert alert-danger">
                            <p>Error:</p>
                            <span></span>
                        </div>

                        <div class="form-group">
                            <!-- <label for="firstname" class="col-md-3 control-label">Họ và tên</label> -->
                            <div class="col-md-12">

                                <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
                                @error('name')
                                <span class="invalid-feedback text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                    placeholder="Họ và Tên">
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- <label for="email" class="col-md-3 control-label">Email</label> -->
                            <div class="col-md-12">
                                <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->

                                @error('email')
                                <span class="invalid-feedback text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input type="email" class="form-control" value="{{ old('email') }}"
                                    name="email" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- <label for="password" class="col-md-3 control-label">Mật khẩu</label> -->
                            <div class="col-md-12">
                                <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> -->
                                @error('password')
                                <span class="invalid-feedback text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- <label for="password" class="col-md-3 control-label">Nhập lại mật khấu</label> -->
                            <div class="col-md-12">
                                <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> -->
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Nhập lại mật khẩu">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Invitation Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="icode" placeholder="">
                                    </div>
                                </div> -->

                        <div class="form-group">
                            <!-- Button -->
                            <div class="col-md-12">
                                <button id="btn-login" class="justify-content-end btn btn-success">Đăng ký</button>
                                <!-- <span style="margin-left:8px;">or</span>   -->
                            </div>
                        </div>

                        <!-- <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                                    </div>                                           
                                        
                                </div> -->

                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

</body>

</html>