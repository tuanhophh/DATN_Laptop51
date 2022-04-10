@extends('admin.layouts.main')
@section('title', 'Danh mục')
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

<div class="row text-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-stripped">
                    <thead>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>
                            @can('add-category')
                            <a href="{{route('CompanyComputer.add')}}">Thêm</a>
                            @endcan

                        </th>
                    </thead>
                    <tbody>
                        @foreach ($CompanyComputer as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->company_name }}</td>
                            <td>
                                @can('edit-category')

                                <a href="{{ route('CompanyComputer.edit', ['id' => $item->id]) }}"
                                    class="btn btn-sm btn-primary">Sửa</a>
                                @endcan
                                @can('delete-category')

                                <a href="{{ route('CompanyComputer.remove', ['id' => $item->id]) }}"
                                    onclick="return confirm('Bạn có chắc muốn xóa')"
                                    class="btn btn-sm btn-danger">Xóa</a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$CompanyComputer->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection