@extends('admin.layouts.main')
@section('title', 'Thêm sản phẩm')
@section('content')


<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="row ml-2">
            <div class="col-6 mt-2">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select name="companyComputer_id" class="form-control">
                        <option value="">Chọn CompanyComputer</option>
                        @foreach ($ComputerCompany as $item)
                        <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                        @endforeach
                    </select>
                    @error('companyComputer_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Ảnh</label>
                    <input type="file" name="anh" class="form-control" placeholder="">

                </div>
                @error('anh')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <label for="">Giá nhập</label>
                    <input type="number" name="import_price" value="{{ old('import_price') }}" class="form-control"
                        placeholder="Giá nhập">
                    @error('import_price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Giá bán</label>
                    <input type="number" name="price" value="{{ old('price') }}" class="form-control"
                        placeholder="Giá bán">

                    @error('price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <input type="hidden" name="qty" value="0">
            <div class="col-6 mt-2">

                <div class="form-group text-center mb-0">
                    <label for="">Chi tiết sản phẩm</label>
                </div>
                <div class="form-group row mb-1 pr-2">
                    <label for="inputEmail3" class="font-italic col-sm-2 col-form-label">CPU:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="CPU">
                    </div>
                    @error('insurance')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group row mb-1 pr-2">
                    <label for="inputEmail3" class="font-italic col-sm-2 col-form-label">RAM:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="RAM">
                    </div>
                    @error('insurance')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group row mb-1 pr-2">
                    <label for="inputEmail3" class="font-italic col-sm-2 col-form-label">Ổ cứng:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Ổ cứng">
                    </div>
                    @error('insurance')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group row mb-1 pr-2">
                    <label for="inputEmail3" class="font-italic col-sm-2 col-form-label">Card đồ họa:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Card đồ họa">
                    </div>
                    @error('insurance')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group row pr-2">
                    <label for="inputEmail3" class="font-italic col-sm-2 col-form-label">Màn hình:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Màn hình">
                    </div>
                    @error('insurance')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group pt-1 pr-2">
                    <label for="">Thời gian bảo hành</label>
                    <input type="number" name="insurance" placeholder="Thời gian bảo hành" class="form-control">
                    @error('insurance')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group pr-2">
                    <label for="">Trạng thái</label>
                    <select name="status" id="" class="form-control">
                        <option value="">Chọn trạng thái</option>
                        <option value="1">Còn hàng</option>
                        <option value="0">Hết hàng</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-12 pr-2">
                <label for="">Mô tả đầu trang</label>
                <input name="desc_short" rows="4" class="form-control"></input>
            </div>
            <div class="form-group col-12 pr-2">
                <label for="">Mô tả</label>
                <textarea name="desc" rows="4" id="ckeditor1" class="form-control"></textarea>
            </div>
            <div class="d-flex justify-content-end mb-2 ml-2">
                <br>
                <a href="{{ route('product.index') }}" class="btn btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-success">Lưu</button>
            </div>
        </div>
    </div>
</form>
<script src="{{asset('ckeditor')}}/ckeditor.js"></script>
<script type="text/javascript">
CKEDITOR.replace('ckeditor');
CKEDITOR.replace('ckeditor1');
</script>
@endsection