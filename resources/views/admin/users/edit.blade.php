@extends('admin.layouts.main')
@section('title', 'Sửa thông tin nhân viên')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<div class="row">
    <div class="card">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Tên người dùng</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{$user->email}}" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh</label>
                            <input type="file" name="avatar" value="{{$user->avatar}}" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="col-6">
                    <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="number" name="phone" value="{{$user->phone}}" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" name="address" value="{{$user->address}}" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <input type="text" name="description" value="{{$user->description}}" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Vai trò</label>
                            @if($user->id_role == 0)
                            <select disabled name="id_role" class="form-control select2_init">
                            <option value="0">Người dùng</option>
                            </select>
                            @else
                            <select name="role_id" class="form-control select2_init">
                                
                                @foreach($roles as $roleItem)
                                @if($user_role == NULL)
                                <option value="{{$roleItem->id}}">{{$roleItem->name}}</option>
                                @endif
                                @foreach($user->roles as $role)
                                @if($roleItem->id != 1)
                                <option @if ($roleItem->id == $role->id) selected
                                @endif
                                @endif
                                    value="{{$roleItem->id}}">{{$roleItem->name}}</option>
                                @endforeach
                                @endforeach

                            </select>
                            @endif

                        </div>
                    </div>
                    </div>
                        <div class="col-12 d-flex justify-content-end">
                            <br>
                            <a href="{{route('user.index')}}" class="btn btn-sm btn-danger">Hủy</a>
                                &nbsp;
                                <button type="submit" class="btn btn-sm btn-success">Lưu</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

@endsection