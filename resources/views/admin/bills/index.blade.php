@extends('admin.layouts.main')
@section('title', 'Danh sách đặt hàng')
@section('content')

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Thông báo: </strong>{{ Session::get('success') }}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Thông báo: </strong>{{ Session::get('error') }}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<form action="{{ route('bill.index') }}" method="GET" class="row">
    <div class="col-1"></div>
    <div class="form-group col-3">
        <input type="text" class="form-control" name="code" id="" aria-describedby="helpId"
            placeholder="Tìm kiếm mã hóa đơn">
    </div>
    <div class="form-group col-3">
        <select name="type" class="form-control ">
            <option value="0"> Loại hóa đơn</option>
            <option value="1">Bán hàng</option>
            <option value="2"> Sửa chữa</option>
        </select>
    </div>
    <div class="form-group col-3">
        <select name="status" class="form-control ">
            <option value="0">Trạng thái</option>
            <option value="5">Chưa thanh toán</option>
            <option value="3">Xác nhận</option>
            <option value="4">Đang di chuyển</option>
            <option value="2">Đã thanh toán</option>
            <option value="1">Hủy</option>
        </select>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </div>
</form>
<div class="row">
    <div class="col-12">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>STT</th>
                    <th>Người mua</th>
                    <th>Mã hóa đơn</th>
                    <th>Loại hóa đơn</th>
                    <th>Tổng tiền</th>
                    <th>Thanh toán</th>
                    <th>Trạng thái</th>
                    <th>Ngày đặt</th>
                    <th>
                    </th>
                </thead>
                <tbody>
                    @foreach ($bills as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>Tên người mua</td>
                        <td>{{ $item->code }}</td>
                        <td>@if ($item->type==1)
                            <span class="text-info">Bán hàng</span>
                            @else
                            <span class="text-success">Sửa chữa</span>
                            @endif
                        </td>
                        <td>
                            <?php
                            if (!function_exists('currency_format')) {
                                function currency_format($item, $suffix = ' VNĐ')
                                    {
                                        if (!empty($item)) {
                                            return number_format($item, 0, ',', '.') . "{$suffix}";
                                        }
                                    }
                                }
                        ?>
                            {{ currency_format($item->total_price) }}
                        </td>
                        <td>{{ $item->method == 1 ? 'Tiền măt' : 'Chuyển khoản'}}</td>
                        <td>@if($item->status == 0)
                            <p class="text-info">Chưa thanh toán</p>

                            @elseif($item->status == 1)
                            <p class="text-danger">Hủy</p>
                            @elseif($item->status == 2)
                            <p class="text-success">Đã thanh toán</p>
                            @elseif($item->status == 3)
                            <p class="text-primary">Xác nhận</p>
                            @elseif($item->status == 4)
                            <p class="text-warning">Đang di chuyển</p>
                            @endif
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            @can('list-bill')

                            @if ($item->type==1)
                            <a href="{{route('bill.detail',['id' => $item->id])}}" class="btn btn-sm btn-success">Chi
                                tiết</a>
                            @else
                            <a href="{{route('dat-lich.hoa-don',['id' => $item->booking_detail_id])}}"
                                class="btn btn-sm btn-success">Chi
                                tiết</a>
                            @endif

                            @endcan
                            @can('edit-bill')
                            @if ($item->type==1)
                            @if($item->status != 2 && $item->status != 1)
                            <a href="{{ route('bill.edit', ['id' => $item->id]) }}"
                                class="btn btn-sm btn-warning">Sửa</a>
                            @endif
                            @endif
                            @endcan
                            @can('delete-bill')

                            <!-- <a class="text-secondary" data-toggle="modal" id="mediumButton"
                                data-target=".bd-example-modal-lg" data-attr="">
                                <i class="fas fa-edit text-gray-300"></i>
                            </a> -->
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h4 class="text-center ">
                @if($bills == NULL)
                Không có dữ liệu
                @endif
            </h4>
            <div class="d-flex justify-content-center">
                {{ $bills->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>


<script>
    // display a modal (medium modal)
$(document).on('click', '#mediumButton', function(event) {
    event.preventDefault();
    let href = $(this).attr('data-attr');
    $.ajax({
        url: href,
        beforeSend: function() {
            $('#loader').show();
        },
        // return the result
        success: function(result) {
            $('#largeModal').modal("show");
            $('#mediumBody').html(result).show();
        },
        complete: function() {
            $('#loader').hide();
        },
        error: function(jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
            $('#loader').hide();
        },
        timeout: 8000
    })
});
</script>

@endsection