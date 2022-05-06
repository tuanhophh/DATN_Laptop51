@extends('admin.layouts.main')
@section('content')
<div>{{ $booking_detail->code }}
    <form action="{{ route('phieu-nhan-may', ['booking_detail_id'=>$booking_detail->id]) }}" method="POST">
        @csrf
        <h5 class="mx-auto">PHIẾU GIỮ MÁY</h5>
        <b>Họ tên khách hàng:</b> <input type="text" name="full_name" class=""
            value="{{$booking_detail->booking->full_name}}">
        <br>
        <b>SDT:</b> <input type="text" name="phone" value="{{$booking_detail->booking->phone}}"> <br>
        <b>Tên máy:</b> <input type="text" name="name_computer" value="{{ $booking_detail->name_computer }}">
        <br><b>Ngày đặt:</b>{{
        $booking_detail->created_at }}
        <br>
        <b>Ngày đem máy đến:</b> <input type="datetime-local" value=""> {{ now() }} <br>
        <b>Tình trạng máy hiện tại:</b> <textarea name="comment" id="" cols="50" rows="5"> </textarea>
        {{-- <input type="submit" placeholder="Xuất Phiếu"> --}}
        <button type="submit">Lưu và xuất phiếu</button>
    </form>


    {{--
    <div>
        <form action="{{ route('phieu-nhan-may', ['booking_detail_id'=>$booking_detail->id]) }}" method="POST">
            @csrf

            <h2 class="mx-auto">Phiếu tiếp nhận máy</h2>


        </form>
    </div> --}}

</div>
@endsection