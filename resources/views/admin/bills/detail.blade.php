@extends('admin.layouts.main')
@section('title', 'Chi tiết hóa đơn')
@section('content')

<form action="" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="row ml-2">
            <div class="col-6 mt-2">
                <div class="form-group">
                    <label for="">Tên người mua</label>
                    <input type="text" name="name" disabled value="{{ old('total', $bill_user->name) }}"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" disabled value="{{ old('email', $bill_user->email) }}"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="phone" disabled value="{{ old('phone', $bill_user->phone) }}"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" disabled value="{{ $bill_user->address }}" class="form-control"
                        placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Ghi chú</label>
                    <textarea disabled class="form-control" name="note" id="">{{$bill_user->note}}</textarea>
                </div>
            </div>
            <div class="col-6 mt-2">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Mã hóa đơn</label>
                            <input type="text" name="code" disabled value="{{ old('code', $bill->code) }}"
                                class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-6">
                    <div class="form-group">
                            <label for="">Phương thức thanh toán</label>
                            <select disabled name="payment_method" class="form-control">
                                @if($bill->payment_method == 1)
                                <option disabled value="{{$bill->payment_method}}">Tiền mặt</option>
                                <option value="2">Chuyển khoản</option>
                                @elseif($bill->payment_method == 2)
                                <option disabled value="{{$bill->payment_method}}">Chuyển khoản</option>
                                <option value="1">Tiền mặt</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">

                        <div class="form-group">
                            <label for="">Tổng tiền</label>
                            <input type="text" name="total" disabled value="{{ old('total', $bill->total) }} VNĐ"
                                class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Trạng thái thanh toán</label>
                            <select disabled name="payment_status" class="form-control">
                                @if($bill->payment_status == 0)
                                <option disabled value="{{$bill->payment_status}}">Chưa thanh toán</option>
                                <option value="1">Thanh toán thất bại</option>
                                <option value="9">Thanh toán thành công</option>
                                @elseif($bill->payment_status == 1)
                                <option value="{{$bill->payment_status}}">Thanh toán thất bại</option>
                                <option value="0">Chưa thanh toán</option>
                                <option value="9">Thanh toán thành công</option>
                                @elseif($bill->payment_status == 9)
                                <option value="{{$bill->payment_status}}">Thanh toán thành công</option>
                                <option value="0">Chưa thanh toán</option>
                                <option value="1">Thanh toán thất bại</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Ngày tạo</label>
                    <input type="text" name="created_at" disabled value="{{ old('created_at', $bill->created_at) }}"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group mb-0 pb-0 text-center">
                    <label class="mb-0 pb-0 text-center" for="">Sản phẩm đã mua</label>
                </div>
                <hr class="m-0 p-0">
                <div class="row" style="height: 30px;">
                    <div class="col-7 mb-0 pb-0">
                        <label class="mb-0 pb-0" for="">Tên sản phẩm</label>
                    </div>
                    <div class="col-3 mb-0 pb-0">
                        <div class="form-group">
                            <label class="mb-0 pb-0" for="">Giá</label>
                        </div>
                    </div>
                    <div class="col-2 mb-0 pb-0">
                        <div class="form-group">
                            <label class="mb-0 pb-0" for="">Số lượng</label>
                        </div>
                    </div>
                </div>
                @foreach($bill_detail as $bill_d)
                <div class="row">
                    <div class="col-7">
                        <input type="text" name="" disabled value="{{$bill_d->product->name}}"
                            class="form-control" placeholder="">
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <input type="text" name="" disabled value="{{$bill_d->price}} VNĐ"
                                class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <input type="text" name="" disabled value="{{$bill_d->qty}}"
                                class="form-control" placeholder="">
                        </div>

                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="d-flex justify-content-end mb-2 mr-2">
            <br>
            <a href="{{ route('bill.index') }}" class="btn btn-danger">Quay lai</a>
            &nbsp;

        </div>
    </div>
    </div>
</form>
@endsection