{{-- @extends('admin.layouts.main')
@section('content')

<div class="mx-auto">
    <h5 class="">Màn hình sửa chữa <h5>
            <div>
                <div>
                    <p>Họ tên: {{ $booking->full_name }}</p>
                    <p>SDT</p>
                </div>
            </div>
</div>

<form action="">
    <div class="form-group">
        <label for=""></label>
        <select class="form-select form-select-lg mb-3" name="" id="category" multiple="multiple">
            <option selected="selected">orange</option>
            <option>white</option>
            <option>purple</option>
        </select>
    </div>
    {!! Form::open(['method' => 'post']) !!}
    {!! Form::select('category', $arr_pd,["multiple"=>"multiple"]) !!}
    {!! Form::select($name, $list, $selected, [$options]) !!}
    {!! Form::submit('Lưu') !!}
    {!! Form::close() !!}
</form>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("#category").select2()
</script>

@endsection --}}


<!DOCTYPE html>
<html>

<head>
    <title>Laravel - Dynamic autocomplete search using select2 JS Ajax-nicesnippets.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    {{-- @extends('admin.layouts.style') --}}

</head>

<body onload="validateSelectBox()" class="">
    <style>
        .mota img {
            max-width: 70px;
        }
    </style>
    {{-- <div class="container mt-4 "> --}}
        <div class="row card bg-success p-2 text-dark bg-opacity-10 bg-opacity-10">
            <div class=" row">
                <div class="col">
                    <div class="row ">
                        <div class="col">
                            <h5>Họ tên :</h5>
                            <p>{{ $booking->full_name }}</p>
                        </div>
                        <div class="col">
                            <h5>Số điện thoại</h5>
                            <p>{{ $booking->phone }}</p>
                        </div>
                    </div>

                    <div>
                        <h5>Tên máy :</h5>
                        <p>{{ $booking_detail->name_computer }}</p>
                    </div>


                    <h5>Mô tả tình trạng: </h5>

                    <div class="form-control  border border-success mota mb-4" style="--bs-bg-opacity: .1">
                        {!! 'eugfieh' !!}
                    </div>
                </div>
                <div class="col">
                    <form action="" method="POST">
                        @csrf
                        <div class="card">

                            <div class="card-header">
                                <h4>Lựa chọn linh kiện muốn thay thế</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="itemName form-control" name="repairs[]"
                                            onchange="validateSelectBox(this)" multiple='multiple'>

                                            @foreach ($product_detail as $pd)
                                            <option @if (in_array($pd->id,$arr_pd)==true)
                                                selected
                                                @endif value="{{ $pd->id }}">{{ $pd->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for=""></label>
                                <h5>Mô tả sửa chữa</h5>
                                <textarea class="form-control" name="description" id="ckeditor1" rows="3"></textarea>
                            </div>
                            <h3>Danh sách Linh kiện bạn đã chọn:</h3>
                            <div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên linh kiện</th>
                                            <th>Số lượng</th>
                                            <th>Giá tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody id="abc">
                                        <tr>
                                            {{-- <td scope="row">ằda</td>
                                            <td> <input type="number" name="soluong"></td>
                                            <td>ưdaq</td> --}}
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            {{-- <button type="submit">Hoàn thành sửa</button> --}}
                            <div class="d-flex justify-content-between">
                                <div><a name="btn" id="" class="btn btn-danger" href="#" role="button">Hủy sửa</a>
                                    <button type="submit" class="btn btn-primary" name="btn" value="pause">Tạm dừng
                                        sửa</button>
                                </div>
                                <div><button name="btn" type="submit" value="finish" class="btn btn-success">Hoàn
                                        thành sửa</button>
                                </div>
                            </div>
                    </form>

                </div>
            </div>
            {{--
        </div> --}}
    </div>
    </div>
</body>
<script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('ckeditor');
  CKEDITOR.replace('ckeditor1');

</script>
<script type="text/javascript">
    $('.itemName').select2(
);

function validateSelectBox(obj){
    
var options = obj.children; 
console.log(obj.valuea);
var html = '';

var j=0;
for (var i = 0; i < options.length; i++){
     if (options[i].selected){
         var id=options[i].value;
         $.ajax({
        url: `/admin/sua-chua/detail-product/`+id,
        method: 'get',
        dataType: 'json',
        success : function (data){
                        console.log(data);
                        
                 html +=`<tr>   
            
                <td class="na">${data.id}</td>
                 <td class="na">${data.name}</td>
                  <td><input type="number" name="soluong[${data.id}]" value="1"> </td>

                 <td>${data.price}</td>
                 </tr>`; 
                 document.getElementById('abc').innerHTML=html

                    }
              })
            
              j++
            }   

    }
        if(j==0){
            document.getElementById('abc').innerHTML=''             }
        }
        
    function sumMoney(quantity){
        
    }
</script>

</html>