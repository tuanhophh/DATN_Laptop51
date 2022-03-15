@extends('admin.layouts.main')
@section('title','Thêm danh mục')
@section('content')

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card row">
            <div class="col-6">
                <div class="form-group mt-2">
                  <label for="">Tên danh mục</label>
                  <input type="text" name="company_name" value="{{old('company_name')}}" class="form-control" placeholder="">
                </div>
                
            
            <div class="mb-2">
                
                <a href="{{route('category.index')}}" class="btn btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </form>

@endsection