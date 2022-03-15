@extends('admin.layouts.main')
@section('content')
<div class="table-responsive">
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="sort" data-sort="name">Tên máy</th>
                <th scope="col" class="sort" data-sort="budget">Tên khách hàng</th>
                <th scope="col" class="sort" data-sort="status">Máy tính</th>
                <th scope="col">Kiểu sửa</th>
                <th scope="col" class="sort" data-sort="completion">Thời gian sửa</th>
                <th scope="col">Trạng thái</th>
                <th scope="col"><a href="{{ route('dat-lich.add') }}">Tạo mới</a></th>
            </tr>
        </thead>
        <tbody class="list">



            @foreach ($arr_detail as $b)
            <tr>
                <td>{{ $b['name_computer'] }}</td>
                <td>@if (!empty($b['full_name'])){
                    {{ $b['full_name'] }}


                    @endif</td>
                {{-- <td>{{ $b['computer_conpany'] }}</td> --}}
                <td>{{ $b['repair_type'] }}</td>
                {{-- <td>{{ $b->booking()->interval }}</td> --}}
                <td>{{
                    $b['active']==1?'Đã xác nhận':'Chưa xác nhận' }}




                </td>
                <td><a name="" id="" class="btn btn-primary" href="{{ route('dat-lich.edit', ['id'=>$b['id']]) }}"
                        role="button">Sửa</a></td>
                <td><a name="" id="" class="btn btn-danger" href="{{ route('dat-lich.delete', ['id'=>$b['id']]) }}"
                        role="button">Xóa</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection