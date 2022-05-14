@extends('admin.layouts.main')
@section('title', 'Trang chủ')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class='row'>
            <div class="col-6">

            </div>
            <div class='col-6 mb-5'>
                <label for="datetimestart">Bắt đầu</label>
                <input type="date" id="datetimestart" name="datetimestart" class="btn btn-light mr-3">
                <label for="datetimeend">Kết thúc</label>
                <input type="date" id="datetimeend" name="datetimeend" class="btn btn-light mr-3">
                <button type="button" id="search_date" class="btn btn-primary">tìm kiếm</button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id='total_category'>{{ $total_category }}</h3>
                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 id='total_product'>{{ $total_product }}</h3>
                        <p>Product</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('thongke-sanpham') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-Info">
                    <div class="inner">
                        <h3 id='total_user'>{{ $total_user }}</h3>
                        <p>User</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('thongke-sanpham') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 id='total_order'>{{ $total_bill }}</h3>
                        <p>Order</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('thongke-order') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 id='total_huy'>{{ $total_huy }}</h3>
                        <p>Đơn hàng hủy</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('thongke-doanhthu') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Top sản phẩm bán chạy</h5>
                    </div>
                    <div class="card-body">

                        <ul class="list-group" id='listtopdata'>
                            @foreach ($datasanphamban as $key => $sanpham)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $sanpham[0]['name'] }}
                                <span class="badge badge-primary badge-pill">{{ $sanpham[0]['quaty'] }}</span>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Top nhân viên sửa chữa</h5>
                    </div>
                    <div class="card-body">

                        <ul class="list-group" id='listtopdatanhanvien'>
                            @foreach ($datanhanvien as $key => $nhanvien)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $nhanvien[$key]['name'] }}
                                <span class="badge badge-primary badge-pill">{{ $nhanvien[$key]['quaty'] }}</span>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tổng doanh thu: <span id='tongdoanhthu'>
                                {{ $doanhthutong }}</span>
                            Vnđ</h5>
                        <input type="button" style="display:none" id='sotiennhap' value="{{ $sotiennhap }}">
                        <input type="button" style="display:none" id='sotienlai' value="{{ $sotienlai }}">
                        <canvas id="doanhthuchart">

                        </canvas>
                    </div>
                </div>

            </div>
            <div class='col-6'>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tổng doanh thu sửa chữa: <span id='tongdoanhthusuachua'>
                                {{ $doanhthusuachua }}</span>
                            Vnđ</h5>
                        <input type="button" style="display:none" id='sotiennhapsuachua'
                            value="{{ $sotiennhapsuachua }}">
                        <input type="button" style="display:none" id='sotienlaisuachua' value="{{ $sotienlaisuachua }}">
                        <canvas id="doanhthusuachua">

                        </canvas>
                    </div>
                </div>
            </div>
            <div class='col-6'>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tổng doanh thu bán: <span id='doanhthutongban'>
                                {{ $doanhthutongban }}</span>
                            Vnđ</h5>
                        <input type="button" style="display:none" id='sotiennhapban' value="{{ $sotiennhapban }}">
                        <input type="button" style="display:none" id='sotienlaiban' value="{{ $sotienlaiban }}">
                        <canvas id="doanhthuban">

                        </canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection