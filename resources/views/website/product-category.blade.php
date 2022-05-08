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


</head>

<body>
    <div class="wrapper">
        @include('layout_client.menu')
        @include('layout_client.header')
        <div id="page-content" class="page-wrapper section">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 order-lg-2 order-1">
                            <div class="shop-content">
                                <!-- shop-option start -->
                                <div class="shop-option box-shadow mb-30 clearfix">
                                    <!-- Nav tabs -->
                                    <ul class="nav shop-tab f-left" role="tablist">
                                        <li>
                                            <a class="active" href="#grid-view" data-bs-toggle="tab"><i
                                                    class="zmdi zmdi-view-module"></i></a>
                                        </li>
                                    </ul>
                                    <!-- short-by -->
                                    <div class="short-by f-right text-center">
                                        <span>Sắp xếp :</span>
                                        <select>
                                            <option value="volvo">Mới nhất</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- shop-option end -->
                                <!-- Tab Content start -->
                                <div class="tab-content">
                                    <!-- grid-view -->
                                    <div id="grid-view" class="tab-pane active show" role="tabpanel">
                                        <div class="row">
                                            <!-- product-item start -->
                                            @foreach($products as $product)
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
                                            <div class="col-lg-4 col-md-6">
                                                <div class="product-item">
                                                    <div class="product-img">
                                                        @foreach ($images as $image)
                                                        @if ($image->product_id == $product->id)
                                                        <a href="/san-pham/{{$product->slug}}">
                                                            <img src="{{ asset($image->path) }}"
                                                                alt="{{ asset($image->path) }}" />
                                                        </a>
                                                        @break;
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="product-info">
                                                        <h6 class="product-title mx-2">
                                                            <a href="/san-pham/{{$product->slug}}">{{$product->name}}
                                                            </a>
                                                        </h6>
                                                        <h3 class="pro-price mb-0">
                                                            {{ currency_format($product->price) }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- product-item end -->

                                        </div>
                                    </div>
                                    <!-- list-view -->

                                </div>
                                <!-- Tab Content end -->
                                <!-- shop-pagination start -->
                                <ul class="shop-pagination box-shadow text-center ptblr-10-30">
                                    <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                    <li><a href="#">01</a></li>
                                    <li><a href="#">02</a></li>
                                    <li><a href="#">03</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">05</a></li>
                                    <li class="active"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                </ul>
                                <!-- shop-pagination end -->
                            </div>
                        </div>
                        <div class="col-lg-3 order-lg-1 order-2">
                            <!-- widget-search -->
                            <aside class="widget-search mb-30">
                                <form action="#">
                                    <input type="text" placeholder="Tìm kiếm...">
                                    <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                </form>
                            </aside>
                            <!-- widget-categories -->
                            <aside class="widget widget-categories box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">Danh mục</h6>
                                <div id="cat-treeview" class="product-cat">
                                    <ul>
                                        <li class="open"><a href="#">Laptop</a>
                                            <ul>
                                                @foreach($ComputerCompany as $ComputerCom)
                                                <li>
                                                    <a class="" @if($ComputerCom->id == $id)
                                                        style="color:#ff7f00"
                                                        @endif
                                                        href="/cua-hang/{{$ComputerCom->id}}">{{$ComputerCom->company_name}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </aside>
                            <!-- <aside class="widget widget-product box-shadow">
                                <h6 class="widget-title border-left mb-20">Sản phẩm bán chạy</h6> -->
                            <!-- product-item start -->
                            <!-- <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="img/product/4.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="single-product.html">Product Name</a>
                                        </h6>
                                        <h3 class="pro-price">$ 869.00</h3>
                                    </div>
                                </div> -->
                            <!-- product-item end -->

                            <!-- </aside> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->
        </div>
        @include('layout_client.footer')
        @include('layout_client.script')



</body>

</html>