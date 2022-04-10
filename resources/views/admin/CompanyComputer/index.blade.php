@extends('admin.layouts.main')
@section('title', 'CompanyComputer')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Thông báo: </strong>{!! Session::get('success')!!}.
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
    {{-- {!<script>alert("aaaa")</script>!!} --}}
    <div class="row text-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-stripped">
                        <thead>
                            <th>STT</th>
                            <th>Name</th>
                            <th>
                                <a href="{{route('CompanyComputer.add')}}">Add new</a>
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($CompanyComputer as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->company_name }}</td>
                                    <td>
                                        <a href="{{ route('CompanyComputer.edit', ['id' => $item->id]) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('CompanyComputer.remove', ['id' => $item->id]) }}"
                                            onclick="return confirm('Bạn có chắc muốn xóa')"
                                            class="btn btn-sm btn-danger">Remove</a>
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
