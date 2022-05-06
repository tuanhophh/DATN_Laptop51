@extends('admin.layouts.main')
@section('title', 'Sửa hóa đơn')
@section('content')

<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="row mx-2">
            <div class="col-6 mt-2">
                <div class="form-group">
                    <label for="">Tên người mua</label>
                    <input type="text" name="" disabled value="{{ old('total', $bill_user->name) }}"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="" disabled value="{{ old('email', $bill_user->email) }}"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="" disabled value="{{ old('phone', $bill_user->phone) }}"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="" disabled value="{{ $bill_user->address }}" class="form-control"
                        placeholder="">
                </div>
            </div>

            <div class="col-6 mt-2">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Mã hóa đơn</label>
                            <input type="text" name="" disabled value="{{ old('code', $bill->code) }}"
                                class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            
                        <div class="form-group">
                            <label for="">Tổng tiền</label>
                            <input type="text" name="" disabled value="{{ old('total', $bill->total) }} VNĐ"
                                class="form-control" placeholder="">
                        </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        
                    <label for="">Phương thức thanh toán</label>
                            <select  @if($bill->payment_status == 2 || $bill->payment_status == 1) disabled @endif name="payment_method" class="form-control">
                                @if($bill->payment_method == 1)
                                <option value="{{$bill->payment_method}}">Tiền mặt</option>
                                <option value="2">Chuyển khoản</option>
                                @elseif($bill->payment_method == 2)
                                <option value="{{$bill->payment_method}}">Chuyển khoản</option>
                                <option value="1">Tiền mặt</option>
                                @endif
                            </select>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Trạng thái thanh toán</label>
                            <select @if($bill->payment_status == 2 || $bill->payment_status == 1) disabled @endif  name="payment_status" class="form-control">
                           
                                <option @if($bill->payment_status == 0) selected @endif value="0">Chưa thanh toán</option>
                                <option @if($bill->payment_status == 1) selected @endif value="1">Hủy</option>
                                <option @if($bill->payment_status == 2) selected @endif value="2">Thanh toán thành công</option>
                             
                            </select>
                        </div>

                    </div>

                </div>
                <div class="form-group">
                    <label for="">Ngày tạo</label>
                    <input type="text" name="" disabled value="{{ old('created_at', $bill->created_at) }}"
                        class="form-control" placeholder="">

                </div>
                <div class="form-group">
                    <label for="">Ghi chú</label>
                    <textarea disabled class="form-control" name="" id="">{{$bill_user->note}}</textarea>
                </div>
            </div>
        </div>
        <div class="form-group mb-0 pb-0 text-center">
            <label class="mb-0 pb-0 text-center" for="">Sản phẩm đã mua</label>
        </div>
        <hr>
        <!-- <div class="row" style="height: 30px;">
            <div class="col-7 mb-0 pb-0">
                <label class="mb-0 pb-0" for="">Tên sản phẩm</label>
            </div>
            <div class="col-2 mb-0 pb-0">
                <div class="form-group">
                    <label class="mb-0 pb-0" for="">Giá</label>
                </div>
            </div>
            <div class="col-2 mb-0 pb-0">
                <div class="form-group">
                    <label class="mb-0 pb-0" for="">Số lượng</label>
                </div>
            </div>
            <div class="col-1 mb-0 pb-0 pt-4 mt-1">
                <div class="form-group">
                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Thêm</button>
                </div>
            </div>
        </div> -->
        <!-- <div class="row">
            <div class="col-7">

            </div>
        </div> -->
        <table class="table table-bordered" id="dynamicAddRemove">
            <tr>
                <th class="p-0">
                    <p class="text-center ms-auto mb-0 p-2">Tên sản phẩm</p>
                </th>
                <th class="p-0">
                    <p class="text-center ms-auto mb-0 p-2">Giá</p>
                </th>
                <th class="p-0">
                    <p class="text-center ms-auto mb-0 p-2">Số lượng</p>
                </th>
                <th class="p-0">
                    <!-- <button type="button ms-auto" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Subject</button> -->
                </th>
            </tr>
            @foreach($bill_detail as $bill_d)
            <tr>
                <td><select disabled name="product_id" class="form-control">
                        @foreach ($prod as $pro)
                        <option @if ($pro->id == $bill_d->product_id) selected @endif value="{{ $pro->id }}">
                            {{ $pro->name }}</option>
                        @endforeach
                        <!-- <option value="{{$bill_d->product->id}}">{{$bill_d->product->name}}</option> -->
                    </select></td>
                <!-- <td><input disabled type="text" value="{{$bill_d->product->name}}" name="addMoreInputFields[0][subject]"
                        placeholder="Tên sản phẩm" class="form-control" />
                </td> -->
                <td><input disabled type="text" value="{{$bill_d->price}}" name="addMoreInputFields[0][subject]"
                        placeholder="Nhập giá" class="form-control" /></td>
                <td><input disabled type="text" value="{{$bill_d->qty}}" name="addMoreInputFields[0][subject]"
                        placeholder="Số lượng" class="form-control" /></td>
                <!-- <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Thêm sản
                        phẩm</button></td> -->
            </tr>
        </table>
        @endforeach
        <div class="d-flex justify-content-end mb-2 mr-2">
            <br>
            <a href="{{ route('bill.index') }}" class="btn btn-info mr-2">Quay lại </a>
            <button class="btn btn-success" type="submit">Lưu</button>
            &nbsp;
        </div>
    </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
var i = 0;
$("#dynamic-ar").click(function() {
    ++i;
    $("#dynamicAddRemove").append(
        '<tr><td><input type="text" name="addMoreInputFields[0][subject]" placeholder="Enter subject"class="form-control" /></td><td><input type="text" name="addMoreInputFields[0][subject]" placeholder="Enter subject"class="form-control" /></td><td><input type="text" name="addMoreInputFields[0][subject]" placeholder="Enter subject"class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
    );
});
$(document).on('click', '.remove-input-field', function() {
    $(this).parents('tr').remove();
});
</script>
@endsection