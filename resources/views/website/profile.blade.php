<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bệnh Viện Laptop 51</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

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
                            <h1 class="breadcrumbs-title">Tài Khoản Của Tôi</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container pt-6">
        <div class="row flex-lg-nowrap">
            <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
                <div class="card p-3">
                    <div class="e-navlist e-navlist--active-bg">
                        <!-- <ul class="nav">
                            <li class="nav-item"><a class="nav-link px-2 active" href="#"><i
                                        class="fa fa-fw fa-bar-chart mr-1"></i><span>Overview</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2"
                                    href="https://www.bootdey.com/snippets/view/bs4-crud-users" target="__blank"><i
                                        class="fa fa-fw fa-th mr-1"></i><span>CRUD</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2"
                                    href="https://www.bootdey.com/snippets/view/bs4-edit-profile-page"
                                    target="__blank"><i class="fa fa-fw fa-cog mr-1"></i><span>Settings</span></a>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="e-profile">
                                    <div class="row">
                                        <div class="col-12 col-sm-auto mb-3">
                                            <div class="mx-auto">

                                                <div class="align-items-center rounded-circle">

                                                    <span style="font: bold 8pt Arial;">
                                                        <div class="photo-img rounded-circle" id="image_user"
                                                            style="background-size: 150px 150px;width: 150px;height: 150px;background-image:url('{{ asset($user->avatar) }}');">
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $user->name }}</h4>
                                                <p class="mb-0">{{ $user->email }}</p>
                                                <!-- <div class="text-muted"><small>Last seen 2 hours ago</small></div> -->
                                                <div class="mt-2">
                                                    <form enctype="multipart/form-data"
                                                        action="{{ URL::to('/profile/update-avatar') }}"
                                                        id="user_save_profile_form" method="POST">
                                                        @csrf

                                                        <label for="firstimg" class="btn btn-info m-0">
                                                            Thay ảnh
                                                        </label>
                                                        <!-- <span class="change_photo" id="files" style="visibility:none;"
                                                            for="profile_pic">Thay ảnh</span> -->
                                                        <input style="display: none;visibility: none;" type="file"
                                                            onchange="doAfterSelectImage(this)" id="firstimg"
                                                            name="avatar">
                                                        <button type="submit" class="btn btn-success m-0">Lưu</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="text-center text-sm-right">
                                                <span class="badge badge-secondary">{{ $user->role }}</span>
                                                <div class="text-muted"><small>Ngày gia nhập:
                                                        {{ $user->created_at->format('d-m-Y') }}</small></div>
                                            </div>
                                        </div>
                                    </div>
                                    @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('message') }}.
                                    </div>
                                    @endif
                                    @if (Session::has('current_password'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('current_password') }}.
                                    </div>
                                    @endif

                                    @error('avatar')
                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                    @enderror
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="" class="text-dark active nav-link">Thông
                                                tin</a>
                                        </li>
                                        <li class="nav-item"><a href="" class="text-dark nav-link">Hóa đơn</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            <form class="form" enctype="multipart/form-data"
                                                action="{{ URL::to('/profile/update-info') }}" method="POST"
                                                novalidate="">
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="p-0 m-0">Họ và tên</label>
                                                                    @error('name')
                                                                    <p class="text-danger p-0 m-0">{{ $message }}
                                                                    </p>
                                                                    @enderror
                                                                    <input class="form-control" type="text" name="name"
                                                                        value="{{ $user->name }}">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="p-0 m-0">Số điện thoại</label>
                                                                    <input class="form-control" type="text" name="phone"
                                                                        placeholder="Số điện thoại"
                                                                        value="{{ $user->phone }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="p-0 m-0">Email</label>
                                                                    @error('email')
                                                                    <p class="text-danger p-0 m-0">{{ $message }}
                                                                    </p>
                                                                    @enderror
                                                                    <input class="form-control" type="text" name="email"
                                                                        value="{{ $user->email }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="p-0 m-0">Địa chỉ</label>
                                                                    <input class="form-control" type="text"
                                                                        name="address" value="{{ $user->address }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col mb-3">
                                                                <div class="form-group">
                                                                    <label class="p-0 m-0">Ghi chú</label>
                                                                    <textarea class="form-control text-dark"
                                                                        name="description"
                                                                        rows="5">{{ $user->description }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col d-flex justify-content-end">
                                                    <button class="btn btn-success" type="submit">Lưu thay đổi</button>
                                                </div>
                                            </form>
                                            <form class="form" enctype="multipart/form-data"
                                                action="{{ URL::to('/profile/update-password') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 mb-3">
                                                        <div class="mb-2"><b>Đổi mật khẩu</b></div>
                                                        <div class="row">



                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="p-0 m-0">Mật khẩu cũ</label>
                                                                    @error('current_password')
                                                                    <p class="text-danger p-0 m-0">{{ $message }}
                                                                    </p>
                                                                    @enderror
                                                                    <input class="form-control" name="current_password"
                                                                        type="password" placeholder="Nhập mật khẩu cũ">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="p-0 m-0">Mật khẩu mới</label>
                                                                    @error('password')
                                                                    <p class="text-danger p-0 m-0">{{ $message }}
                                                                    </p>
                                                                    @enderror
                                                                    <input class="form-control" type="password"
                                                                        name="password" placeholder="Nhập mật khẩu mới">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="p-0 m-0">Xác nhận mật khẩu
                                                                        mới</label>
                                                                    @error('confirm_password')
                                                                    <p class="text-danger p-0 m-0">{{ $message }}
                                                                    </p>
                                                                    @enderror
                                                                    <input class="form-control" name="confirm_password"
                                                                        type="password"
                                                                        placeholder="Nhập lại mậu khẩu mới">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col d-flex justify-content-end">
                                                                <button class="btn btn-success" type="submit">Đổi mật
                                                                    khẩu</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                                        <!-- <div class="mb-2"><b>Keeping in Touch</b></div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label>Email Notifications</label>
                                                                <div class="custom-controls-stacked px-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="notifications-blog" checked="">
                                                                        <label class="custom-control-label"
                                                                            for="notifications-blog">Blog
                                                                            posts</label>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="notifications-news" checked="">
                                                                        <label class="custom-control-label"
                                                                            for="notifications-news">Newsletter</label>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="notifications-offers" checked="">
                                                                        <label class="custom-control-label"
                                                                            for="notifications-offers">Personal
                                                                            Offers</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 mb-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="px-xl-3">
                                    <i class="fa fa-sign-out"></i>
                                    <button class="btn btn-block btn-secondary">
                                        <a class="text-white" href="/logout"> <span>Đăng xuất</span></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <!-- <div class="card-body">
                                <h6 class="card-title font-weight-bold">Support</h6>
                                <p class="card-text">Get fast, free help from our friendly assistants.</p>
                                <button type="button" class="btn btn-primary">Contact Us</button>
                            </div> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
    <div class="container pt-6">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset($user->avatar) }}"
                                        alt="User profile picture">
                                    <div class="mt-2">
                                        <form enctype="multipart/form-data"
                                            action="{{ URL::to('/profile/update-avatar') }}" id="user_save_profile_form"
                                            method="POST">
                                            @csrf

                                            <label for="firstimg" class="btn btn-info m-0">
                                                Thay ảnh
                                            </label>
                                            <!-- <span class="change_photo" id="files" style="visibility:none;"
                                                    for="profile_pic">Thay ảnh</span> -->
                                            <input style="display: none;visibility: none;" type="file"
                                                onchange="doAfterSelectImage(this)" id="firstimg" name="avatar">
                                            <button type="submit" class="btn btn-success m-0">Lưu</button>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                                <p class="text-muted text-center">(
                                    @if ($user->id_role == 1)
                                    Khách hàng
                                    @elseif($user->id_role == 2)
                                    Thợ sửa
                                    @elseif($user->id_role == 3)
                                    Lễ tân
                                    @elseif($user->id_role == 4)
                                    Kế toán
                                    @else
                                    Admin
                                    @endif
                                    )
                                </p>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa Chỉ</strong>

                                <p class="text-muted">{{ $user->address }}</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Số điện thoại</strong>

                                <p class="text-muted">{{ $user->phone }}</p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Email</strong>

                                <p class="text-muted">{{ $user->email }}</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity"
                                            data-toggle="tab">Lịch sử mua hàng</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Lịch sử
                                            đặt lịch</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Cài
                                            đặt</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->

                                        <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->


                                            @if ($bill->toArray() == [])
                                            <div class="text-center">
                                                <h3>hiện tại bạn chưa có đơn hàng nào.</h3>
                                                <a href="{{ asset('') }}cua-hang">
                                                    <b>Đặt hàng ngay</b>
                                                </a>
                                            </div>
                                            @else
                                            @foreach ($bill as $item)
                                            <div class="time-label">
                                                <p>
                                                    Ngày mua: {{ $item->created_at }}
                                                </p>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <div class="timeline-item">

                                                    <div class="row">
                                                        <div class="col-3">
                                                            <a href=""><img src="{{ asset($item->image) }}" alt=""
                                                                    style="background-size: 150px 150px;width: 200px;height: 170px;"></a>
                                                        </div>
                                                        <div class="col-7">
                                                            <h3 class="timeline-header"><a href="#">{{ $item->name
                                                                    }}</a>
                                                            </h3>
                                                            <div class="timeline-body">
                                                                Etsy doostang zoodles disqus groupon greplin
                                                                oooj
                                                                voxy
                                                                zoodles,
                                                                weebly ning heekya handango imeem plugg dopplr
                                                                jibjab,
                                                                movity
                                                                jajah plickers sifteo edmodo ifttt zimbra.
                                                                Babblely
                                                                odeo
                                                                kaboodle
                                                                quora plaxo ideeli hulu weebly balihoo...
                                                            </div>
                                                            <br>
                                                            <div class="timeline-footer">
                                                                <div class="row flex">
                                                                    <div class="col-6">Sản phẩm:
                                                                        {{ $item->qty }}</div>
                                                                    <div class="col-4 ">
                                                                        <b class="text-danger"
                                                                            style="font-size: 20px"><i>{{ $item->price *
                                                                                $item->qty }}
                                                                                VNĐ </i></b>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="timeline-footer">
                                                                <a href="{{ route('profile.history.detail', ['code' => $item->bill_code]) }}"
                                                                    class="button extra-small">
                                                                    <span class="text-uppercase">Chi tiết</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <hr>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                            @endforeach
                                            @endif

                                        </div>

                                        <!-- /.post -->
                                    </div>
                                    <div class="tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">

                                            {{-- @if ($bill->toArray() == [])
                                            <div class="text-center">
                                                <h3>hiện tại bạn chưa có đơn hàng nào.</h3>
                                                <a href="">
                                                    <b>Đặt hàng ngay</b>
                                                </a>
                                            </div>
                                            @else
                                            @foreach ($bill_sc as $item)
                                            <div class="time-label">
                                                <p>
                                                    Ngày đặt lịch: 10-4-2022
                                                </p>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <div class="timeline-item">

                                                    <div class="row">
                                                        <div class="col-3 flex text-center">
                                                            <a href=""><img
                                                                    src="{{ asset('client') }}/img/icon/icon.png" alt=""
                                                                    style="background-size: 110px 110px;width: 170px;height: 140px;"></a>
                                                        </div>
                                                        <div class="col-7">
                                                            <h3 class="timeline-header"><a href="#">Sửa chữa
                                                                    Laptop</a>
                                                            </h3>
                                                            <div class="timeline-body">
                                                                {{ $item->desc }}
                                                            </div>
                                                            <br>
                                                            <div class="timeline-footer">
                                                                <div class="row flex">
                                                                    <div class="col-6">Sản phẩm:
                                                                        {{ $item->qty }}</div>
                                                                    <div class="col-4 ">
                                                                        <b class="text-danger"
                                                                            style="font-size: 20px"><i>{{ $item->price *
                                                                                $item->qty }}
                                                                                VNĐ </i></b>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="timeline-footer">
                                                                <a href="{{ route('profile.history.detail', ['code' => $item->bill_code]) }}"
                                                                    class="button extra-small">
                                                                    <span class="text-uppercase">Chi tiết</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <hr>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                            @endforeach
                                            @endif --}}


                                            <!-- timeline time label -->
                                            <div class="time-label">
                                                <p>
                                                    Ngày đặt lịch: 10-4-2022
                                                </p>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <div class="timeline-item">

                                                    <div class="row">
                                                        <div class="col-3 flex text-center">
                                                            <a href=""><img
                                                                    src="{{ asset('client') }}/img/icon/icon.png" alt=""
                                                                    style="background-size: 110px 110px;width: 170px;height: 140px;"></a>
                                                        </div>
                                                        <div class="col-7">
                                                            <h3 class="timeline-header"><a href="#">Sửa chữa Laptop</a>
                                                            </h3>
                                                            <div class="timeline-body">
                                                                Etsy doostang zoodles disqus groupon greplin
                                                                oooj
                                                                voxy
                                                                zoodles,
                                                                weebly ning heekya handango imeem plugg dopplr
                                                                jibjab,
                                                                movity
                                                                jajah plickers sifteo edmodo ifttt zimbra.
                                                                Babblely
                                                                odeo
                                                                kaboodle
                                                                quora plaxo ideeli hulu weebly balihoo...
                                                            </div>
                                                            <br>
                                                            <div class="timeline-footer">
                                                                <div class="row flex">
                                                                    <div class="col-6">Sản phẩm:
                                                                        1</div>
                                                                    <div class="col-4 ">
                                                                        <b class="text-danger"
                                                                            style="font-size: 20px"><i>99999
                                                                                VNĐ </i></b>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="timeline-footer">
                                                                <a href="" class="button extra-small">
                                                                    <span class="text-uppercase">Chi tiết</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <hr>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal">
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Tên</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName"
                                                        placeholder="Tên..." value="{{ $user->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputEmail"
                                                        placeholder="Email..." value="{{ $user->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Số điện
                                                    thoại</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName2"
                                                        placeholder="Số điện thoại..." value="{{ $user->phone }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Địa chỉ</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName2"
                                                        placeholder="Địa chỉ..." value="{{ $user->address }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label">Mô
                                                    tả</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" id="inputExperience"
                                                        placeholder="Experience">{{ $user->description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit"
                                                        class="submit-btn-1 mt-30 btn-hover-1">Lưu</button>
                                                </div>
                                            </div>
                                        </form>
                                        <form class="form" enctype="multipart/form-data"
                                            action="{{ URL::to('/profile/update-password') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class=" mb-3">
                                                    <div class="mb-2"><b>Đổi mật khẩu</b></div>
                                                    <div class="row">



                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label class="p-0 m-0">Mật khẩu cũ</label>
                                                                @error('current_password')
                                                                <p class="text-danger p-0 m-0">{{ $message }}
                                                                </p>
                                                                @enderror
                                                                <input class="form-control" name="current_password"
                                                                    type="password" placeholder="Nhập mật khẩu cũ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label class="p-0 m-0">Mật khẩu mới</label>
                                                                @error('password')
                                                                <p class="text-danger p-0 m-0">{{ $message }}
                                                                </p>
                                                                @enderror
                                                                <input class="form-control" type="password"
                                                                    name="password" placeholder="Nhập mật khẩu mới">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label class="p-0 m-0">Xác nhận mật khẩu
                                                                    mới</label>
                                                                @error('confirm_password')
                                                                <p class="text-danger p-0 m-0">{{ $message }}
                                                                </p>
                                                                @enderror
                                                                <input class="form-control" name="confirm_password"
                                                                    type="password" placeholder="Nhập lại mậu khẩu mới">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="submit-btn-1 mt-30 btn-hover-1"
                                                                type="submit">Đổi mật
                                                                khẩu</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                                    <!-- <div class="mb-2"><b>Keeping in Touch</b></div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label>Email Notifications</label>
                                                                <div class="custom-controls-stacked px-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="notifications-blog" checked="">
                                                                        <label class="custom-control-label"
                                                                            for="notifications-blog">Blog
                                                                            posts</label>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="notifications-news" checked="">
                                                                        <label class="custom-control-label"
                                                                            for="notifications-news">Newsletter</label>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="notifications-offers" checked="">
                                                                        <label class="custom-control-label"
                                                                            for="notifications-offers">Personal
                                                                            Offers</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->

                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>


    @include('layout_client.footer')
    @include('layout_client.script')


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
</script>
<script>
    function doAfterSelectImage(input) {
        readURL(input);
    }

    function readURL(input) {
        if (input.files) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image_user').css('background-image', 'url(' + e.target.result + ')');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</html>