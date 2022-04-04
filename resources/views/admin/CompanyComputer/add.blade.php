@extends('admin.layouts.main')
@section('title', 'Thêm CompanyComputer')
@section('content')

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card row">
            <div class="col-6">
                <div class="form-group mt-2">
                    <label for="">Tên CompanyComputer</label>
                    <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control"
                        placeholder="">
                </div>
                @error('company_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="mb-2">

                    <a href="{{ route('CompanyComputer.index') }}" class="btn btn-danger">Hủy</a>
                    &nbsp;
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
    </form>

@endsection
