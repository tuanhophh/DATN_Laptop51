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
    @include('layout_client.style')
</head>

<body>
    @include('layout_client.header')
    <div class="container-fluid bg-light pt-3">
        <div class="container bg-white">
            <p class=""><a class="text-dark" href="/cua-hang">Cửa hàng</a> \
                <a class="text-dark" href="/cua-hang/{{$pro->companyComputer_id}}">{{$pro->name}}</a> \
                <a class="text-dark" href="{{$pro->id}}">{{$pro->name}}</a>
            </p>
        </div>
        <div class="container bg-white mb-4 pb-3">

            <p class="h5">{{$pro->name}}</p>
            <div class="row">
                <div class="col-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://laptop88.vn/media/product/6724_dsc07501.jpg" class="" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://laptop88.vn/media/product/6724_dsc07501.jpg" class="" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://laptop88.vn/media/product/6724_dsc07501.jpg" class="" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <h5 class="font-weight-bold">{{$pro->price}}</h5>
                    <p class="">{{$pro->desc}}
                    </p>
                    <div class="row" style="height: auto;">
                        <div class="col-3 pr-0">
                            <p class="pr-0  py-0 font-weight-bold">
                                CPU:
                            </p>
                        </div>
                        <div class="col-9">
                            <ul class="nav">
                                @foreach($detailPro as $item)
                                @if($item->category_id==1)
                                <li class="nav-item border border-warning my-0 mr-2 mb-2 px-2">
                                    <a class="nav-link active p-0 text-dark" href="#">
                                        {{$item->name}}
                                    </a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row" style="height: auto;">
                        <div class="col-3 pr-0">
                            <p class="pr-0  py-0 font-weight-bold">
                                RAM:
                            </p>
                        </div>
                        <div class="col-9">
                            <ul class="nav">
                                @foreach($detailPro as $item)
                                @if($item->category_id==4)
                                <li class="nav-item border border-warning my-0 mr-2 mb-2 px-2">
                                    <a class="nav-link active p-0 text-dark" href="#">
                                        {{$item->name}}
                                    </a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row" style="height: auto;">
                        <div class="col-3 pr-0">
                            <p class="pr-0  py-0 font-weight-bold">
                                Ổ cứng:
                            </p>
                        </div>
                        <div class="col-9">
                            <ul class="nav">
                                @foreach($detailPro as $item)
                                @if($item->category_id==2)
                                <li class="nav-item border border-warning my-0 mr-2 mb-2 px-2">
                                    <a class="nav-link active p-0 text-dark" href="#">
                                        {{$item->name}}
                                    </a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row" style="height: auto;">
                        <div class="col-3 pr-0">
                            <p class="pr-0  py-0 font-weight-bold">
                                Màn hình:
                            </p>
                        </div>
                        <div class="col-9">
                            <ul class="nav">
                                @foreach($detailPro as $item)
                                @if($item->category_id==3)
                                <li class="nav-item border border-warning my-0 mr-2 mb-2 px-2">
                                    <a class="nav-link active p-0 text-dark" href="#">
                                        {{$item->name}}
                                    </a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row" style="height: auto;">
                        <div class="col-3 pr-0">
                            <p class="pr-0  py-0 font-weight-bold">
                                Card đồ họa:
                            </p>
                        </div>
                        <div class="col-9">
                            <ul class="nav">
                                @foreach($detailPro as $item)
                                @if($item->category_id==5)
                                <li class="nav-item border border-warning my-0 mr-2 mb-2 px-2">
                                    <a class="nav-link active p-0 text-dark" href="#">
                                        {{$item->name}}
                                    </a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
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
                                <div class="col-6">
                                </div>
                                <div class="col-6">
                                    <div class="col-6">

                                        <form action="{{URL::to('/save-cart')}}" method="POST">
                                            @csrf
                                        <input name="qly" type="number" hidden min="1" value="1">
                                        <input name="id" hidden value="{{$pro->id}}">
                                        <button class="btn btn-warning" type="submit">
                                            Thêm giỏ hàng
                                        </button>
                                        </form>
                                    </div>
                                    <div class="col-6">

                                    </div>
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
                        <p class="px-3">
                            {{$pro->desc}}
                        </p>
                    </div>
                </div>
                <div class="col-4 pl-1">
                    <div class="bg-white ">
                        <p class='border-bottom pl-3 pb-2 pt-3 border-warning h5'>
                            Sản phẩm cùng hãng
                        </p>
                        <ul class="list-group">
                            <li class="list-group-item border-left-0 border-right-0 border-top-0 d-inline">
                                <div class="row">
                                    <div class="col-4 p-0">
                                        <a class="" href="">
                                            <img class="center-block" style="width: 150px;"
                                                src="https://laptop88.vn/media/lib/28-10-2021/dsc07503.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <p class="h6 small font-weight-bold p-0">Laptop Cũ HP Notebook 14s cr2005tu -
                                            Intel
                                            Core i5</p>
                                        <p class="h6 small font-weight-bold text-danger p-0">13.999.999 VNĐ</p>
                                        <p class="h6 small p-0">Laptop Có thể nói, với tất cả những ưu điểm nổi trội cả
                                            về
                                            ngoại hình lẫn hiệu năng trên HP
                                            Notebook 14</p>

                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item border-left-0 border-right-0 border-top-0 d-inline">
                                <div class="row">
                                    <div class="col-4 p-0">
                                        <a class="" href="">
                                            <img class="center-block" style="width: 150px;"
                                                src="https://laptop88.vn/media/lib/28-10-2021/dsc07503.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <p class="h6 small font-weight-bold p-0">Laptop Cũ HP Notebook 14s cr2005tu -
                                            Intel
                                            Core i5</p>
                                        <p class="h6 small font-weight-bold text-danger p-0">13.999.999 VNĐ</p>
                                        <p class="h6 small p-0">Laptop Có thể nói, với tất cả những ưu điểm nổi trội cả
                                            về
                                            ngoại hình lẫn hiệu năng trên HP
                                            Notebook 14</p>

                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item border-left-0 border-right-0 border-top-0 d-inline">
                                <div class="row">
                                    <div class="col-4 p-0">
                                        <a class="" href="">
                                            <img class="center-block" style="width: 150px;"
                                                src="https://laptop88.vn/media/lib/28-10-2021/dsc07503.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <p class="h6 small font-weight-bold p-0">Laptop Cũ HP Notebook 14s cr2005tu -
                                            Intel
                                            Core i5</p>
                                        <p class="h6 small font-weight-bold text-danger p-0">13.999.999 VNĐ</p>
                                        <p class="h6 small p-0">Laptop Có thể nói, với tất cả những ưu điểm nổi trội cả
                                            về
                                            ngoại hình lẫn hiệu năng trên HP
                                            Notebook 14</p>

                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item border-left-0 border-right-0 border-top-0 d-inline">
                                <div class="row">
                                    <div class="col-4 p-0">
                                        <a class="" href="">
                                            <img class="center-block" style="width: 150px;"
                                                src="https://laptop88.vn/media/lib/28-10-2021/dsc07503.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <p class="h6 small font-weight-bold p-0">Laptop Cũ HP Notebook 14s cr2005tu -
                                            Intel
                                            Core i5</p>
                                        <p class="h6 small font-weight-bold text-danger p-0">13.999.999 VNĐ</p>
                                        <p class="h6 small p-0">Laptop Có thể nói, với tất cả những ưu điểm nổi trội cả
                                            về
                                            ngoại hình lẫn hiệu năng trên HP
                                            Notebook 14</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('layout_client.footer')
    @include('layout_client.script')

</body>

</html>
