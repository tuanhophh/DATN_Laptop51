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
</head>

<body>
    <div>
        <h4 class="mx-auto">HOA DON SUA CHUA</h4>
        <p>Ho va ten: {{ $booking_detail->booking->full_name }}</p>
        <p>So dien thoai: {{ $booking_detail->booking->phone }}</p>
        <h5>Danh sach linh kien</h5>

        <table class="table">
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
                    <td>{{ $p->detail_product->name }}</td>
                    <td>{{ $p->unit_price }}</td>
                    <td>{{ $p->quantity }}</td>
                    <td>{{ $p->into_money }}</td>
                </tr>
                @endforeach
                <tr>
                    <th colspan='4'>TONG</th>
                    <th class="tong-tien"> {{ array_sum(array_column($repair_parts->toArray(),'into_money')) }}</th>
                </tr>

            </tbody>
        </table>
    </div>
</body>

</html>