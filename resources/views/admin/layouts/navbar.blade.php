<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li> --}}
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/logout" class="nav-link">LogOut</a>
        </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" class="" id="idCount" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge pending NotificationBadge" id="NotificationBadge">{{Auth::user()->unreadNotifications()->count()}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="dropdown-notification">
                @foreach (Auth::user()->notifications as $notification)
                <a href="{{$notification->data['url']}}" @if($notification->unread()) style="background:#f8f9fa;" @endif class="dropdown-item">
                {{ $notification->data['title'] }}
                    <span class="float-right text-muted text-sm text-info">@if($notification->unread()) <i class="fas fa-star"></i> @endif</span>
                </a>
                @endforeach
                
                <div class="dropdown-divider"></div>
                <!-- <a href="#" class="dropdown-item dropdown-footer">Đánh dấu đã đọc tất cả</a> -->
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>