@extends('admin.layouts.main')
@section('title', 'Danh sách đặt hàng')
@section('content')

<?php
use App\Models\BillUser;
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

<!-- Font Awesome JS -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
    integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
</script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
    integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
</script>

<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
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
<div class="bg-white">
<div class="row">
    <div class="col-12">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>STT</th>
                    <th>Mã hóa đơn</th>
                    <th>Tổng tiền</th>
                    <th>Phương thức thanh toán</th>
                    <th>Trạng thái thanh toán</th>
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
                            <p class="text-danger">Thanh toán thất bại</p>
                            @else
                            <p class="text-success">Đã thanh toán</p>
                            @endif
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            @can('list-bill')
                            <a href="{{route('bill.detail',['id' => $item->id])}}" class="btn btn-sm btn-success">Chi
                                tiết</a>
                            @endcan
                            @can('edit-bill')

                            <a href="{{ route('bill.edit', ['id' => $item->id]) }}"
                                class="btn btn-sm btn-warning">Sửa</a>
                            @endcan
                            @can('delete-bill')

                            <a class="text-secondary" data-toggle="modal" id="mediumButton"
                                data-target=".bd-example-modal-lg" data-attr="">
                                <i class="fas fa-edit text-gray-300"></i>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $bills->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>


<!-- medium modal -->
<div class="modal fade bd-example-modal-lg" id="largeModal" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title font-weight-bold" id="exampleModalLabel">Chi tiét hóa đơn</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="mediumBody">
                <form action="" class="row-8">
                    <div class="form-group row">
                        <div class="form-group col">
                            <label for="inputEmail3" class="col-sm-3 col-form-label px-0">Mã hóa đơn: </label>
                            <div class="col-sm-8 pl-0">
                                <label for="inputEmail3" class="col-form-label px-0"></label>
                            </div>
                        </div>
                        <div class="form-group col px-0">
                            <label for="inputEmail3" class="col-sm-3 col-form-label px-0">Tên:
                            </label>
                            <div class="col-sm-8 pl-0">
                                <label for="inputEmail3" class="col-form-label px-0"></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col">
                            <label for="inputEmail3" class="col-sm-3 col-form-label px-0">Mã hóa đơn: </label>
                            <div class="col-sm-8 pl-0">
                                <label for="inputEmail3" class="col-form-label px-0"></label>
                            </div>
                        </div>
                        <div class="form-group col px-0">
                            <label for="inputEmail3" class="col-sm-3 col-form-label px-0">Tên:
                            </label>
                            <div class="col-sm-8 pl-0">
                                <label for="inputEmail3" class="col-form-label px-0"></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col">
                            <label for="inputEmail3" class="col-sm-3 col-form-label px-0">Mã hóa đơn: </label>
                            <div class="col-sm-8 pl-0">
                                <label for="inputEmail3" class="col-form-label px-0"></label>
                            </div>
                        </div>
                        <div class="form-group col px-0">
                            <label for="inputEmail3" class="col-sm-3 col-form-label px-0">Tên:
                            </label>
                            <div class="col-sm-8 pl-0">
                                <label for="inputEmail3" class="col-form-label px-0"></label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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