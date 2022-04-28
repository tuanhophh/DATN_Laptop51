@extends('admin.layouts.main')
@section('title', 'Chi tiết đơn hàng')
@section('content')


    <div class="row text-center">
        <div class="ml-2 mb-2">Mã đơn hàng: {{$code}}</div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá tiền</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                        </thead>
                        <tbody>
                            @foreach ($bill as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td><img src="{{asset($item->image)}}" width="100"></td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{$item->price*$item->qty}}</td>
                                    {{-- <td><a href="{{route('profile.history.detail',['code'=>$item->bill_code])}}" class="btn btn-info">Chi tiết</a></td>
                                    <td></td> --}}

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="d-flex justify-content-center">
                        {{$bill->links()}}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
