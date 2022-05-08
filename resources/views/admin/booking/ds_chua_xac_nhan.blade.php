@extends('admin.layouts.main')
@section('content')
<div class="table-responsive " style="background-color: white">
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="sort" data-sort="name">Tên máy</th>
                <th scope="col" class="sort" data-sort="budget">Tên khách hàng</th>
                <th scope="col" class="sort" data-sort="status">Số điện thoại</th>
                {{-- <th scope="col">Hình thức sửa</th> --}}
                <th scope="col">Trạng thái</th>
                <th scope="col" class="sort" data-sort="completion">Sửa thông tin</th>
                @can('add-booking')
                <th scope="col"><a href="{{ route('dat-lich.add') }}">Tạo mới</a></th>
                @endcan
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
                {{-- <td>@if ($b->repair_type=='TN')
                    {{ 'Tại nhà' }}
                    @else
                    {{ 'Đem đến cửa hàng' }}
                    @endif</td> --}}
                <td>
                    {{-- @if ($b->active==0)
                    {{ 'Chưa sửa' }}
                    @elseif($b->active==2)
                    {{ 'Tạm dừng' }}
                    @elseif($b->active== 3)
                    {{ 'Đã hoàn thành' }}
                    @elseif($b->active==1 )
                    {{ 'Đang sửa' }}
                    @endif --}}

                    <div class="form-group d-flex" width="50px">
                        {{-- <label for=""></label> --}}
                        <form action="{{ route('dat-lich.chuyen-trang-thai') }}" method="POST" class="d-flex">
                            @csrf
                            <select class="form-control" name="status_booking" id="">
                                <option @if ($b->status_booking=='received')selected
                                    @endif value="received">Chưa xác nhận</option>
                                <option @if ($b->status_booking=='latch')selected
                                    @endif value="latch">Xác nhận</option>
                                <option @if ($b->status_booking=='cancel')selected
                                    @endif value="cancel">Hủy bỏ</option>

                            </select>
                            <input type="hidden" name="booking_detail_id" value="{{ $b->id }}">
                           
                            <button class="btn btn-primary" type="submit">Chọn</button>
                            
                        </form>
                    </div>


                </td>
                {{-- <td>
                    <div class="form-group d-flex" width="50px">
                        <form action="" method="POST" class="d-flex">
                            @csrf
                            <select id="" @if ($b->active==0||$b->active==3||$b->active==4)
                                disabled

                                @endif class="form-control" name="staff">
                                <option value="0">Chưa chọn</option>
                                @foreach ($users as $u)
                                <option @if ($b->user_repair !=null )
                                    @if ($u->id == $b->user_repair->user_id)
                                    selected
                                    @endif

                                    @endif value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select><input type="hidden" name="booking_detail_id" value="{{ $b->id }}">
                            <button @if ($b->active==0||$b->active==3||$b->active==4)
                                disabled

                                @endif class="btn btn-primary" type="submit">Chọn</button>
                        </form>
                    </div>
                </td> --}}
                <td class="mx-auto">
                    {{-- @if ($b->active==1||$b->active==2)
                    <a name="" id="" class="btn btn-success" href="{{ route('suachua.get', ['id'=>$b->id]) }}"
                        role="button">Sửa chữa</a>
                    @endif --}}
                    @can('edit-booking')
                    <a name="" id="" class="btn btn-primary" href="{{ route('dat-lich.edit', ['id'=>$b->id]) }}"
                        role="button">Sửa thông tin</a>
                    <a name="" id="" class="btn btn-info" @if ($b->status_booking!='latch')
                        style="display: none"
                        @endif
                        href="{{ route('dat-lich.tiep-nhan-may', ['booking_detail_id'=>$b->id]) }}" role="button">Tiếp
                        nhận máy</a>
                    @endcan
                    {{-- <a name="" id="" class="btn btn-danger"
                        href="{{ route('dat-lich.deleteBookingDetail', ['id'=>$b->id]) }}" role="button">Xóa</a> --}}
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection