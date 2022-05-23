<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script> --}}
    <style>
        table {
            border-collapse: collapse;
            width: 760px;

        }

        .nguoi {
            display: flex;
            justify-content: center
        }
    </style>
</head>

<body style="max-width: 1024px;">
    <div>
        <h4 style="text-align: center">HÓA ĐƠN SỬA CHỮA</h4>
        <p>Họ tên: {{ $booking_detail->booking->full_name }}</p>
        <p>Số điện thoại: {{ $booking_detail->booking->phone }}</p>
        <p>Tên máy: {{ $booking_detail->name_computer }}</p>
        {{-- <p>Hãng máy: {{ $booking_detail->computerCompany->company_name }}</p> --}}

        <h5>DANH SÁCH LINH KIỆN</h5>

        <table class="table" border="1" draggable="false" style="border: red solid 1px">
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
                @foreach ($bill_detail as $key=>$p)
                <tr>
                    <td scope="row">{{ $key +1}}</td>
                    <td>{{$p->description }}</td>
                    <td>{{currency_format( $p->ban )}}</td>
                    <td>{{ $p->quaty }}</td>
                    <td>{{ currency_format($p->ban*$p->quaty )}}</td>
                    <td></td>
                </tr>
                @endforeach
                <tr>
                    <th colspan='4'>TỔNG</th>
                    <th colspan="" class="tong-tien">{{ currency_format($booking_detail_bill->total_price )}}</th>
                    <td></td>
                </tr>
                {{-- <tr>
                    <th colspan='4'>Khách trả</th>
                    <th colspan="" class="tong-tien">{{ $booking_detail_bill->customers_pay }}</th>
                    <td></td>
                </tr>
                <tr>
                    <th colspan='4'>Tiền thừa</th>
                    <th colspan="" class="tong-tien">{{ $booking_detail_bill->excess_cash }}</th>
                    <td></td>
                </tr> --}}
            </tbody>

        </table>

        {{-- Mô tả sửa chữa: {{ $data }} --}}



    </div>
    <div class="nguoi" style="*">
        <div>
            <h5>Người xuất</h5>

        </div>
        <div>
            <h5>Người nhận</h5>

        </div>
    </div>
</body>

</html>