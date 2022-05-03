<!DOCTYPE html>

<html>


<!-- Mirrored from quanticalabs.com/Autospa/Template/?page=home by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Feb 2022 11:18:10 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <title>Bệnh Viện Laptop 51</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    @include('layout_client.style')
    @include('layout_client.style_payment')
</head>

<body class="template-page-home">
    @include('layout_client.menu')
    <!-- Content -->
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Thanh Toán</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-light mt-4">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <form action="{{ URL::to('/save-payment') }}" method="POST">
            @csrf
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
                <div class="col-md-7 mt-3">

                    <div class="col-12 border border-warning rounded p-0">
                        <div class="pl-2">
                            <p class="m-0 p-0 fw-bolder">1. Thông tin khách hàng</p>
                        </div>
                        <hr class="pt-0 mt-0">
                        @error('name')
                            <small class="font-italic text-danger p-0 m-0">{{ $message }}</small>
                        @enderror
                        <div class="form-outline mb-2 mx-2">
                            <input type="text" name="name" value="{{ old('name') }}" id="form6Example1"
                                class="form-control" />
                            <label class="form-label" for="form6Example1">Họ và tên</label>
                        </div>
                        @error('email')
                            <small class="font-italic text-danger p-0 m-0">{{ $message }}</small>
                        @enderror
                        <!-- Email input -->
                        <div class="form-outline mb-2 mx-2">
                            <input type="email" name="email" value="{{ old('email') }}" id="form6Example5"
                                class="form-control" />
                            <label class="form-label" for="form6Example5">Email</label>
                        </div>
                        @error('phone')
                            <small class="font-italic text-danger p-0 m-0">{{ $message }}</small>
                        @enderror
                        <!-- Number input -->
                        <div class="form-outline mb-2 mx-2">
                            <input type="number" name="phone" value="{{ old('phone') }}" id="form6Example6"
                                class="form-control" />
                            <label class="form-label" for="form6Example6">Số điện thoại</label>
                        </div>
                        @error('address')
                            <small class="font-italic text-danger p-0 m-0">{{ $message }}</small>
                        @enderror
                        <!-- Text input -->
                        <div class="form-outline mb-2 mx-2">
                            <input type="text" name="address" value="{{ old('address') }}" id="form6Example4"
                                class="form-control" />
                            <label class="form-label" for="form6Example4">Địa chỉ nhà</label>
                        </div>
                        <!-- Message input -->
                        <div class="form-outline mb-3 mx-2">
                            <textarea class="form-control" name="note" id="form6Example7" rows="4"></textarea>
                            <label class="form-label" for="form6Example7">Ghi chú</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 pl-2 mb-3 pt-3">
                    <div class="col-12 ms-auto border border-warning rounded p-0">
                        <div class="form-outline">
                            <div class="mx-2">
                                <p class="m-0 p-0 fw-bolder">2. Phương thức thanh toán</p>
                            </div>
                            <hr class="pt-0 mt-0">
                            <div class="form-check mx-2">
                                <input class="form-check-input" value="1" type="radio" name="payment_method"
                                    id="flexRadioDefault1" />
                                <label class="form-check-label" for="flexRadioDefault1"> Thanh toán khi nhận hàng
                                </label>
                            </div>
                            <!-- Default checked radio -->
                            <div class="form-check pb-2 mx-2">
                                <input class="form-check-input" value="2" type="radio" name="payment_method"
                                    id="flexRadioDefault2" />
                                <label class="form-check-label" for="flexRadioDefault2"> Thanh toán trực tuyến </label>
                            </div>
                            @error('payment_method')
                                <small class="font-italic text-danger p-0 m-0">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 ms-auto border border-warning rounded mt-3 p-0">
                        <div class="form-outline mb-2 p-0">
                            <div class="pl-2">
                                <p class="m-0 p-0 fw-bolder ms-auto">3. Tổng tiền</p>
                            </div>
                            <hr class="pt-0 mt-0">
                            <div class="p-0 m-0">
                                <?php
                                use Gloudemans\Shoppingcart\Facades\Cart;
                                
                                $total = str_replace(',', '.', Cart::subtotal());
                                // dd($content);
                                ?>
                                <!-- <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" checked /> -->
                                <label class="form-check-label mx-2">
                                    <p class="p-0 m-0 fw-bold text-danger">Thanh toán: {{ Cart::subtotal() }} VNĐ</p>
                                </label>
                                <p class="m-0 p-0 mx-2">
                                    <small class="fw-lighter">
                                        Bảo hành 12 tháng, 1 đổi 1 trong
                                        vòng 15
                                        ngày <br> MIỄN PHÍ GIAO HÀNG TẬN NHÀ <br> - Với đơn hàng
                                        < 4.000.000 đồng: Miễn phí giao hàng cho đơn hàng < 5km tính từ cửa hàng
                                            Laptop88 gần nhất <br> - Với đơn
                                            hàng >
                                            4.000.000 đồng: Miễn phí giao hàng (khách hàng chịu
                                            phí
                                            bảo
                                            hiểm hàng hóa nếu có)
                                    </small>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Checkbox -->
                <!-- <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" checked />
                <label class="form-check-label" for="form6Example8"> Create an account? </label>
            </div> -->

                <!-- Submit button -->
                <button type="submit" class="btn btn-warning btn-block mb-4 mt-4">Đặt hàng</button>
            </div>
        </form>
    </div>
    <!-- Footer -->
    @include('layout_client.footer')
    <!-- JS files -->
    @include('layout_client.script')
    @include('layout_client.script_payment')

</body>


<!-- Mirrored from quanticalabs.com/Autospa/Template/?page=home by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Feb 2022 11:19:52 GMT -->

</html>
