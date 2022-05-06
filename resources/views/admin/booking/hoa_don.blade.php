@extends('admin.layouts.main')
@section('content')
{{-- <button>Xuất hóa đơn</button>
--}}
<a name="" id="" class="btn btn-primary" target="_blank"
    href="{{ route('dat-lich.xuat-hoa-don', ['booking_detail_id'=>$booking_detail->id]) }}" role="button"> Xuất hóa
    đơn</a>
<h4 class="mx-auto">Hóa đơn sửa chữa</h4>
<h5 class="mx-auto">Số hóa đơn: <b>{{ $booking_detail->code }}</b></h5>
<p>Họ và tên: {{ $booking_detail->booking->full_name }}</p>
<p>Tên máy: {{ $booking_detail->name_computer }}</p>
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
            <td>{{ $p->name_product }}</td>
            <td>{{ $p->unit_price }}</td>
            <td>{{ $p->quantity }}</td>
            <td class="tt">{{ $p->into_money }}</td>
            <td> </td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <th colspan="3">Tổng</th>
            <th id="tong"> 1</th>
        </tr>
        <tr>
            <td></td>
            <th colspan="3">Số tiền khách trả</th>
            <th id="tong">
                <div class="form-group">
                    {{-- <label for=""></label> --}}
                    <form action="" method="POST" id="form_tien_khach_tra">
                        @csrf
                        <input type="number" onchange="tinhTien()" class="form-control col-4" name="customers_pay" id=""
                            aria-describedby="helpId" placeholder=" VND">
                    </form>
                    {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                </div>
            </th>
        </tr>
        <tr>
            <td></td>
            <th colspan="3">Tiền thừa</th>
            <th id="tien_thua"> </th>

            {{--
        <tr>
            <td scope="row"></td>
            <td></td>
            <td></td>
        </tr> --}}
    </tbody>
</table>

<button form="form_tien_khach_tra" type="submit" class="btn btn-success">Lưu Hóa Đơn</button>

<script>
    tt=document.getElementsByClassName('tt')
    tong=document.getElementById('tong')
// Array(tt).map(function(a){
//     console.log(a.innerHTML);
// })
sum=0
for(i=0;i<tt.length;i++){
    // console.log(tt[i]);
    sum=sum+Number(tt[i].innerHTML);
}
tong.innerHTML=sum;

function tinhTien(){
        customers_pay=document.getElementsByName("customers_pay");
        tien_thua=document.getElementById('tien_thua')
        tong=document.getElementById('tong')

        
        tien_thua.innerHTML=customers_pay[0].value-tong.innerHTML
        // console.log(customers_pay[0].va);

}
</script>

@endsection