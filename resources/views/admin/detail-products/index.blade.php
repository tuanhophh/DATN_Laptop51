@extends('admin.layouts.main')
@section('title','Chi tiết sản phẩm')
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
    <a class="btn btn-warning" href="{{ route('export-detail-product') }}">Export Data</a>
    <a class="btn btn-info" href="{{ route('view-import-detail-product') }}">Import Data</a>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Từ khóa</label>
                                <input type="text" class="form-control" name="keyword"
                                    value="{{ $searchData['keyword'] }}" placeholder="Tìm theo tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="">ComputerCompany</label>
                                <select name="product_id" class="form-control">
                                    <option value="">Tất cả</option>
                                    @foreach ($ComputerCompany as $item)
                                        <option @if ($item->id == $searchData['companyComputer_id']) selected @endif
                                            value="{{ $item->id }}">{{ $item->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Tên cột</label>
                            <select name="column_names" class="form-control">
                                @foreach ($column_names as $key => $item)
                                <option @if ($key==$searchData['column_names']) selected @endif value="{{ $key }}">
                                    {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
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
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </div>
            </form>
            </div>
            <div class="card-body">
                <table class="table table-stripped">
                    <thead>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Desc</th>
                        <th>Status</th>
                        <th>
                            <a href="{{route('detail-product.add')}}">Add new</a>
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($details as $item)
                            <tr>
                                <td>{{($details->currentPage() - 1)*$details->perPage() + $loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    {{$item->products->name}}
                                </td>
                                <td>
                                    <img src="{{asset($item->image)}}" width="100">
                                </td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->desc}}</td>
                                <td>{{$item->status==1?"Còn hàng" :"Hết hàng"}}</td>
                                <td>
                                    <a href="{{route('detail-product.edit', ['id' => $item->id])}}" class="btn btn-sm btn-primary">Edit</a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa')" href="{{route('detail-product.remove', ['id' => $item->id])}}" class="btn btn-sm btn-danger">Remove</a>
                                </td>
                            </tr>
                        @endforeach                        
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$details->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection