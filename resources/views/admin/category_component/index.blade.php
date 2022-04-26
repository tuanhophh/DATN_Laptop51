@extends('admin.layouts.main')
@section('title', 'Thuộc tính')
@section('content')
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
                    <thead>
                        <th>STT</th>
                        <th>Tên thuộc tính</th>
                        <th>
                            {{-- @can('add-category_component') --}}
                            <a class="btn btn-info" href="{{route('category_component.add')}}">Thêm</a>
                            {{-- @endcan --}}
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($CategoriesComponent as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name_category }}</td>
                            <td>
                                @can('edit-category_component')
                                <a href="{{ route('category_component.edit', ['id' => $item->id]) }}"
                                    class="btn btn-sm btn-warning">Sửa</a>
                                @endcan
                                @can('delete-category_component')
                                <a href="{{ route('category_component.remove', ['id' => $item->id]) }}"
                                    onclick="return confirm('Bạn có chắc muốn xóa')"
                                    class="btn btn-sm btn-danger">Xóa</a>
                                @endcan

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="d-flex justify-content-center">
                    {{$Categories->links()}}
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection