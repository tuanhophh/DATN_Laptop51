@extends('admin.layouts.main')
@section('title', 'Thống kê sản phẩm')
@section('content')
    <h3>Tìm kiếm</h3>
    <form action="" method="get">

        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <label for="">Bắt đầu</label>
                    <input type="text" id="datepicker" name="ngay-bd" placeholder="yyyy-mm-dd" value="{{$request->get('ngay-bd')}}" class="form-control">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="">Kết thúc</label>
                    <input type="text" id="datepicker2" name="ngay-kt" placeholder="yyyy-mm-dd" value="{{$request->get('ngay-kt')}}" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                <a href="{{ route("thongke-sanpham") }}" class="btn btn-default">Reset</a>
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
        @foreach ($products as $item)
            <tr>
                <th>
                    {{ $item->name }}
                </th>
                <th>{{ $item->qty }} </th>

                <th class="product_imports">
                    {{ array_sum(array_column($item->nhaphangsanpham->toArray(), 'qty')) }}
                </th>
                <th class="products_sold"></th>
                <th class="import_money">{{(array_sum(array_column($item->nhaphangsanpham->toArray(), 'qty')))*$item->import_price}}</th>
                <th class="money_sold">{{(array_sum(array_column($item->nhaphangsanpham->toArray(), 'qty')))*$item->price}}</th>

            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td>Tổng</td>
            <td>{{$sum_product}}</td>
            <td class="result_product_imports"></td>
            <td class="result_products_sold"></td>
            <td class="result_import_money"></td>
            <td class="result_money_sold"></td>
        </tr>
        </tfoot>
    </table>
    {{ $products->links() }}

    <div class="mt-5">
        <h4>Sản phẩm đã bán</h4>
        <div id="myfirstchart" style="height: 250px;"></div>
    </div>


@endsection
@section('page-script')
    <script>
        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                data: {
                  start_date: $("input[name='ngay-bd']").val(),
                  end_date: $("input[name='ngay-kt']").val()
                },
                url: "/admin/thongke/ajax",
                success: function(data) {
                    new Morris.Bar({
                        // ID of the element in which to draw the chart.
                        element: 'myfirstchart',
                        // Chart data records -- each entry in this array corresponds to a point on
                        // the chart.
                        data: data,
                        // The name of the data record attribute that contains x-values.
                        xkey: 'time',
                        // A list of names of data record attributes that contain y-values.
                        ykeys: ['value'],
                        // Labels for the ykeys -- will be displayed when you hover over the
                        // chart.
                        labels: ['Value']
                    });
                    console.log(data);
                }
            });
            return false;
        });

        let product_imports = 0;
        let products_sold = 0;
        let import_money = 0;
        let money_sold = 0;
        $(".product_imports").each(function () {
            product_imports += parseInt($(this).text())
        })
        $(".products_sold").each(function () {
            products_sold += parseInt($(this).text())
        })
        $(".import_money").each(function () {
            import_money += parseInt($(this).text())
        })
        $(".money_sold").each(function () {
            money_sold += parseInt($(this).text())
        })
        $(".result_product_imports").text(product_imports)
        $(".result_products_sold").text(products_sold)
        $(".result_import_money").text(import_money)
        $(".result_money_sold").text(money_sold)

    </script>
@endsection
