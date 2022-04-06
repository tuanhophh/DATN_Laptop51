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

    p.card-title:hover {
        -webkit-line-clamp: unset;
        overflow: auto;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-box-orient: vertical;
    }
    </style>
    @include('layout_client.style')
</head>

<body>
    @include('layout_client.header')
    <div class="container-fluid bg-light">
        <div class="container bg-light">
            <div class="pt-5 mx-0 my-0">
            @if(session()->has('message'))
        <div class="alert alert-danger">
            {{ session()->get('message') }}
        </div>
    @endif
                <div class="row bg-white shadow mx-0">
                    <div class="col-auto justify-content-start bg-warning pt-2">
                        <h4 class="text-dark font-weight-bold">
                            LAPTOP MỚI NHẤT
                        </h4>
                    </div>
                    <!-- <div class="col mx-0">
                        <ul class="nav justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Active</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled">Disabled</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <div class="row p-2">
                @foreach ($productNew as $item)
                <div class="col-lg-3 col-sm-6 p-2">
                    <div class="card">
                        <a href="{{$item->id}}"><img src="https://laptop88.vn/media/product/pro_poster_7010.jpg"
                                class="card-img-top" alt="https://laptop88.vn/media/product/pro_poster_7010.jpg"></a>
                        <div class="card-body">
                            <p class="card-title h6 fw-bold p-0">{{$item->name}}</p>
                            <p class="card-text h6 small p-0">{{$item->desc}}
                            </p>
                            <p class="h4 bg-warning mt-3 mb-0 mx-auto p-1 rounded-pill text-center text-white"
                                style="width: 180px;">{{$item->price}}Đ</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @foreach($ComputerCompany as $comP)
            <div class="pt-2 mx-0 my-0">
                <div class="row bg-white shadow mx-0">
                    <div class="col-auto justify-content-start bg-warning pt-2">
                        <h4 class="text-dark font-weight-bold">
                            LAPTOP {{$comP->company_name}}
                        </h4>
                    </div>
                    <!-- <div class="col mx-0">
                        <ul class="nav justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Active</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled">Disabled</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <div class="row p-2">
                @foreach($products as $product)
                @if($product->companyComputer_id == $comP->id)
                <div class="col-lg-3 col-sm-6 p-2">
                    <div class="card">
                        <a href="{{$product->id}}"><img src="https://laptop88.vn/media/product/pro_poster_7010.jpg"
                                class="card-img-top" alt="https://laptop88.vn/media/product/pro_poster_7010.jpg"></a>
                        <div class="card-body">
                            <p class="card-title h6 fw-bold p-0">{{$product->name}}</p>
                            <p class="card-text h6 small p-0">{{$product->desc}}
                            </p>
                            <p class="h4 bg-warning mt-3 mb-0 mx-auto p-1 rounded-pill text-center text-white"
                                style="width: 180px;">{{$product->price}}</p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
    @include('layout_client.footer')
    @include('layout_client.script')



</body>

</html>