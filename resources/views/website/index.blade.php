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

        <section id="page-content" class="page-wrapper section">

            <!-- BY BRAND SECTION START-->
            <div class="by-brand-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">Các Thương Hiệu</h2>
                            </div>
                            <div class="by-brand-product">
                                <div class="active-by-brand slick-arrow-2">
                                    <!-- single-brand-product start -->
                                    @foreach($ComputerCompany as $ComputerCom)
                                    <div class="brand-item">
                                        <div class="single-brand-product">
                                            <a href="/cua-hang/{{$ComputerCom->id}}"><img
                                                    src="{{asset($ComputerCom->logo)}}"
                                                    width="100" alt=""></a>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- single-brand-product end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BY BRAND SECTION END -->

            <!-- FEATURED PRODUCT SECTION START -->
            <div class="featured-product-section mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">Sản phẩm mới nhất</h2>
                            </div>
                            <div class="featured-product">
                                <div class="active-featured-product slick-arrow-2">
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
                                    <div class="product-item">
                                        <div class="product-img">
                                            @foreach ($images as $image)
                                            @if ($image->product_id == $item->id)
                                            <a href="/san-pham/{{ $item->slug }}">
                                                <img src="{{ asset($image->path) }}"
                                                    alt="{{ asset($image->path) }}" />
                                            </a>
                                            @break;
                                            @endif
                                            @endforeach
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="/san-pham/{{ $item->slug }}">{{ $item->name }}
                                                </a>
                                            </h6>
                                            <h3 class="pro-price mb-0"><a href="/san-pham/{{ $item->slug }}">{{ currency_format($item->price) }}</a> </h3>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FEATURED PRODUCT SECTION END -->

            <!-- UP COMMING PRODUCT SECTION START -->
            <!-- <div class="up-comming-product-section mb-80">
                <div class="container">
                    <div class="row"> -->
            <!-- up-comming-pro -->
            <!-- <div class="col-lg-8">
                            <div class="up-comming-pro gray-bg clearfix">
                                <div class="up-comming-pro-img f-left">
                                    <a href="#">
                                        <img src="{{ asset('client') }}/img/up-comming/1.png" alt="">
                                    </a>
                                </div>
                                <div class="up-comming-pro-info f-left">
                                    <h3><a href="#">Sản Phẩm Giảm Giá</a></h3>
                                    <p>Không cần phải bỏ ra quá nhiều tiền, bạn vẫn có thể là người dẫn đầu cuộc chơi
                                        với Acer Nitro Gaming 5 AN515 45 R6EV phiên bản chạy AMD Ryzen 5000 series. Sức
                                        mạnh của tiến trình 7nm hiện đại kết hợp cùng card đồ họa kiến trúc Turing mang
                                        tới một chiếc máy tính chơi game xuất sắc.</p>
                                    <div class="up-comming-time">
                                        <div data-countdown="2022/02/02"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-block d-md-none d-lg-block">
                            <div class="banner-item banner-1">
                                <div class="ribbon-price">
                                    <span>Giảm 15%</span>
                                </div>
                                <div class="banner-img">
                                    <a href="#"><img src="{{ asset('client') }}/img/up-comming/2.png" alt=""></a>
                                </div>
                                <div class="banner-info">
                                    <h3><a href="#">Dell Inspiron 15 5510</a></h3>
                                    <ul class="banner-featured-list">
                                        <li>
                                            <i class="zmdi zmdi-check"></i><span>Màn Hình: 15.6 inch</span>
                                        </li>
                                        <li>
                                            <i class="zmdi zmdi-check"></i><span>CPU: AMD, Ryzen 5, 5600H</span>
                                        </li>
                                        <li>
                                            <i class="zmdi zmdi-check"></i><span>RAM: 8 GB, DDR4, 3200 MHz</span>
                                        </li>
                                        <li>
                                            <i class="zmdi zmdi-check"></i><span>Ổ Cứng: SSD 512 GB</span>
                                        </li>
                                        <li>
                                            <i class="zmdi zmdi-check"></i><span>Card Đồ Họa: NVIDIA GeForce GTX 1650
                                                4GB</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- UP COMMING PRODUCT SECTION END -->

            <!-- PRODUCT TAB SECTION START -->
            <div class="product-tab-section mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">Sản Phẩm Bán Chạy</h2>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- popular-product start -->
                                <div id="popular-product" class="tab-pane active show">
                                    <div class="row">
                                        <!-- product-item start -->
                                        @foreach($product_hot_sell as $product_hot)
                                        <?php
                    
                    if (!function_exists('currency_format')) {
                        function currency_format($product_hot, $suffix = ' VNĐ')
                        {
                            if (!empty($product_hot)) {
                                return number_format($product_hot, 0, ',', '.') . "{$suffix}";
                            }
                        }
                    }
                    ?>
                                        <div class="col-lg-3 col-md-4">
                                            <div class="product-item">
                                                <div class="product-img">
                                                @foreach ($images as $image)
                                                        @if ($image->product_id == $product_hot->id)
                                                        <a href="/san-pham/{{$product_hot->slug}}">
                                                            <img src="{{ asset($image->path) }}"
                                                                alt="{{ asset($image->path) }}" />
                                                        </a>
                                                        @break;
                                                        @endif
                                                        @endforeach
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-title">
                                                        <a href="/san-pham/{{$product_hot->slug}}">{{$product_hot->name}}</a>
                                                    </h6>

                                                    <h3 class="pro-price">{{ currency_format($item->price) }}</h3>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        @endforeach
                                        <!-- product-item end -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PRODUCT TAB SECTION END -->

            <!-- BLOG SECTION START -->
            <div class="blog-section mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">Tin Tức Mới Nhất</h2>
                            </div>
                            <div class="blog">
                                <div class="active-blog">
                                    <div class="blog-item">
                                        <img src="{{ asset('client') }}/img/blog/1.jpg" alt="">
                                        <div class="blog-desc">
                                            <h5 class="blog-title"><a href="single-blog.html">FPT Shop đã giao hơn
                                                    1.500 máy trong ngày đầu tiên mở bán iPhone 13 Series Xanh lá</a>
                                            </h5>
                                            <p>Hơn 1.500 máy đã được FPT Shop & F.Studio by FPT đã giao trong ngày đầu
                                                tiên mở bán iPhone 13 Series Xanh lá. Đồng thời, hệ thống dành tặng ưu
                                                đãi đến 6 triệu, nhân đôi bảo hành thành 2 năm, trả góp 0%... cho khách
                                                hàng chọn mua siêu phẩm này.</p>
                                            <div class="read-more">
                                                <a href="single-blog.html">Đọc Thêm</a>
                                            </div>
                                            <ul class="blog-meta">
                                                <li>
                                                    <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-item">
                                        <img src="{{ asset('client') }}/img/blog/2.jpg" alt="">
                                        <div class="blog-desc">
                                            <h5 class="blog-title"><a href="single-blog.html">Chào đón shop gia
                                                    dụng thứ 100, FPT Shop ưu đãi cực sốc đến 50%++</a></h5>
                                            <p>Từ ngày 18 – 30/04, 99 cửa hàng gia dụng FPT Shop tung loạt ưu đãi “hot”
                                                như: giảm giá đến 50%++, mua 1 tặng 1, đổi mới trong 100 ngày, sản phẩm
                                                giá sốc… chào đón thành viên thứ 100 sắp “trình làng”.</p>
                                            <div class="read-more">
                                                <a href="single-blog.html">Đọc Thêm</a>
                                            </div>
                                            <ul class="blog-meta">
                                                <li>
                                                    <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-item">
                                        <img src="{{ asset('client') }}/img/blog/3.jpg" alt="">
                                        <div class="blog-desc">
                                            <h5 class="blog-title"><a href="single-blog.html">Sắm laptop Dell tại
                                                    FPT Shop, khách hàng được ưu đãi trả góp 0% lãi suất đến 24
                                                    tháng</a></h5>
                                            <p>Từ nay đến 31/12/2022, chủ thẻ tín dụng mua laptop Dell tại FPT Shop được
                                                hưởng ưu đãi trả góp không lãi suất đến 24 tháng qua ứng dụng Quà tặng
                                                Galaxy.</p>
                                            <div class="read-more">
                                                <a href="single-blog.html">Đọc Thêm</a>
                                            </div>
                                            <ul class="blog-meta">
                                                <li>
                                                    <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-item">
                                        <img src="{{ asset('client') }}/img/blog/1.jpg" alt="">
                                        <div class="blog-desc">
                                            <h5 class="blog-title"><a href="single-blog.html">Tuần lễ vàng, tất cả
                                                    laptop tại Trung tâm Laptop FPT Shop giảm sốc 10%</a></h5>
                                            <p>Từ ngày 15 – 21/04/2022, khách hàng chọn mua laptop tại Trung tâm Laptop
                                                FPT Shop được giảm ngay 10%. Ngoài ra, hệ thống còn tặng nhiều ưu đãi
                                                thiết thực khác và miễn phí lắp đặt, giao hàng tận nhà trên toàn quốc.
                                            </p>
                                            <div class="read-more">
                                                <a href="single-blog.html">Đọc Thêm</a>
                                            </div>
                                            <ul class="blog-meta">
                                                <li>
                                                    <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BLOG SECTION END -->
        </section>
        <!-- End page content -->

        <!-- START FOOTER AREA -->
        @include('layout_client.footer')
        <!-- END FOOTER AREA -->


    </div>
    @include('layout_client.script')

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
</script>

</html>