@extends('admin.layouts.main')
@section('title', 'Sửa sản phẩm')
@section('content')


    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="row ml-2">
                <div class="col-6 mt-2">
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name" value="{{ old('name', $pro->name) }}" class="form-control"
                            placeholder="">

                    </div>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="">Ảnh</label>
                        <input type="file" name="image" class="form-control" placeholder="">

                    </div>
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="">Giá nhập</label>
                        <input type="number" name="import_price" value="{{ old('import_price', $pro->import_price) }}"
                            class="form-control" placeholder="">

                    </div>
                    @error('import_price')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="">Giá bán</label>
                        <input type="number" name="price" value="{{ old('price', $pro->price) }}" class="form-control"
                            placeholder="">

                    </div>
                    @error('price')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-6 mt-2">
                    <div class="form-group">
                        <label for="">CompanyComputer</label>
                        <select name="companyComputer_id" class="form-control">
                            <option value="">Chọn CompanyComputer</option>
                            @foreach ($ComputerCompany as $item)
                                <option @if ($item->id == $pro->companyComputer_id) selected @endif value="{{ $item->id }}">
                                    {{ $item->company_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('companyComputer_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea name="desc" rows="4" value="{{ old('name', $pro->desc) }}" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Thời gian bảo hành</label>
                        <input type="number" name="insurance" value="{{ old('insurance', $pro->insurance) }}"
                            class="form-control">
                    </div>
                    @error('insurance')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group ">
                        <label for="" class="mt-3">Status</label>
                        <select name="status" id="" class="form-control">
                            @if ($pro->status)
                                selected
                            @endif
                            <option value="">Chọn trạng thái</option>
                            <option value="1">Còn hàng</option>
                            <option value="0">Hết hàng</option>
                        </select>

                    </div>

                </div>
                <div class="d-flex justify-content-end mb-2 ml-2">
                    <br>
                    <a href="{{ route('product.index') }}" class="btn btn-danger">Hủy</a>
                    &nbsp;
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </form>


@endsection
