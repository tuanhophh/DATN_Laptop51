<div class="template-header-top">

    <!-- Logo -->
    <div class="template-header-top-logo">
        <a href="{{ asset('') }}" title="">
            <img src="{{ asset('client') }}/media/image/logo1.png" alt="" class="template-logo" />
            <img src="{{ asset('client') }}/media/image/logo_sticky.png" alt=""
                class="template-logo template-logo-sticky" />
        </a>
    </div>

    <!-- Menu-->
    <div class="template-header-top-menu template-main">
        <nav>

            <!-- Default menu-->
            <div class="template-component-menu-default">
                <ul class="sf-menu">
                    <li>
                        <a href="{{ asset('') }}" class="template-state-selected">Trang Chủ</a>
                    </li>
                    <li>
                        <a href="{{ asset('') }}cua-hang">Sản Phẩm</a>
                    </li>
                    <li>
                        <a href="{{ asset('') }}gioi-thieu">Giới Thiệu</a>
                    </li>
                    <li>
                        <a href="#">Các Dịch Vụ</a>
                        <ul>
                            <li><a href="{{ asset('') }}sua-laptop-lay-ngay-1h">Sửa Laptop lấy ngay 1h</a>
                            </li>
                            <li><a href="{{ asset('') }}sua-laptop-tai-nha-hoac-van-phong">Sửa Laptop tại
                                    nhà/văn phòng</a></li>
                            <li><a href="{{ asset('') }}thay-the-va-nang-cap-phan-cung">Thay thế - Nâng cấp
                                    phần cứng</a></li>
                            <li><a href="{{ asset('') }}cai-dat-phan-mem-ban-quyen">Cài đặt phần mềm bản
                                    quyền</a></li>
                            <li><a href="{{ asset('') }}dich-vu-cho-macbook">Dịch vụ cho Macbook</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ asset('') }}dat-lich">Đặt Lịch</a>
                    </li>
                    <li>
                        <a href="{{ asset('') }}lien-he">Liên Hệ</a>
                    </li>
                </ul>
            </div>

        </nav>
        <nav>

            <!-- Mobile menu-->
            <div class="template-component-menu-responsive">
                <ul class="flexnav">
                    <li><a href="#"><span
                                class="touch-button template-icon-meta-arrow-large-tb template-component-menu-button-close"></span>&nbsp;</a>
                    </li>
                    <li>
                        <a href="{{ asset('') }}" class="template-state-selected">Trang Chủ</a>
                    <li>
                        <a href="{{ asset('') }}cua-hang">Sản Phẩm</a>
                    </li>
                    <li>
                        <a href="{{ asset('') }}gioi-thieu">Giới Thiệu</a>
                    </li>
                    <li>
                        <a href="#">Các Dịch Vụ</a>
                        <ul>
                            <li><a href="{{ asset('') }}sua-laptop-lay-ngay-1h">Sửa Laptop lấy ngay 1h</a>
                            </li>
                            <li><a href="{{ asset('') }}sua-laptop-tai-nha-hoac-van-phong">Sửa Laptop tại
                                    nhà/văn phòng</a></li>
                            <li><a href="{{ asset('') }}thay-the-va-nang-cap-phan-cung">Thay thế - Nâng cấp
                                    phần cứng</a></li>
                            <li><a href="{{ asset('') }}cai-dat-phan-mem-ban-quyen">Cài đặt phần mềm bản
                                    quyền</a></li>
                            <li><a href="{{ asset('') }}dich-vu-cho-macbook">Dịch vụ cho Macbook</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ asset('') }}dat-lich">Đặt Lịch</a>
                    </li>
                    <li>
                        <a href="{{ asset('') }}lien-he">Liên Hệ</a>
                    </li>
                </ul>
            </div>

        </nav>
        <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.template-header-top').templateHeader();
        });
        </script>
    </div>
    <!-- Social icons -->
    <div class="template-header-top-icon-list mt-3 template-component-social-icon-list-1">
        <nav class="navbar navbar-expand-sm">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-list-4">
                <ul class="navbar-nav dropdown-menu-right">
                    <li class="nav-item">
                        <a href="/gio-hang" style="font-size: 2rem;">
                        <i class="fa" style="font-size:24px">&#xf07a;</i>
                        <?php
                                    use Gloudemans\Shoppingcart\Facades\Cart;
                                    use Illuminate\Support\Facades\Auth;

                                    $count = Cart::count();
                                    $user = Auth::user();
                                    // dd($content);
                                ?>
                            <span class='badge badge-warning' id='lblCartCount'>{{Cart::count()}}</span></a>
                    </li>
                    @if(Auth::check())
                    <li class="nav-item dropdown dropdown-menu-right">
                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        @if($user->avatar == "")
                            <img src="{{ asset('products/user_icon.png') }}" 
                                width="40px" height="40px" class="rounded-circle">
                        @else
                        <img src="{{ asset($user->avatar) }}"
                                width="40px" height="auto" class="rounded-circle">
                        @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item text-dark" href="{{url('profile')}}">Thông tin</a>
                            <a class="dropdown-item text-dark" href="#">Hóa đơn</a>
                            <a class="dropdown-item text-dark" href="{{url('logout')}}">Đăng xuất</a>
                        </div>
                    </li>
                    @else
                    <li class="nav-item dropdown dropdown-menu-right">
                        <a class="nav-link" href="/#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('products/user_icon.png') }}"
                                width="40" height="40" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item text-dark" href="{{url('login')}}">Đăng nhập </a>
                            <a class="dropdown-item text-dark" href="{{url('register')}}">Đăng ký</a>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>