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
                <form action="" method="get">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Từ khóa</label>
                                <input type="text" class="form-control" name="keyword"
                                    value="{{ $searchData['keyword'] }}" placeholder="Tìm theo tên sản phẩm">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Tên cột</label>
                                <select name="column_names" class="form-control">
                                    @foreach ($column_names as $key => $item)
                                    <option @if ($key==$searchData['column_names']) selected @endif value="{{ $key }}">
                                        {{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Hãng</label>
                                <select name="companyComputer_id" class="form-control">
                                    <option value="">Tất cả</option>
                                    @foreach ($ComputerCompany as $item)
                                    <option @if ($item->id == $searchData['companyComputer_id']) selected @endif
                                        value="{{ $item->id }}">{{ $item->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Sắp xếp theo</label>
                                <select name="order_by" class="form-control">
                                    @foreach ($order_by as $key => $item)
                                    <option @if ($key==$searchData['order_by']) selected @endif value="{{ $key }}">{{
                                        $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2 d-flex pt-3 align-items-center justify-content-end">
                            <button class="btn btn-primary" style="width: 120px; height: 40px;" type="submit">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th class="px-0 text-center" style="width: 1px;">STT</th>
                        <th>Tên</th>
                        <th>Slug</th>
                        <th>Giá mua</th>
                        <th>Giá bán</th>
                        <th class="px-0 text-center">Bảo hành</th>
                        <th class="px-0 text-center">Trạng thái</th>
                        <th>
                            @can('add-product')
                            <a class="btn btn-info" href="{{ route('product.add') }}">Thêm</a>
                            @endcan
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        <tr>
                            <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->slug }}</td>
                            <!-- <td>
                                {{ $item->companyComputer->company_name }}
                            </td>
                            <td>
                                <img src="{{ asset($item->image) }}" width="100">
                            </td> -->
                            <td>{{ $item->import_price }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->insurance }}</td>
                            <td>{{ $item->status == 1 ? 'Hiển thị' : 'Không hiển thị' }}</td>
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
                                    <button style="font:14px" class="btn btn-danger" type="submit">
                                        Hiện
                                    </button>
                                </form>
                                @endif
                                @if($item->status === 1)
                                <form class="d-inline" action="product/show-hide/{{$item->id}}" method="POST">
                                    @csrf
                                    <input name="id" hidden value="{{$item->id}}">
                                    <button class="btn btn-secondary" type="submit">
                                        Ẩn
                                    </button>
                                </form>
                                @endif
                                @endcan
                                <!-- <a onclick="return confirm('Bạn có chắc muốn xóa')"
                                    href="{{route('product.remove', ['id' => $item->id])}}"
                                    class="btn btn-sm btn-danger">Xóa</a> -->
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