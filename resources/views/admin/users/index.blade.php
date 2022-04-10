@extends('admin.layouts.main')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    

<h5 class="alert alert-danger  text-center">Danh sách tài khoản</h5>

<div class="container">
    <table class="table table-striped">
    <thead class="thead">
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Họ và Tên</th>
        <th scope="col">Email</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Địa chỉ</th>
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
        <td> {{$item->address}} </td>
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
  
  
</div>
@endsection