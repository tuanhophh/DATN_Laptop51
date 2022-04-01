@extends('admin.layouts.main')
@section('content')
<div class="table-responsive">
    Danh sách máy mà bạn được phânm công sửa
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="sort" data-sort="name">Tên máy</th>
                <th scope="col" class="sort" data-sort="budget">Tên khách hàng</th>
                <th scope="col" class="sort" data-sort="status">SDT</th>
                <th scope="col">Kiểu sửa</th>
                <th scope="col">Trạng thái</th>
                {{-- <th scope="col" class="sort" data-sort="completion">Nhân viên</th> --}}
                <th scope="col"><a href="{{ route('dat-lich.add') }}">Tạo mới</a></th>
            </tr>
        </thead>
        <tbody class="list">



            @foreach ($booking_details as $b)
            <tr>
                <td>{{ $b->name_computer }}</td>
                <td>@if (!empty($b->booking->full_name))
                    {{ $b->booking->full_name }}

                    @endif</td>
                <td>{{ $b->booking->phone }}</td>
                <td>{{ $b->repair_type }}</td>
                <td>
                    @if ($b->active==0)
                    {{ 'Chưa sửa' }}
                    @elseif($b->active==2)
                    {{ 'Tạm dừng' }}
                    @elseif($b->active== 3)
                    {{ 'Đã hoàn thành' }}
                    @elseif($b->active==1 )
                    {{ 'Đang sửa' }}
                    @endif




                </td>
                {{-- <td>
                    <div class="form-group d-flex" width="50px">
                        <form action="" method="POST" class="d-flex">
                            @csrf
                            <select class="form-control" name="staff" id="">
                                <option value="">Chưa chọn</option>
                                @foreach ($users as $u)
                                <option @if ($b->user_repair->id==$u->id)
                                    selected
                                    @endif value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select><input type="hidden" name="booking_detail_id" value="{{ $u->id }}">
                            <button class="btn btn-primary" type="submit">Chọn</button>
                        </form>
                    </div>
                </td> --}}
                <td class="mx-auto">
                    <a name="" id="" class="btn btn-success" href="{{ route('suachua.get', ['id'=>$b->id]) }}"
                        role="button">Sửa chữa</a>

                    <a name="" id="" class="btn btn-primary" href="{{ route('dat-lich.edit', ['id'=>$b->id]) }}"
                        role="button">Sửa thông tin</a>
                    <a name="" id="" class="btn btn-danger"
                        href="{{ route('dat-lich.deleteBookingDetail', ['id'=>$b->id]) }}" role="button">Xóa</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection