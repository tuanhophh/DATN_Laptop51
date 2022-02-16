@extends('admin.layouts.main')
@section('content')
<form action="" class="row-8">
    @csrf
    <div class="col-4">
      <label for="">Họ Tên</label>
      <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
      <small id="helpId" class="form-text text-muted">Help text</small>
   </div> 
  <div class="col-4">
      <label for="">SDT</label>
      <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
      <small id="helpId" class="form-text text-muted">Help text</small>
   </div> 
  <div class="col-4">
      <div class="form-group">
         <label for="">Loại máy tính</label>

        <select class="form-control" name="" id="">
          <option></option>
          <option></option>
          <option></option>
        </select>
      </div>
   </div> 
  <div class="col-4">         <label for="">Hinh thuc</label> <br>

      <div class="form-check form-check-inline">
          <label class="form-check-label">
              <input class="form-check-input" type="radio" name="repair_type" id="" value="TN"> Tại nhà
          </label>
          <label class="form-check-label">
              <input class="form-check-input" type="radio" name="repair_type" id="" value="CH"> Cửa hàng
          </label>
      </div>
   </div> 
  <div class="col-4">
      <label for="">Thời gian</label>
      <input type="" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
      <small id="helpId" class="form-text text-muted">Help text</small>
   </div> 
 
 
</form>
@endsection