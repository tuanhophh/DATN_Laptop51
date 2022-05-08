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
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>STT</th>
                        <th>Mã hóa đơn</th>
                        <th>Tổng tiền</th>
                        <th>Phương thức</th>
                        <th>Trạng thái</th>
                        <th>Ngày đặt</th>
                        <th>
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($bills as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->code }}</td>
                            <td>
                                <?php
                                // $total = str_replace('.', '', $item->total);
                                // $total= number_format($item->total, 2, ',', '.');
                                ?>
                                {{ $item->total }} VNĐ
                            </td>
                            <td>{{ $item->payment_method == 1 ? 'Tiền măt' : 'Chuyển khoản'}}</td>
                            <td>@if($item->payment_status == 0)
                                <p class="text-warning">Chưa thanh toán</p>

                                @elseif($item->payment_status == 1)
                                <p class="text-danger">Hủy</p>
                                @else
                                <p class="text-success">Đã thanh toán</p>
                                @endif
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                @can('list-bill')
                                <a href="{{route('bill.detail',['id' => $item->id])}}"
                                    class="btn btn-sm btn-success">Chi
                                    tiết</a>
                                @endcan
                                @can('edit-bill')
                                @if($item->payment_status != 2)
                                <a href="{{ route('bill.edit', ['id' => $item->id]) }}"
                                    class="btn btn-sm btn-warning">Sửa</a>
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