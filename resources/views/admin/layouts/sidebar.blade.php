<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 text-center text-uppercase">
        {{-- @if(isset($_SESSION['AUTH']))
        <div class="image">
            <img src="{{ '/public/adminlte/'}}dist/img/user2-160x160.jpg" class="img-circle elevation-2"
        alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">{{$_SESSION['AUTH']['name']}}</a>
    </div>
    @else --}}
    {{-- <div class="image">
            <img src="{{ '/public/adminlte/'}}dist/img/user2-160x160.jpg" class="img-circle elevation-2"
    alt="User Image">
</div> --}}
@if (Auth::user())
<div class="info">
    <a href="" class="d-block">{{Auth::user()->name}}</a>
</div>
@else
<div class="info">
    <a href="" class="d-block">dang nhap</a>
</div>
@endif

{{-- @endif --}}
</div>



<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="/admin" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    {{-- <i class="right fas fa-angle-left"></i> --}}
                </p>
            </a>

        </li>
        @can('list-category')
        <li class="nav-item {{ request()->is('admin/CompanyComputer*') ? ' menu-is-opening menu-open' : '' }}">
            <a href="" class="nav-link {{ request()->is('admin/CompanyComputer*') ? 'active ' : '' }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Danh mục
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                </p>
            </a>
            <ul class="nav nav-treeview">
                @can('list-category')
                <li class="nav-item">
                    <a href="/admin/CompanyComputer"
                        class="nav-link {{ request()->is('admin/CompanyComputer') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách</p>
                    </a>
                </li>
                @endcan
                @can('add-category')

                <li class="nav-item">
                    <a href="/admin/CompanyComputer/add"
                        class="nav-link {{ request()->is('admin/CompanyComputer/add') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm mới</p>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcan

        <li class="nav-item {{ request()->is('admin/dat-lich*') ? ' menu-is-opening menu-open' : '' }}">
            <a href="" class="nav-link {{ request()->is('admin/dat-lich*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Máy sửa chữa
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('dat-lich.danh-sach-may') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dat-lich.add') }}"
                        class="nav-link {{ request()->is('/user/add') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm mới</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dat-lich.user_epair') }}"
                        class="nav-link {{ request()->is('user/add') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách được phân công</p>
                    </a>
                </li>
            </ul>
        </li>
        @can('list-product')
        <li class="nav-item {{ request()->is('admin/detail-product*') ? ' menu-is-opening menu-open' : '' }}">
            <a href="" class="nav-link {{ request()->is('admin/detail-product*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Chi tiết sản phẩm
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                </p>
            </a>
            <ul class="nav nav-treeview">
                @can('list-product')
                <li class="nav-item">
                    <a href="/admin/detail-product"
                        class="nav-link {{ request()->is('admin/detail-product') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách</p>
                    </a>
                </li>
                @endcan
                @can('add-product')

                <li class="nav-item">
                    <a href="/admin/detail-product/add"
                        class="nav-link {{ request()->is('admin/detail-product/add') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm mới</p>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcan
        <li class="nav-item {{ request()->is('admin/sua-chua*') ? ' menu-is-opening menu-open' : '' }}">
            <a href="" class="nav-link {{ request()->is('admin/sua-chua*') ? 'active ' : '' }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Order
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/dat-lich" class="nav-link {{ request()->is('admin/category') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách</p>
                    </a>
                </li>


            </ul>
        </li>
        @can('list-category')
        <li class="nav-item {{ request()->is('admin/product*') ? ' menu-is-opening menu-open' : '' }}">
            <a href="" class="nav-link {{ request()->is('admin/product*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Sản phẩm
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                </p>
            </a>
            <ul class="nav nav-treeview">
                @can('list-category')
                <li class="nav-item">
                    <a href="/admin/product" class="nav-link {{ request()->is('admin/product') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách</p>
                    </a>
                </li>
                @endcan
                @can('add-category')
                <li class="nav-item">
                    <a href="/admin/product/add"
                        class="nav-link {{ request()->is('admin/product/add') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm mới</p>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcan
        @can('list-user')
        <li class="nav-item {{ request()->is('admin/user*') ? ' menu-is-opening menu-open' : '' }}">
            <a href="" class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Tài khoản
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                </p>
            </a>

            <ul class="nav nav-treeview">
                @can('list-user')
                <li class="nav-item">
                    <a href="/admin/user" class="nav-link {{ request()->is('/user') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách</p>
                    </a>
                </li>
                @endcan
                @can('add-user')
                <li class="nav-item">
                    <a href="/admin/user/add" class="nav-link {{ request()->is('user/add') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm mới</p>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcan
        @can('list-product')
        <li class="nav-item {{ request()->is('admin/category*') ? ' menu-is-opening menu-open' : '' }}">

            <a href="" class="nav-link {{ request()->is('admin/category*') ? 'active ' : '' }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Thuộc tính
                    <i class="fas fa-angle-left right"></i>
                    <!-- <span class="badge badge-info right">6</span> -->
                </p>
            </a>
            <ul class="nav nav-treeview">
                @can('list-product')
                <li class="nav-item">
                    <a href="/admin/category" class="nav-link {{ request()->is('admin/category') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách</p>
                    </a>
                </li>
                @endcan
                @can('add-product')
                <li class="nav-item">
                    <a href="/admin/category/add"
                        class="nav-link {{ request()->is('admin/category/add') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm mới</p>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcan
        @can('list-bill')
        <li class="nav-item {{ request()->is('admin/bills*') ? ' menu-is-opening menu-open' : '' }}">
            <a href="" class="nav-link {{ request()->is('admin/bills*') ? 'active ' : '' }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Hóa đơn
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @can('list-bill')
                <li class="nav-item">
                    <a href="/admin/bill" class="nav-link {{ request()->is('admin/bill') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách</p>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcan
        <li class="nav-item {{ request()->is('admin/roles*') ? ' menu-is-opening menu-open' : '' }}">
            <a href="" class="nav-link {{ request()->is('admin/roles*') ? 'active ' : '' }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Vai trò
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/roles" class="nav-link {{ request()->is('admin/roles') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->