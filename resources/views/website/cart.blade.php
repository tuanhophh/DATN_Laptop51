<!DOCTYPE html>

<html>


<!-- Mirrored from quanticalabs.com/Autospa/Template/?page=book-your-wash by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Feb 2022 11:22:27 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <title>Auto Spa - Car Wash Auto Detail Template</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layout_client.style')

</head>

<body class="template-page-book-your-wash">

    <!-- Header -->
    @include('layout_client.menu')
    <!-- Content -->
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Giỏ Hàng</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light p-5">
        <div class="container bg-white p-2">
            <div class="container-fluid">
                <div class="row">
                    <aside class="col-lg-12">
                        <div class="card">
                            <div class="table-responsive">
                                <?php
                                use Gloudemans\Shoppingcart\Facades\Cart;
                                
                                $content = Cart::content();
                                // dd($content);
                                ?>
                                <!-- @if ($content == null)
<p class="text-center text-dark">Bạn không có sản phẩm trong giỏ hàng
@endif -->
                                <table class="table table-bordered table-shopping-cart">
                                    <thead class="text-muted p-0">
                                        <tr class="small text-uppercase">
                                            <th scope="col">STT</th>
                                            <th scope="col">Thông tin</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col" style="width: 130px;">Số lượng</th>
                                            <th scope="col">Tổng giá</th>
                                        </tr>
                                    </thead>

                                    @if (count(Cart::content()) != 0)
                                        <tbody>
                                            @foreach ($content as $cont)
                                                <tr>
                                                    <td style="width:30px;">
                                                        <p style="width: 20px;">1</p>
                                                    </td>
                                                    <td style="width: 520px;">
                                                        <div class="row" style="width: 500px;">
                                                            <div class="col-auto px-1">
                                                                <img width="80px"
                                                                    src="https://laptop88.vn/media/product/6792_anb_dell_latitude_3400.png"
                                                                    class="img-sm d-inline">
                                                            </div>
                                                            <div class="col px-0 pr-2">
                                                                <figcaption class="info d-inline"> <a href="#"
                                                                        class="title text-dark"
                                                                        data-abc="true">{{ $cont->name }}</a>
                                                                    <p class="text-muted small">Bảo hành 12 tháng, 1 đổi
                                                                        1 trong
                                                                        vòng 15
                                                                        ngày <br> MIỄN PHÍ GIAO HÀNG TẬN NHÀ <br> - Với
                                                                        đơn hàng
                                                                        < 4.000.000 đồng: Miễn phí giao hàng cho đơn
                                                                            hàng < 5km tính từ cửa hàng Laptop88 gần
                                                                            nhất <br> - Với đơn
                                                                            hàng >
                                                                            4.000.000 đồng: Miễn phí giao hàng (khách
                                                                            hàng chịu
                                                                            phí
                                                                            bảo
                                                                            hiểm hàng hóa nếu có)
                                                                    </p>
                                                                </figcaption>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>

                                                        <div class="price-wrap"> <var
                                                                class="price font-weight-bold h6 small">{{ number_format($cont->price) . ' ' . 'vnđ' }}</var>
                                                            <!-- <br><small class="text-muted">13.990.000 VND </small> </div> -->
                                                    </td>
                                                    <td style="width: 150px;">
                                                        <form action="{{ URL::to('/update-cart-quantity') }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="form-row">
                                                                <div class="col-4">
                                                                    <input class="form-control p-1 m-0" type="text"
                                                                        name="cart_quantity"
                                                                        value="{{ $cont->qty }}">
                                                                </div>
                                                                <div class="col-7">
                                                                    <input type="submit" value="Câp nhật"
                                                                        name="update_qty"
                                                                        class="btn btn-warning form-control m-0">
                                                                </div>
                                                                <input type="hidden" value="{{ $cont->rowId }}"
                                                                    name="rowId_cart">
                                                                <!-- <input class="cart_quantity_input form-control" type="text"
                                                                name="cart_quantity" value="{{ $cont->qty }}">
                                                            
                                                            <input type="submit" value="Câp nhật" name="update_qty"
                                                                class="btn btn-warning form-control"> -->
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <div class="price-wrap"> <var
                                                                class="price font-weight-bold h6 small">
                                                                <?php
                                                                $subtotal = $cont->price * $cont->qty;
                                                                echo number_format($subtotal) . ' ' . 'vnđ';
                                                                ?>
                                                            </var>
                                                            <!-- <br><small class="text-muted">13.990.000 VND </small> </div> -->
                                                    </td>
                                                    <td style="width: 50px;" class="text-center"> <a
                                                            class="text-danger"
                                                            href="{{ URL::to('/delete-to-cart/' . $cont->rowId) }}"><i
                                                                class="bi bi-trash"></i></a> </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @else
                                        <p class="text-center">Bạn không có đồ trong giỏ hàng. Vui lòng chọn đồ!</p>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="row">
                    <aside class="col-lg-9"></aside>
                    <aside class="col-lg-3">
                        <!-- <div class="card mb-3">
                            <div class="card-body">
                                <form>
                                    <div class="form-group"> <label>Mã giảm giá?</label>
                                        <div class="input-group"> <input type="text" class="form-control coupon" name=""
                                                placeholder="Mã giảm giá"> <span class="input-group-append"> <button
                                                    class="btn btn-primary btn-apply coupon">Áp dụng</button> </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> -->
                        <div class="card mt-3">
                            <div class="card-body">
                                <dl class="dlist-align">
                                    <dt class="text-danger">Tổng tiền: {{ $totalBill }} VNĐ</dt>
                                    <dd class="text-right ml-3"></dd>
                                </dl>
                                <!-- <dl class="dlist-align">
                                    <dt>Giảm giá:</dt>
                                    <dd class="text-right text-danger ml-3"></dd>
                                </dl>
                                <dl class="dlist-align">
                                    <dt>Tổng tiền:</dt>
                                    <dd class="text-right text-dark b ml-3">
                                        <strong>{{ $totalBill }}</strong>
                                    </dd>
                                </dl> -->
                                <hr>
                                <a href="/cua-hang" class="btn btn-out bg-info btn- btn-square btn-main text-white"
                                    data-abc="true"> Trở lại </a>
                                @if (count(Cart::content()) != 0)
                                    <a href="{{ URL::to('/thanh-toan') }}"
                                        class="btn btn-out btn-warning btn-square btn-main" data-abc="true"> Thanh
                                        toán</a>
                                @endif
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#template-booking').booking();
        });
    </script>

    <!-- JS files -->
    @include('layout_client.footer')
    @include('layout_client.script')
</body>


<!-- Mirrored from quanticalabs.com/Autospa/Template/?page=book-your-wash by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Feb 2022 11:22:27 GMT -->

</html>
