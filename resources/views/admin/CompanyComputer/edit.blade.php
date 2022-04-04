@extends('admin.layouts.main')
@section('title', 'sua CompanyComputer')
@section('content')


    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Tên CompanyComputer</label>
                    <input type="text" name="company_name"
                        value="{{ old('company_name', $CompanyComputer->company_name) }}" class="form-control"
                        placeholder="">
                </div>
            </div>
            @error('company_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror

            <div>

                <a href="{{ route('CompanyComputer.index') }}" class="btn btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </form>



@endsection
