@extends('admin.layouts.main')
@section('title', 'Danh sách nhân viên')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Thông báo: </strong>{{ Session::get('success') }}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Thông báo: </strong>{{ Session::get('error') }}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Họ và Tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Vai trò</th>
                            <th scope="col">
                                @can('add-user')
                                <button type="button" class="btn btn-info"><a
                                        style="color:white;  text-decoration: none;"
                                        href="{{route('user.add')}}">Thêm</a></button>
                                @endcan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td> {{$item->name}} </td>
                            <td> {{$item->email}} </td>
                            <td><img src="{{asset($item->avatar)}}" alt="" width="100"></td>
                            <td> {{$item->phone}} </td>
                            <td>
                                @foreach($item->roles as $role)
                                 {{$role->name}}
                                 @endforeach
                            </td>
                            <td>
                                @can('edit-user')
                                <button type="button" class="btn btn-warning"><a
                                        style="color:white;  text-decoration: none;"
                                        href="{{ route('user.edit', ['id'=>$item->id]) }}"> Sửa</a></button>
                                @endcan
                                @can('delete-user')
                                <button type="button" class="btn btn-danger"><a
                                        style="color:white;  text-decoration: none;"
                                        onclick="return confirm('Bạn có chắc muốn User')"
                                        href="{{ route('user.remove', ['id'=>$item->id]) }}"> Xóa</a></button>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">

                </div>
            </div>
        </div>
    </div>
</div>


<!-- <div class="container">
    <table class="table table-striped">
    <thead class="thead">
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Họ và Tên</th>
        <th scope="col">Email</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Vai trò</th>
        <th scope="col"> 
        @can('add-user')
            <button type="button" class="btn btn-primary"><a style="color:white;  text-decoration: none;" href="{{route('user.add')}}">Thêm</a></button>
        @endcan
        </th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td> {{$item->name}} </td>
        <td> {{$item->email}} </td>
        <td><img src="{{asset($item->avatar)}}" alt="" width="100"></td>
        <td> {{$item->phone}} </td>
          @foreach($item->roles as $role)
        <td> {{$role->name}}</td>
          @endforeach
        <td>
        @can('edit-user')
          <button type="button" class="btn btn-primary"><a style="color:white;  text-decoration: none;" href="{{ route('user.edit', ['id'=>$item->id]) }}"> Sửa</a></button>
          @endcan
          @can('delete-user')
            <button type="button" class="btn btn-danger"><a style="color:white;  text-decoration: none;" onclick="return confirm('Bạn có chắc muốn User')"  href="{{ route('user.remove', ['id'=>$item->id]) }}"> Xóa</a></button>
            @endcan
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
  
</div> -->
@endsection