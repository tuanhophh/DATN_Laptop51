<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bệnh Viện Laptop 51</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->

    @include('layout_client.style')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style></style>
</head>

<body>  
    <!-- <section class="vh-100 pt-5" style="background-color: #fead51;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('products/icon.png') }}" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form>

                                        <div class="d-flex align-items-center mb-3 pb-1"> -->
                                            <!-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> -->
                                            <!-- <img width="100px" src="{{ asset('client/media/image/logo1.png') }}" alt="">
                                            <span class="h1 fw-bold mb-0"></span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng nhập</h5>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="form2Example17"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example17">Số điện thoại</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example27"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Mật khẩu</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="button">Đăng
                                                nhập</button>
                                        </div>
                                        <a class="small text-muted" href="#!">Quên mật khẩu</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Bạn chưa có tài khoản? <a
                                                href="#!" style="color: #393f81;">Đăng ký ngay</a></p> -->
                                        <!-- <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a> -->
                                    <!-- </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Section: Design Block -->
    <div class="container mt-5 pt-5">
        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Đăng ký</div>
                    <div class="text-dark" style="float:right; font-size: 85%; position: relative; top:-20px"><a
                            id="signinlink" href="/login">Đăng nhập</a></div>
                </div>
                @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="panel-body">
                    <form id="signupform" method="POST" action="{{route('register')}}" class="form-horizontal"
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

                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" name="name" placeholder="Họ và Tên">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- <label for="email" class="col-md-3 control-label">Email</label> -->
                            <div class="col-md-12">
                                <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->


                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}" name="phone" placeholder="Số điện thoại">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- <label for="password" class="col-md-3 control-label">Mật khẩu</label> -->
                            <div class="col-md-12">
                                <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> -->

                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Mật khẩu">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- <label for="password" class="col-md-3 control-label">Nhập lại mật khấu</label> -->
                            <div class="col-md-12">
                                <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> -->
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" placeholder="Nhập lại mật khẩu">
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
                                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                                    </div>

                                </div> -->

                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layout_client.script')
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
</body>

</html>