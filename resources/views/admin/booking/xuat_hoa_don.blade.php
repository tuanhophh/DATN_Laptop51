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
        <p>Ho va ten: {{ $booking_detail->booking->full_name }}</p>
        <p>So dien thoai: {{ $booking_detail->booking->phone }}</p>
        <h5>Danh sach linh kien</h5>

        <table class="table" border="1" draggable="false" style="border: red solid 1px">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ten linh kien</th>
                    <th>Don gia</th>
                    <th>So luong</th>
                    <th>Thanh tien</th>
                    <th>Ghi chu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($repair_parts as $key=>$p)
                <tr>
                    <td scope="row">{{ $key +1}}</td>
                    <td>{{ $p->name_product }}</td>
                    <td>{{ $p->unit_price }}</td>
                    <td>{{ $p->quantity }}</td>
                    <td>{{ $p->into_money }}</td>
                    <td></td>
                </tr>
                @endforeach
                <tr>
                    <th colspan='4'>TONG</th>
                    <th colspan="" class="tong-tien"> {{ array_sum(array_column($repair_parts->toArray(),'into_money'))
                        }}</th>
                    <td></td>
                </tr>

            </tbody>
        </table>



    </div>
    <div class="nguoi" style="">
        <div>
            <h5>Người xuất</h5>

        </div>
        <div>
            <h5>Người nhận</h5>

        </div>
    </div>
</body>

</html>