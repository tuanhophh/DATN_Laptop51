@extends('admin.layouts.main')
@section('title', 'Thống kê sản phẩm')
@section('content')
    <h3>Tìm kiếm</h3>
    <form action="" method="get">

        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <label for="">Bắt đầu</label>
                    <input type="text" id="datepicker" name="ngay-bd" placeholder="yyyy-mm-dd" class="form-control">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="">Kết thúc</label>
                    <input type="text" id="datepicker2" name="ngay-kt" placeholder="yyyy-mm-dd" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </div>

    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-2">Sản phẩm</th>
                <th class="col-2">tổng số lượng</th>
                <th class="col-3">sản phẩm đã nhập</th>
                
                <th class="col-3">sản phẩm đã bán</th>
                <th>tiền nhập</th>
                <th>tiền bán</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $item)
                <tr>
                    <th>
                        {{ $item->name }}
                    </th>
                    <th>{{ $item->qty }} </th>
                    
                    <th>
                        {{ array_sum(array_column($item->nhaphangsanpham->toArray(), 'qty')) }}

                    </th>
                    <th></th>
                <th>{{(array_sum(array_column($item->nhaphangsanpham->toArray(), 'qty')))*$item->import_price}}</th>
                <th>{{(array_sum(array_column($item->nhaphangsanpham->toArray(), 'qty')))*$item->price}}</th>
               
                </tr>
            @endforeach
<tr>
    <th>Tong</th>
    <th>{{$sum_product}}</th>
</tr>
            {{-- @foreach ($a as $item => $value)
                <tr>
                    <td>{{ $item + 1 }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
    <div id="myfirstchart" style="height: 250px;"></div>

    {{-- <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-4">Tháng</th>
                <th class="col-4">Số lượng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($a as $item => $value)
                <tr>
                    <td>{{ $item + 1 }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}


@endsection
@section('page-script')
    <script>
        // $(document).ready(function() {
        //     $.ajax({
        //         type: 'GET',
        //         url: "/admin/thongke/ajax",
        //         success: function(data) {
        //             console.log(data);
        //         }
        //     });
        //     return false;

        // });

        // <?php
        // echo "var data =' echo json_encode($product)'";
        // ?>
        // // data2=json(data);
        // console.log(data);

        new Morris.Bar({
            // ID of the element in which to draw the chart.
            element: 'myfirstchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [{
                    year: '2008',
                    value: 20
                },
                {
                    year: '2009',
                    value: 10
                },
                {
                    year: '2010',
                    value: 5
                },
                {
                    year: '2011',
                    value: 5
                },
                {
                    year: '2012',
                    value: 20
                }
            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'year',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Value']
        });
    </script>
@endsection
