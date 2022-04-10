@extends('layout')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h5>Xác thực email</h5>
                            </div>
                            <div class="col-4">
                            <button class="btn btn-info"><a class="text-end text-white p-0 m-0" style="text-decoration: none" href="{{ route('home') }}">Trang chủ</a>
                                </button>
                                <button class="btn btn-danger"><a class="text-end text-white p-0 m-0" style="text-decoration: none" href="{{ route('logout') }}">Đăng xuất</a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn') }}
                        </div>
                        @endif
                        <div class="form-group row">
                            {{ __('Vui lòng xác minh email của bạn để xem thông tin này, kiểm tra email của bạn để biết liên kết xác minh') }}
                            {{ __('Nếu bạn không nhận được email') }},
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit"
                                    class="btn btn-success">{{ __('Nhấn vào đây để gửi lại link') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection