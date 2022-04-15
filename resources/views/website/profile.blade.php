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
    <div class="container pt-6">
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
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{$user->name}}</h4>
                                                <p class="mb-0">{{$user->email}}</p>
                                                <!-- <div class="text-muted"><small>Last seen 2 hours ago</small></div> -->
                                                <div class="mt-2">
                                                    <form enctype="multipart/form-data"
                                                        action="{{URL::to('/profile/update-avatar')}}"
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
                                                <span class="badge badge-secondary">{{$user->role}}</span>
                                                <div class="text-muted"><small>Ngày gia nhập:
                                                        {{ $user->created_at->format('d-m-Y')}}</small></div>
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
                                        <li class="nav-item"><a href="" class="text-dark active nav-link">Thông tin</a>
                                        </li>
                                        <li class="nav-item"><a href="" class="text-dark nav-link">Hóa đơn</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            <form class="form" enctype="multipart/form-data"
                                                action="{{URL::to('/profile/update-info')}}" method="POST"
                                                novalidate="">
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="p-0 m-0">Họ và tên</label>
                                                                    @error('name')
                                                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                                                    @enderror
                                                                    <input class="form-control" type="text" name="name"
                                                                        value="{{$user->name}}">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="p-0 m-0">Số điện thoại</label>
                                                                    <input class="form-control" type="text" name="phone"
                                                                        placeholder="Số điện thoại"
                                                                        value="{{$user->phone}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="p-0 m-0">Email</label>
                                                                    @error('email')
                                                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                                                    @enderror
                                                                    <input class="form-control" type="text" name="email"
                                                                        value="{{$user->email}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="p-0 m-0">Địa chỉ</label>
                                                                    <input class="form-control" type="text"
                                                                        name="address" value="{{$user->address}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col mb-3">
                                                                <div class="form-group">
                                                                    <label class="p-0 m-0">Ghi chú</label>
                                                                    <textarea class="form-control text-dark"
                                                                        name="description"
                                                                        rows="5">{{$user->description}}</textarea>
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
                                                action="{{URL::to('/profile/update-password')}}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 mb-3">
                                                        <div class="mb-2"><b>Đổi mật khẩu</b></div>
                                                        <div class="row">



                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="p-0 m-0">Mật khẩu cũ</label>
                                                                    @error('current_password')
                                                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
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
                                                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                                                    @enderror
                                                                    <input class="form-control" type="password"
                                                                        name="password" placeholder="Nhập mật khẩu mới">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="p-0 m-0">Xác nhận mật khẩu mới</label>
                                                                    @error('confirm_password')
                                                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
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