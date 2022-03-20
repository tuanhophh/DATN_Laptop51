@extends('admin.layouts.main')
@section('content')
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <h3 class="mb-0">Light table</h3>
      </div>
      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col" class="sort" data-sort="name">Họ tên</th>
              <th scope="col" class="sort" data-sort="budget">SDT</th>
              <th scope="col" class="sort" data-sort="status">Máy tính</th>
              <th scope="col">Kiểu sửa</th>
              <th scope="col" class="sort" data-sort="completion">Thời gian sửa</th>
              <th scope="col">Trạng thái</th>
              <th scope="col"><a href="{{ route('dat-lich.add') }}">Tạo mới</a></th>
            </tr>
          </thead>
          {{-- <tbody class="list">



            @foreach ($bookings as $b)
            <tr>
              <td>{{ $b->full_name }}</td>
              <td>{{ $b->phone }}</td>
              <td>{{ $b->company_computer_id }}</td>
              <td>{{ $b->repair_type }}</td>
              <td>{{ $b->interval }}</td>
              <td>{{
                $b->active==1?'Đã xác nhận':'Chưa xác nhận' }}




              </td>
              <td><a name="" id="" class="btn btn-primary" href="{{ route('dat-lich.edit', ['id'=>$b->id]) }}"
                  role="button">Sửa</a></td>
              <td><a name="" id="" class="btn btn-danger" href="{{ route('dat-lich.delete', ['id'=>$b->id]) }}"
                  role="button">Xóa</a>
              </td>
            </tr>
            @endforeach

          </tbody> --}}
        </table>
      </div>

      <table class="table">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
                      with font-awesome or any other icon font library -->

          @foreach ($result as $item)

          <div>
            <div class="nav-link">
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p> --}}
              <div class="d-flex ">

                <div class="mx-5">
                  {{ $item['full_name'] }}
                </div>
                <div class="mx-5">
                  {{ $item['interval'] }}
                </div>
                {{-- <div>
                  {{ $item['phone'] }}
                </div>
                <div>
                  {{ $item['phone'] }}
                </div> --}}

                <div class="mx-5">
                  {{ $item['phone'] }}
                </div>
                <div class="mx-5"><span class="badge badge-info right">{{ $item['count'] }}</span>
                </div>
                <div></div>


              </div>
              {{-- <td> --}}

                {{--
              </td> --}}
            </div>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </div>

          <ul class="nav nav-treeview">
            @foreach ($item['booking_detail'] as $bd)


            <li class="nav-item">
              <div class="nav-link">
                {{-- <i class="fa fa-laptop" aria-hidden="true"></i> --}}
                <div class="mx-5 d-flex ">
                  <div class="mx-5"><i class="fa fa-laptop" aria-hidden="true"></i>
                    @isset($bd['name_computer'])
                    {{ $bd['name_computer']}}
                    @endisset</div>
                  <div>
                    Trạng thái: Đang sửa
                  </div>
                  <div class="mx-auto">
                    <a name="" id="" class="btn btn-primary" href="{{ route('suachua.get', ['id'=>$bd['id']]) }}"
                      role="button">Sửa</a>
                  </div>
                </div>
                <div>
                  <div>

                  </div>
                </div>
              </div>
            </li>@endforeach
            {{-- <li class="nav-item">
              <a href="../../index2.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
              </a>
            </li> --}}
          </ul>
          </li>
          @endforeach
        </ul>
      </table>



      <!-- Card footer -->
      <div class="card-footer py-4">
        <nav aria-label="...">
          <ul class="pagination justify-content-end mb-0">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <i class="fas fa-angle-left"></i>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">
                <i class="fas fa-angle-right"></i>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div><select class="js-example-placeholder-multiple js-states form-control" multiple="multiple">

</select>
@endsection