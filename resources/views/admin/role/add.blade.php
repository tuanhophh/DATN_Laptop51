@extends('admin.layouts.main')
@section('title', 'Thêm vai trò')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script>
$(function() {
    $('.checkbox_wrapper').on('click', function() {
        $(this).parents('.card').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
    });

    $('.checkall').on('click', function() {
        $(this).parents().find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
        $(this).parents().find('.checkbox_wrapper').prop('checked', $(this).prop('checked'));

    });
});
</script>
<div class="container bg-white">
    <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Tên vai trò</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="">
                </div>
                <div class="form-group">
                <label for="">Mô tả vai trò</label>
                    <textarea class="form-control" name="display_name" rows="4">{{ old('display_name') }}</textarea>
                </div>
            </div>
            <div class="col-12">
                <label for="">
                <input type="checkbox" class="checkall">
                Checkall
                </label>
                @foreach($permissionsParent as $permissionsParentItem)
                <div class="card border-primary mb-3 p-0 col-md-12">
                    <div class="card-header py-0">
                        <label>
                            <input type="checkbox" class="checkbox_wrapper">
                        </label>
                        Module {{$permissionsParentItem->name}}
                    </div>
                    <div class="row">
                        @foreach($permissionsParentItem->permissionChildrent as $permissionChildrentItem)
                        <div class="cart-body text-center col-3 text-alight-center">
                            <h5 class="card-title">
                                <label class="text-center">
                                    <input type="checkbox" name="permission_id[]" class="checkbox_childrent"
                                        value="{{ $permissionChildrentItem->id }}">

                                    {{$permissionChildrentItem->name}}
                                </label>
                            </h5>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <br>
            <a href="{{route('roles.index')}}" class="btn btn-danger">Hủy</a>
            &nbsp;
            <button type="submit" class="btn btn-success">Lưu</button>
    </form>
    </div>

@endsection