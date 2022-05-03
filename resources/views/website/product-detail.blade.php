<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bệnh Viện Laptop 51</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome 5 CSS -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
    <!-- Products List CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Demo CSS (No need to include it into your project) -->
    <link rel="stylesheet" href="css/demo.css">
    <script src='jquery-1.8.3.min.js'></script>
    <script src='jquery.elevatezoom.js'></script>
    @include('layout_client.style')
</head>

<body>
    @include('layout_client.menu')
    <div class="container-fluid bg-light pt-3">
        <div class="container bg-white">
            <p class=""><a class="text-dark" href="/cua-hang">CỬA HÀNG</a> \
                <a class="text-dark"
                    href="/cua-hang/{{ $pro->companyComputer_id }}">{{ $pro->companyComputer->company_name }}</a> \
                <a class="text-dark" href="{{ $pro->id }}">{{ $pro->name }}</a>
            </p>
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Thông báo: </strong>{{ Session::get('success') }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="container bg-white mb-4 pb-3">
            <p class="h5 font-weight-bold">{{ $pro->name }}</p>
            <div class="row">
                <div class="col-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
                            data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                @foreach ($images as $image)
                                    <div class="carousel-item active">
                                        <img id="images" src="{{ asset($image->path) }}"
                                            alt="{{ asset($image->path) }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (!function_exists('currency_format')) {
                    function currency_format($pro, $suffix = ' VNĐ')
                    {
                        if (!empty($pro)) {
                            return number_format($pro, 0, ',', '.') . "{$suffix}";
                        }
                    }
                }
                ?>
                <div class="col-6">
                    <h5 class="font-weight-bold text-danger">{{ currency_format($pro->price) }}</h5>
                    <p class="small">{{ $pro->desc_short }}
                    </p>
                    @foreach ($detailPro as $detail)
                        <div class="row" style="height: auto;">
                            @if ($detail->category_id == 1)
                                <div class="col-3 pr-0">
                                    <p class="pr-0  py-0 font-weight-bold">
                                        CPU:
                                    </p>
                                </div>
                                <div class="col-9">
                                    <ul class="nav">
                                        <li class="nav-item border border-warning my-0 mr-2 mb-2 px-2">
                                            <a class="nav-link active p-0 text-dark" href="#">
                                                {{ $detail->value }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="row" style="height: auto;">
                            @if ($detail->category_id == 2)
                                <div class="col-3 pr-0">
                                    <p class="pr-0  py-0 font-weight-bold">
                                        RAM:
                                    </p>
                                </div>
                                <div class="col-9">
                                    <ul class="nav">
                                        <li class="nav-item border border-warning my-0 mr-2 mb-2 px-2">
                                            <a class="nav-link active p-0 text-dark" href="#">
                                                {{ $detail->value }}
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="row" style="height: auto;">
                            @if ($detail->category_id == 3)
                                <div class="col-3 pr-0">
                                    <p class="pr-0  py-0 font-weight-bold">
                                        Ổ cứng:
                                    </p>
                                </div>
                                <div class="col-9">
                                    <ul class="nav">

                                        <li class="nav-item border border-warning my-0 mr-2 mb-2 px-2">
                                            <a class="nav-link active p-0 text-dark" href="#">
                                                {{ $detail->value }}
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="row" style="height: auto;">
                            @if ($detail->category_id == 4)
                                <div class="col-3 pr-0">
                                    <p class="pr-0  py-0 font-weight-bold">
                                        Màn hình:
                                    </p>
                                </div>
                                <div class="col-9">
                                    <ul class="nav">

                                        <li class="nav-item border border-warning my-0 mr-2 mb-2 px-2">
                                            <a class="nav-link active p-0 text-dark" href="#">
                                                {{ $detail->value }}
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="row" style="height: auto;">
                            @if ($detail->category_id == 5)
                                <div class="col-3 pr-0">
                                    <p class="pr-0  py-0 font-weight-bold">
                                        Card đồ họa:
                                    </p>
                                </div>
                                <div class="col-9">
                                    <ul class="nav">

                                        <li class="nav-item border border-warning my-0 mr-2 mb-2 px-2">
                                            <a class="nav-link active p-0 text-dark" href="#">
                                                {{ $detail->value }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    @endforeach

                    <p class="m-0 p-0">✅Bảo hành 12 tháng, 1 đổi 1 trong vòng 15 ngày
                    </p>
                    <p class="m-0 p-0">✅MIỄN PHÍ GIAO HÀNG TẬN NHÀ</p>
                    <p class="m-0 p-0 small">
                        - Với đơn hàng < 4.000.000 đồng: Miễn phí giao hàng cho đơn hàng < 5km tính từ cửa hàng Laptop88
                            gần nhất </p>
                            <p class="m-0 p-0 small">
                                - Với đơn hàng > 4.000.000 đồng: Miễn phí giao hàng (khách hàng chịu phí bảo hiểm hàng
                                hóa nếu có)
                            </p>
                            <div class="row">
                                <div class="col-9 text-right">
                                    <form class="align-self-center" action="{{ URL::to('/add-cart') }}" method="POST">
                                        @csrf
                                        <input name="qly" type="number" hidden min="1" value="1">
                                        <input name="id" hidden value="{{ $pro->id }}">
                                        <button class="btn btn-warning" type="submit">
                                            Thêm giỏ hàng
                                        </button>
                                    </form>
                                </div>
                                <div class="col">
                                    <form class="" action="{{ URL::to('/save-cart') }}" method="POST">
                                        @csrf
                                        <input name="qly" type="number" hidden min="1" value="1">
                                        <input name="id" hidden value="{{ $pro->id }}">
                                        <button class="btn btn-warning" type="submit">
                                            Mua Ngay
                                        </button>
                                    </form>
                                </div>
                            </div>
                </div>
            </div>
        </div>
        <div class="container p-0">
            <div class="row bg-light">
                <div class="col-8">
                    <div class="bg-white">
                        <p class='border-bottom pl-3 pb-2 pt-3 border-warning h5'>
                            Chi tiết sản phẩm
                        </p>
                        <div class="px-3">
                            {!! $pro->desc !!}
                        </div>

                    </div>
                </div>
                <div class="col-4 pl-1">
                    <div class="bg-white ">
                        <p class='border-bottom pl-3 pb-2 pt-3 border-warning h5'>
                            Sản phẩm cùng hãng
                        </p>
                        @foreach ($products as $product)
                            <?php
                            
                            if (!function_exists('currency_format')) {
                                function currency_format($product, $suffix = ' VNĐ')
                                {
                                    if (!empty($product)) {
                                        return number_format($product, 0, ',', '.') . "{$suffix}";
                                    }
                                }
                            }
                            ?>
                            <ul class="list-group">
                                <li class="list-group-item border-left-0 border-right-0 border-top-0 d-inline">
                                    <div class="row">

                                        <div class="col-4 p-0">
                                            @foreach ($images as $image)
                                                @if ($image->product_id == $product->id)
                                                    <a href="/san-pham/{{ $product->slug }}">
                                                        <img class="center-block" style="width: 150px;"
                                                            src="{{ asset($image->path) }}" alt="">
                                                    </a>
                                                @break

                                                ;
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-8">
                                        <a href="/san-pham/{{ $product->slug }}" style="text-decoration: none;">
                                            <p class="h6 small font-weight-bold p-0 text-dark">{{ $product->name }}
                                            </p>
                                        </a>
                                        <a href="/san-pham/{{ $product->slug }}" style="text-decoration: none;">
                                            <p
                                                class="bg-warning font-weight-bold mt-3 mb-0 mx-auto p-1 rounded-pill text-center text-danger">
                                                {{ currency_format($product->price) }}</p>
                                        </a>
                                        <a href="/san-pham/{{ $product->slug }}" style="text-decoration: none;">
                                            <p class="h6 small p-0 text-dark">{{ $product->desc_short }}</p>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('layout_client.footer')
@include('layout_client.script')
</body>

</html>
