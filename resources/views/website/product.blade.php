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
    <style>
        p.card-title {
            -webkit-line-clamp: 2;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
        }

        p.card-text {
            -webkit-line-clamp: 3;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
        }
    </style>
    @include('layout_client.style')
</head>

<body>
    <div class="template-header template-header-background template-header-background-1">
        <div class="template-header-top">
            @include('layout_client.menu')
        </div>
        <div class="template-header-bottom">

            <div class="template-main">

                <div class="template-header-bottom-page-title">
                    <h1>Danh Sách Sản Phẩm</h1>
                </div>

                <div class="template-header-bottom-page-breadcrumb">
                    <a href="index9ba3.html?page=home">Trang chủ</a><span
                        class="template-icon-meta-arrow-right-12"></span><a href="#">Danh sách sản Phẩm</a>
                </div>

            </div>

        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="container bg-light">
            <div class="pt-5 mx-0 my-0">
                @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @elseif(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                    {{ session()->get('length') }}
                </div>
                @endif
                <div class="row bg-white shadow mx-0">
                    <div class="col-auto justify-content-start bg-warning pt-2">
                        <h4 class="text-dark font-weight-bold">
                            LAPTOP MỚI NHẤT
                        </h4>
                    </div>
                    <div class="col mx-0">
                        <ul class="nav justify-content-end">
                            <!-- <li class="nav-item">
                                <a class="nav-link active" href="#">Active</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="">Xem tất cả</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled">Disabled</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row p-2">
                @foreach ($productNew as $item)
                <?php
                    
                    if (!function_exists('currency_format')) {
                        function currency_format($item, $suffix = ' VNĐ')
                        {
                            if (!empty($item)) {
                                return number_format($item, 0, ',', '.') . "{$suffix}";
                            }
                        }
                    }
                    ?>
<<<<<<< HEAD
                    <div class="col-lg-3 d-flex col-sm-6 p-2">
                        <div class="card flex-fill">
                            {{-- @foreach ($images as $image)
                                @if ($image->product_id == $item->id)
                                    <a href="/san-pham/{{ $item->slug }}"><img src="{{ asset($image->path) }}"
                                            class="card-img-top" alt="{{ asset($image->path) }}"></a>
                                @break

                                ;
                            @endif
                        @endforeach --}}
                            <div class="card-body">
                                <p class="card-title h6 fw-bold p-0">{{ $item->name }}</p>
                                <p class="card-text h6 small p-0">{{ $item->desc_short }}
                                </p>
                                <h6 class="bg-warning font-weight-bold mt-3 mb-0 mx-auto p-1 rounded-pill text-center text-danger"
                                    style="width: 180px;">{{ currency_format($item->price) }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @foreach ($ComputerCompany as $comP)
                <div class="pt-2 mx-0 my-0">
                    <div class="row bg-white shadow mx-0">
                        <div class="col-auto justify-content-start bg-warning pt-2">
                            <h4 class="text-dark font-weight-bold">
                                LAPTOP {{ $comP->company_name }}
                            </h4>
                        </div>
                        <div class="col mx-0">
                            <ul class="nav justify-content-end">
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="cua-hang/{{ $comP->id }}">Xem tất cả</a>
                                </li>
                                <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
    </li> -->
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row p-2">
                    <?php
                    $i = 0;
                    $y = 1;
                    ?>

                    @foreach ($products as $product)
                        @if ($product->companyComputer_id == $comP->id)
                            <?php
                            $i = $i + 1;
                            $y += $y;
                            if (!function_exists('currency_format')) {
                                function currency_format($product, $suffix = ' VNĐ')
                                {
                                    if (!empty($product)) {
                                        return number_format($product, 0, ',', '.') . "{$suffix}";
                                    }
                                }
                            }
                            
                            ?>
                            <div class="col-lg-3 d-flex col-sm-6 p-2">
                                <div class="card flex-fill">
                                    @foreach ($images as $image)
                                        @if ($image->product_id == $product->id)
                                            <a href="/san-pham/{{ $product->slug }}"><img
                                                    src="{{ asset($image->path) }}" class="card-img-top"
                                                    alt="{{ asset($image->path) }}"></a>
                                        @break

                                        ;
                                    @endif
                                @endforeach
                                <div class="card-body">
                                    <p class="card-title h6 fw-bold p-0">{{ $product->name }}</p>
                                    <p class="card-text h6 small p-0">{{ $product->desc_short }}
                                    </p>
                                    <h6 class="bg-warning font-weight-bold mt-3 mb-0 mx-auto p-1 rounded-pill text-center text-danger"
                                        style="width: 180px;">{{ currency_format($product->price) }}</h6>
                                </div>
                            </div>
                        </div>
                        @if ($i === 4)
                        @break
                    @endif
                @endif
            @endforeach
        </div>
    @endforeach
</div>
</div>
@include('layout_client.footer')
@include('layout_client.script')
=======
                <div class="col-lg-3 d-flex col-sm-6 p-2">
                    <div class="card flex-fill">
                        {{-- @foreach ($images as $image)
                        @if ($image->product_id == $item->id)
                        <a href="/san-pham/{{ $item->slug }}"><img src="{{ asset($image->path) }}" class="card-img-top"
                                alt="{{ asset($image->path) }}"></a>
                        @break

                        ;
                        @endif
                        @endforeach --}}
                        <div class="card-body">
                            <p class="card-title h6 fw-bold p-0">{{ $item->name }}</p>
                            <p class="card-text h6 small p-0">{{ $item->desc_short }}
                            </p>
                            <h6 class="bg-warning font-weight-bold mt-3 mb-0 mx-auto p-1 rounded-pill text-center text-danger"
                                style="width: 180px;">{{ currency_format($item->price) }}</h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @foreach ($ComputerCompany as $comP)
            <div class="pt-2 mx-0 my-0">
                <div class="row bg-white shadow mx-0">
                    <div class="col-auto justify-content-start bg-warning pt-2">
                        <h4 class="text-dark font-weight-bold">
                            LAPTOP {{ $comP->company_name }}
                        </h4>
                    </div>
                    <div class="col mx-0">
                        <ul class="nav justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="cua-hang/{{ $comP->id }}">Xem tất cả</a>
                            </li>
                            <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
        </li> -->
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row p-2">
                <?php
                    $i = 0;
                    $y = 1;
                    ?>

                @foreach ($products as $product)
                @if ($product->companyComputer_id == $comP->id)
                <?php
                            $i = $i + 1;
                            $y += $y;
                            if (!function_exists('currency_format')) {
                                function currency_format($product, $suffix = ' VNĐ')
                                {
                                    if (!empty($product)) {
                                        return number_format($product, 0, ',', '.') . "{$suffix}";
                                    }
                                }
                            }
                            
                            ?>
                <div class="col-lg-3 d-flex col-sm-6 p-2">
                    <div class="card flex-fill">
                        @foreach ($images as $image)
                        @if ($image->product_id == $product->id)
                        <a href="/san-pham/{{ $product->slug }}"><img src="{{ asset($image->path) }}"
                                class="card-img-top" alt="{{ asset($image->path) }}"></a>
                        @break

                        ;
                        @endif
                        @endforeach,
                        <div class="card-body">
                            <p class="card-title h6 fw-bold p-0">{{ $product->name }}</p>
                            <p class="card-text h6 small p-0">{{ $product->desc_short }}
                            </p>
                            <h6 class="bg-warning font-weight-bold mt-3 mb-0 mx-auto p-1 rounded-pill text-center text-danger"
                                style="width: 180px;">{{ currency_format($product->price) }}</h6>
                        </div>
                    </div>
                </div>
                @if ($i === 4)
                @break
                @endif
                @endif
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
    @include('layout_client.footer')
    @include('layout_client.script')
>>>>>>> a9e061b191eda7efbf5aa66b0508561bf5c81e26



</body>

</html>