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
    <style>
    .quantity {
        position: relative;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    input[type='radio']:checked {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        background-color: #ff7f00;
        display: inline-block;
        border: 2px solid white;
    }

    .quantity input {
        height: 42px;
        line-height: 1.65;
        float: left;
        display: block;
        padding: 0;
        margin: 0;
        padding-left: 20px;
        border: 1px solid #eee;
    }

    .quantity input:focus {
        outline: 0;
    }

    .quantity-nav {
        float: right;
        position: relative;
        height: 42px;
    }

    .quantity-button {
        position: relative;
        cursor: pointer;
        border-left: 1px solid #eee;
        width: 20px;
        text-align: center;
        color: #333;
        font-size: 13px;
        font-family: "Trebuchet MS", Helvetica, sans-serif !important;
        line-height: 1.7;
        -webkit-transform: translateX(-100%);
        transform: translateX(-100%);
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
    }

    .quantity-button.quantity-up {
        position: absolute;
        height: 50%;
        top: 0;
        border-bottom: 1px solid #eee;
    }

    .quantity-button.quantity-down {
        position: absolute;
        bottom: -1px;
        height: 50%;
    }
    .linedown {
        overflow: hidden;
        word-wrap: break-word;      /* IE 5.5-7 */
        white-space: -moz-pre-wrap; /* Firefox 1.0-2.0 */
        white-space: pre-wrap;      /* current browsers */
}
    </style>
</head>

<body>
    <div class="wrapper">
        @include('layout_client.menu')
        <!-- Content -->
        <div class="breadcrumbs-section plr-200 mb-80 section">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">Chi tiết sản phẩm</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="/">Trang chủ</a></li>
                                    <li>Chi tiết sản phẩm</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="page-content" class="page-wrapper section">
        <?php
                if (!function_exists('currency_format')) {
                        function currency_format($bill_d, $suffix = ' VNĐ')
                        {
                            if (!empty($bill_d)) {
                            return number_format($bill_d, 0, ',', '.') . "{$suffix}";
                            }
                        }
                    }
        ?>
            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2">
                            <ul class="nav cart-tab">
                                <li>
                                    <a class="active">
                                        <span>01</span>
                                        Giỏ hàng
                                    </a>
                                </li>
                                <li>
                                    <a class="active">
                                        <span>02</span>
                                        Thanh toán
                                    </a>
                                </li>
                                <li>
                                    <a class="active">
                                        <span>03</span>
                                        Hoàn thành
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-10">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- shopping-cart start -->
                                <!-- order-complete start -->
                                <div class="tab-pane active" id="shopping-cart">
                                    <div class="shopping-cart-content box-shadow">
                                        <div class="thank-you p-30 text-center">
                                            <h6 class="text-black-5 mb-0">Cảm ơn bạn. Chúng tôi đã nhận được đơn hàng
                                                của bạn!</h6>
                                        </div>


                                        <div class="order-info p-30 mb-10">
                                            <div class="row">
                                                <!-- our order -->
                                                <div class="col-md-12">
                                                    <div class="payment-details p-30">
                                                        <h6 class="widget-title border-left mb-20">Hóa đơn</h6>
                                                        <table>
                                                            <tr>
                                                                <td class="td-title-1">Mã hóa đơn</td>
                                                                <td class="td-title-2">{{$bill->code}}</td>
                                                            </tr>
                                                            @foreach($bill_detail as $bill_d)

                                                            <?php
                                                        if (!function_exists('currency_format')) {
                                                            function currency_format($bill_d, $suffix = ' VNĐ')
                                                            {
                                                                if (!empty($bill_d)) {
                                                                    return number_format($bill_d, 0, ',', '.') . "{$suffix}";
                                                                }
                                                            }
                                                        }
                                                        $total = $bill_d->qty * $bill_d->price;
                                                        ?>

                                                            <tr>
                                                                 <td class="td-title-1">{{$bill_d->product->name}} x
                                                                    {{$bill_d->qty}}</td>
                                                                <td class="td-title-2">{{currency_format($total)}}</td>

                                                            <tr>
                                                                @endforeach
                                                                <td class="order-total">Tổng tiền</td>
                                                                <td class="order-total-price">
                                                                 {{$bill->total}} VNĐ</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="bill-details p-30">
                                                        <h6 class="widget-title border-left mb-20">Thông tin người nhận
                                                        </h6>
                                                        <table>
                                                            <tr>
                                                                <td class="td-title-1">Số điện thoại </td>
                                                                <td class="td-title-2"><p class="linedown">{{$bill_user->phone}}</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Email</td>
                                                                <td class="td-title-2"><p class="linedown">{{$bill_user->email}}</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1"> Địa chỉ</td>
                                                                <td class="td-title-2" style="width: 200px;"><p class="linedown">{{$bill_user->address}}</p></td>
                                                            </tr>
                                                        </table>
                                                        <!-- <ul class="bill-address">
                                                            <li>
                                                                <span class="linedown" style="width: 100px;">Số điện thoại </span>
                                                                <p class="linedown">{{$bill_user->phone}}</p>
                                                            </li>
                                                            <li>
                                                                <span class="linedown" style="width: 100px;">Email</span>
                                                           <p class="linedown">      {{$bill_user->email}}</p>
                                                            </li>
                                                            <li>
                                                                <span class="linedown" style="width: 100px;">Địa chỉ</span>
                                                               <p class="linedown"> {{$bill_user->address}}3211111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111 </p>
                                                            </li>
                                                        </ul> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- order-complete end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->

        </section>
        <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#template-booking').booking();
        });
        </script>

        <!-- JS files -->
        @include('layout_client.footer')
        @include('layout_client.script')
        <script>
        jQuery(
                '<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>'
            )
            .insertAfter('.quantity input');
        jQuery('.quantity').each(function() {
            var spinner = jQuery(this),
                input = spinner.find('input[type="number"]'),
                btnUp = spinner.find('.quantity-up'),
                btnDown = spinner.find('.quantity-down'),
                min = input.attr('min'),
                max = input.attr('max');

            btnUp.click(function() {
                var oldValue = parseFloat(input.val());
                if (oldValue >= max) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue + 1;
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });

            btnDown.click(function() {
                var oldValue = parseFloat(input.val());
                if (oldValue <= min) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue - 1;
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });

        });
        </script>
        <!-- <div class="container bg-light mt-4">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <form action="{{ URL::to('/save-payment') }}" method="POST">
            @csrf
         
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
                     
                        <div class="form-outline mb-2 mx-2">
                            <input type="email" name="email" value="{{ old('email') }}" id="form6Example5"
                                class="form-control" />
                            <label class="form-label" for="form6Example5">Email</label>
                        </div>
                        @error('phone')
                            <small class="font-italic text-danger p-0 m-0">{{ $message }}</small>
                        @enderror
                   
                        <div class="form-outline mb-2 mx-2">
                            <input type="number" name="phone" value="{{ old('phone') }}" id="form6Example6"
                                class="form-control" />
                            <label class="form-label" for="form6Example6">Số điện thoại</label>
                        </div>
                        @error('address')
                            <small class="font-italic text-danger p-0 m-0">{{ $message }}</small>
                        @enderror
                    
                        <div class="form-outline mb-2 mx-2">
                            <input type="text" name="address" value="{{ old('address') }}" id="form6Example4"
                                class="form-control" />
                            <label class="form-label" for="form6Example4">Địa chỉ nhà</label>
                        </div>
                    
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


                <button type="submit" class="btn btn-warning btn-block mb-4 mt-4">Đặt hàng</button>
            </div>
        </form>
    </div> -->
        <!-- Footer -->
        @include('layout_client.footer')
        <!-- JS files -->
        @include('layout_client.script')
        @include('layout_client.script_payment')

</body>


<!-- Mirrored from quanticalabs.com/Autospa/Template/?page=home by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Feb 2022 11:19:52 GMT -->

</html>