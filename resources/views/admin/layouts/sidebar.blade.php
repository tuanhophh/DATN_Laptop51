<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 text-center text-uppercase">
        {{-- @if(isset($_SESSION['AUTH']))
        <div class="image">
            <img src="{{ '/public/adminlte/'}}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{$_SESSION['AUTH']['name']}}</a>
        </div>
        @else --}}
        {{-- <div class="image">
            <img src="{{ '/public/adminlte/'}}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
                
                <li class="nav-item {{ request()->is('admin/category*') ? ' menu-is-opening menu-open' : '' }}">
                    <a href="" class="nav-link {{ request()->is('admin/category*') ? 'active ' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/category" class="nav-link {{ request()->is('admin/category') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/category/add" class="nav-link {{ request()->is('admin/category/add') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('admin/product*') ? ' menu-is-opening menu-open' : '' }}">
                    <a href="" class="nav-link {{ request()->is('admin/product*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Product
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/product" class="nav-link {{ request()->is('admin/product*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/product/add" class="nav-link {{ request()->is('admin/product/add') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>  
                
                <li class="nav-item {{ request()->is('admin/detail-product*') ? ' menu-is-opening menu-open' : '' }}">
                    <a href="" class="nav-link {{ request()->is('admin/detail-product*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Detail product
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/detail-product" class="nav-link {{ request()->is('admin/detail-product') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/detail-product/add" class="nav-link {{ request()->is('admin/detail-product/add') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>  
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    