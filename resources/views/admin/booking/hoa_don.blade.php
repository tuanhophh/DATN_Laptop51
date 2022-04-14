@extends('admin.layouts.main')
@section('content')
{{-- <button>Xuất hóa đơn</button>
--}}
<a name="" id="" class="btn btn-primary"
    href="{{ route('dat-lich.xuat-hoa-don', ['booking_detail_id'=>$booking_detail->id]) }}" role="button"> Xuất hóa
    đơn</a>
<h4 class="mx-auto">Hóa đơn sửa chữa</h4>
<p>Họ và tên: {{ $booking_detail->booking->full_name }}</p>
<p>Số điện thoại: {{ $booking_detail->booking->phone }}</p>
<h5>Danh sách linh kiện sủa chữa và thay thế</h5>

<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên linh kiện</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Ghi chú</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($repair_parts as $key=>$p)
        <tr>
            <td scope="row">{{ $key +1}}</td>
            <td>{{ $p->detail_product->name }}</td>
            <td>{{ $p->unit_price }}</td>
            <td>{{ $p->quantity }}</td>
            <td>{{ $p->into_money }}</td>
        </tr>
        @endforeach

        {{-- <tr>
            <td scope="row"></td>
            <td></td>
            <td></td>
        </tr> --}}
    </tbody>
</table>





@endsection