@extends('admin.layouts.main')
@section('title','sua danh mục')
@section('content')


    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                  <label for="">Tên danh mục</label>
                  <input type="text" name="company_name" value="{{ old('company_name', $category->company_name) }}" class="form-control" placeholder="">
                </div>
                
            
            <div >
                
                <a href="{{route('category.index')}}" class="btn btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </form>


    
@endsection