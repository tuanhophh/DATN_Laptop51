@extends('admin.layouts.main')
@section('title', 'Danh sách sản phẩm')
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
<a class="btn btn-warning" href="{{ route('export-product') }}">Export Data</a>
<a class="btn btn-info" href="{{ route('view-import-product') }}">Import Data</a>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th class="px-0 text-center" style="width: 1px;">STT</th>
                        <th style="max-width: 480px;">Tên</th>
                        <th>Hãng</th>
                        <th>Giá mua</th>
                        <th>Giá bán</th>
                        <th>Số lượng</th>
                        <th class="px-0 text-center">Bảo hành</th>
                        <th class="px-0 text-center">Trạng thái</th>
                        <th>
                            @can('add-product')
                            <a class="btn btn-sm btn-info" href="{{ route('product.add') }}">Thêm</a>
                            @endcan
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        <tr>
                            <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                            <td style="max-width: 480px;">{{ $item->name }}</td>
                            <td>
                                {{ $item->companyComputer->company_name }}
                            </td> 
                            <td>{{ $item->import_price }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->insurance }} tháng</td>
                            <td>
                             {{ $item->status == 1 ? 'Đang hiện ' : 'Đang ẩn' }}
                            </td>
                            <td>
                                @can('edit-product')
                                <!-- <a href="{{ route('nhap-sanpham.add', ['id' => $item->id]) }}"
                                    class="btn btn-sm btn-success">Thêm SL</a> -->

                                    <a href="{{ route('product.edit', ['id' => $item->id]) }}"
                                        class="btn btn-sm btn-warning">Sửa</a>
                                    @endcan
                                    @can('delete-product')
                                    @if($item->status === 0)
                                    <form class="d-inline" action="product/show-hide/{{$item->id}}" method="POST">
                                        @csrf
                                        <input name="id" hidden value="{{$item->id}}">
                                        <button style="font:14px" class="btn btn-sm btn-success" type="submit">
                                            Hiện
                                        </button>
                                    </form>
                                    @endif
                                    @if($item->status === 1)
                                    <form class="d-inline" action="product/show-hide/{{$item->id}}" method="POST">
                                        @csrf
                                        <input name="id" hidden value="{{$item->id}}">
                                        <button class="btn btn-sm btn-danger" type="submit">
                                            Ẩn
                                        </button>
                                    </form>
                                    @endif
                                    @endcan
                                

                                <!-- <a onclick="return confirm('Bạn có chắc muốn xóa')"
                                    href="{{route('product.remove', ['id' => $item->id])}}"
                                    class="btn btn-sm btn-danger">Xóa</a>  -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $products->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection