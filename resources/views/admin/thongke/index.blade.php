@extends('admin.layouts.main')
@section('title', 'Thống kê sản phẩm')
@section('content')
Tổng sản phẩm từng tháng
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-4">Tháng</th>
                <th class="col-4">Số lượng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($a as $item => $value)
                <tr>
                    <td>{{ $item + 1 }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
