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
    @include('layout_client.style')
</head>

<body>
    @include('layout_client.menu')
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Laptop Tại Cửa Hàng</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="index.html">Trang Chủ</a></li>
                                <li>Laptop</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            </div>
                            <!-- shop-option end -->
                            <!-- Tab Content start -->
                            <div class="tab-content">
                                <!-- grid-view -->
                                <div id="grid-view" class="tab-pane active show" role="tabpanel">
                                    <div class="row">
                                        <!-- product-item start -->
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
                                            <div class="col-lg-4 col-md-6">
                                                <div class="product-item">
                                                    <div class="product-img">
                                                        <a href="{{ asset('') }}cua-hang/product-detail/{code}">
                                                            <img src="img/product/7.jpg" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <h6 class="product-title">
                                                            <a
                                                                href="{{ asset('') }}cua-hang/product-detail/{code}">{{ $item->name }}</a>
                                                        </h6>

                                                        <h3 class="pro-price">{{ $item->price }} VNĐ</h3>
                                                        <ul class="action-button">
                                                            <li>
                                                                <a href="#" title="Wishlist"><i
                                                                        class="zmdi zmdi-favorite"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#productModal" title="Quickview"><i
                                                                        class="zmdi zmdi-zoom-in"></i></a>
                                                            </li>

                                                            <li>
                                                                <a href="#" title="Add to cart"><i
                                                                        class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- product-item end -->
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Tab Content end -->
                            <!-- shop-pagination start -->
                            <ul class="shop-pagination box-shadow text-center ptblr-10-30">
                                <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                <li class="active"><a href="#">01</a></li>
                                <li><a href="#">02</a></li>
                                <li><a href="#">03</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">05</a></li>
                                <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                            </ul>
                            <!-- shop-pagination end -->
                        </div>
                    </div>
                    <div class="col-lg-3 order-lg-1 order-2">
                        <!-- widget-search -->
                        <aside class="widget-search mb-30">
                            <form action="#">
                                <input type="text" placeholder="Tìm kiếm">
                                <button type="submit"><i class="zmdi zmdi-search"></i></button>
                            </form>
                        </aside>
                        <!-- widget-categories -->
                        <aside class="widget widget-categories box-shadow mb-30">
                            <h6 class="widget-title border-left mb-20">Danh Mục</h6>
                            <div id="cat-treeview" class="product-cat">
                                <ul>
                                    <li class="closed"><a href="#">Brand One</a>
                                        <ul>
                                            <li><a href="#">Mobile</a></li>
                                            <li><a href="#">Tab</a></li>
                                            <li><a href="#">Watch</a></li>
                                            <li><a href="#">Head Phone</a></li>
                                            <li><a href="#">Memory</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                        <!-- shop-filter -->
                        <aside class="widget shop-filter box-shadow mb-30">
                            <h6 class="widget-title border-left mb-20">Giá</h6>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <input type="submit" value="phạm vi :" />
                                    <input type="text" id="amount" name="price" placeholder="Nhập phạm vi giá" />
                                </div>
                                <div id="slider-range"></div>
                            </div>
                        </aside>
                        <!-- widget-product -->
                        <aside class="widget widget-product box-shadow">
                            <h6 class="widget-title border-left mb-20">Sản phẩm liên quan</h6>
                            <!-- product-item start -->
                            <div class="product-item">
                                <div class="product-img">
                                    <a href="{{ asset('') }}cua-hang/product-detail/{code}">
                                        <img src="img/product/4.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h6 class="product-title">
                                        <a href="{{ asset('') }}cua-hang/product-detail/{code}">Product Name</a>
                                    </h6>
                                    <h3 class="pro-price">$ 869.00</h3>
                                </div>
                            </div>
                            <!-- product-item end -->
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <!-- SHOP SECTION END -->
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product clearfix">
                                <div class="product-images">
                                    <div class="main-image images">
                                        <img alt="" src="img/product/quickview.jpg">
                                    </div>
                                </div><!-- .product-images -->

                                <div class="product-info">
                                    <h1>Aenean eu tristique</h1>
                                    <div class="price-box-3">
                                        <div class="s-price-box">
                                            <span class="new-price">£160.00</span>
                                            {{-- <span class="old-price">£190.00</span> --}}
                                        </div>
                                    </div>
                                    <a href="single-product-left-sidebar.html" class="see-all">Xem chi tiết</a>
                                    <div class="quick-add-to-cart">
                                        <form method="post" class="cart">
                                            <div class="numbers-row">
                                                <input type="number" id="french-hens" value="1">
                                            </div>
                                            <button class="single_add_to_cart_button" type="submit">Thêm vào giỏ
                                                hàng</button>
                                        </form>
                                    </div>
                                    <div class="quick-desc">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec
                                        est tristique auctor. Donec non est at libero.
                                    </div>
                                </div><!-- .product-info -->
                            </div><!-- .modal-product -->
                        </div><!-- .modal-body -->
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
            </div>
            <!-- END Modal -->
        </div>

    </div>
    @include('layout_client.footer')
    @include('layout_client.script')



</body>

</html>
