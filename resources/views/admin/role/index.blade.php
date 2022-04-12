@extends('admin.layouts.main')
@section('title', 'Danh sách vai trò')
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
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên vai trò</th>
                        <th scope="col">Mô tả vai trò</th>
                        <th scope="col">
                            <button type="button" class="btn btn-info"><a
                                    style="color:white;  text-decoration: none;" href="{{route('roles.create')}}">Thêm
                                    vai trò</a></button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <th scope="row"> {{$role->id}}</th>
                        <td> {{$role->name}} </td>
                        <td> {{$role->display_name}} </td>
                        <td> <button type="button" class="btn btn-warning"><a
                                    style="color:white;  text-decoration: none;"
                                    href="{{route('roles.edit',['id' => $role->id])}}"> Sửa</a></button>
                            <button type="button" class="btn btn-danger"><a
                                    href="{{ route('roles.remove', ['id' => $role->id]) }}"
                                    style="color:white;  text-decoration: none;"
                                    onclick="return confirm('Bạn có chắc muốn User')" href=""> Xóa</a></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-12">
                {{$roles->links()}}
            </div>
        </div>
    </div>
</div>
@endsection