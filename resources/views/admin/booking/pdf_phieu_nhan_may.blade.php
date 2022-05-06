<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phiếu nhận máy</title>
</head>

<body>
    <div>
        <h2>Phiếu nhận máy</h5>

            <div><b>Họ và tên: </b><span>{{ $booking_detail->full_name }}</span></div>
            <b>Họ tên khách hàng:</b> {{$booking_detail->booking->full_name}} <br>
            <b>SDT:</b> {{$booking_detail->booking->phone}} <br>
            {{-- Địa chỉ{{ $booking_detail->booking->address }} --}}
            <b>Tên máy:</b> {{ $booking_detail->name_computer }} <br><b>Ngày đặt:</b>{{ $booking_detail->created_at }}
            <br>
            Tình trạng máy: {{ $booking_detail->comment }}

    </div>
</body>

</html>