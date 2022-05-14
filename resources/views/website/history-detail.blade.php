<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lịch sử chi tiết</title>
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

                                <p class="text-muted text-center">{{ $user->id_role }}</p>


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
                                    <li class="nav-item">
                                        <h3>Quay lại </h3>
                                    </li>
                                    <li class="nav-item">
                                        <h3> / Thông tin đơn hàng</h3>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="settings">
                                        <form class="form-horizontal">
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-4 col-form-label">
                                                    <label for="">Thời gian: {{ $user->created_at }}
                                                    </label>
                                                    <a href=""><img src="{{ asset($user->avatar) }}" alt="" style=""
                                                            width="200" height="200"></a>
                                                </label>
                                                <div class="col-sm-6">
                                                    <label for="">
                                                        <b class="text-dark">Mã hóa đơn: </b> {{ $user->name }}
                                                    </label>
                                                    <br>
                                                    <label for="">
                                                        <h2><b class="text-dark">Tên sản phẩm:</b>
                                                            <a href=""> {{ $user->name }}</a>
                                                        </h2>
                                                    </label>
                                                    <br>
                                                    <label for=""> <b class="text-dark">Địa chỉ nhận
                                                            hàng: </b>
                                                        <br>
                                                        {{ $user->name }} <br>
                                                        {{ $user->phone }} <br>
                                                        {{ $user->address }}
                                                    </label>
                                                    <br>
                                                    <label for="">
                                                        <b class="text-dark">Số lượng sản phẩm:</b>
                                                        x{{ $user->name }}
                                                    </label>
                                                    <label for="">
                                                        <b class="text-dark">Giá sản phẩm:</b>
                                                        {{ $user->name }} vnđ
                                                    </label>
                                                    <br>
                                                    <label for="">
                                                        <b class="text-dark">Phương thức thanh toán: </b>
                                                        <br> Thanh toán khi nhận hàng
                                                    </label><br>
                                                </div>
                                                <div class="   col-sm-2">
                                                    <label for=""> <a href="" class="text-success">Hoàn
                                                            thành</a>
                                                    </label>
                                                </div>

                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-4 col-form-label">
                                                    <label for="">Thời gian: {{ $user->created_at }}
                                                    </label>
                                                    <a href=""><img src="{{ asset($user->avatar) }}" alt="" style=""
                                                            width="200" height="200"></a>
                                                </label>
                                                <div class="col-sm-6">
                                                    <label for="">
                                                        <b class="text-dark">Mã hóa đơn: </b> {{ $user->name }}
                                                    </label>
                                                    <br>
                                                    <label for="">
                                                        <h2><b class="text-dark">Tên sản phẩm:</b>
                                                            <a href="">{{ $user->name }}</a>
                                                        </h2>
                                                    </label>
                                                    <br>
                                                    <label for=""> <b class="text-dark">Địa chỉ nhận
                                                            hàng: </b>
                                                        <br>
                                                        {{ $user->name }} <br>
                                                        {{ $user->phone }} <br>
                                                        {{ $user->address }}
                                                    </label>
                                                    <br>
                                                    <label for="">
                                                        <b class="text-dark">Số lượng sản phẩm:</b>
                                                        x{{ $user->name }}
                                                    </label>
                                                    <label for="">
                                                        <b class="text-dark">Giá sản phẩm:</b>
                                                        {{ $user->name }} vnđ
                                                    </label>
                                                    <br>
                                                    <label for="">
                                                        <b class="text-dark">Phương thức thanh toán: </b>
                                                        <br> Thanh toán khi nhận hàng
                                                    </label><br>
                                                </div>
                                                <div class="   col-sm-2">
                                                    <label for=""> <a href="" class="text-success">Hoàn
                                                            thành</a>
                                                    </label>
                                                </div>

                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="submit-btn-1 mt-30 btn-hover-1">Mua
                                                        Lại</button>
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
<<<<<<< HEAD=======>>>>>>> 51f57a4c57d04ca008b0f5ceb896ea00de03fb2e