@extends('admin.layouts.main')
@section('title', 'Thêm sản phẩm')
@section('content')


<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="row ml-2">
            <div class="col-6 mt-2">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="name" id="slug" class="form-control" onkeyup="ChangeToSlug()" placeholder="Tên sản phẩm">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Đường dẫn</label>
                    <input type="text" name="slug" id="convert_slug" class="form-control" placeholder="">
                    @error('slug')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select name="companyComputer_id" class="form-control">
                        <option value="">Chọn CompanyComputer</option>
                        @foreach ($ComputerCompany as $item)
                        <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                        @endforeach
                    </select>
                    @error('companyComputer_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Giá nhập</label>
                    <input type="number" name="import_price" value="{{ old('import_price') }}" class="form-control"
                        placeholder="Giá nhập">
                    @error('import_price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Giá bán</label>
                    <input type="number" name="price" value="{{ old('price') }}" class="form-control"
                        placeholder="Giá bán">

                    @error('price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="number" name="qty" value="{{ old('qty') }}" class="form-control"
                        placeholder="Số lượng">

                    @error('qty')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="qty" value="0">
            <div class="col-6 mt-2">

                <div class="form-group text-center mb-0">
                    <label for="">Chi tiết sản phẩm</label>
                </div>
                @error('value.*')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                @error('value')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="form-group row mb-1 pr-2">
                    <label for="" class="font-italic col-sm-2 col-form-label">CPU:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="" name="value[]" id="" placeholder="CPU">
                    </div>
                </div>
                <div class="form-group row mb-1 pr-2">
                    <label for="" class="font-italic col-sm-2 col-form-label">RAM:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="" name="value[]" id="" placeholder="RAM">
                    </div>
                    @error('value')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group row mb-1 pr-2">
                    <label for="" class="font-italic col-sm-2 col-form-label">Ổ cứng:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="" name="value[]" id="" placeholder="Ổ cứng">
                    </div>
                    @error('value')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group row mb-1 pr-2">
                    <label for="" class="font-italic col-sm-2 col-form-label">Card đồ họa:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="" name="value[]" id="" placeholder="Card đồ họa">
                    </div>
                    @error('value')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group row pr-2">
                    <label for="" class="font-italic col-sm-2 col-form-label">Màn hình:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="" name="value[]" id="" placeholder="Màn hình">
                    </div>
                    @error('value')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group pt-1 pr-2">
                    <label for="">Thời gian bảo hành</label>
                    <input type="number" name="insurance" value="{{ old('insurance') }}" placeholder="Thời gian bảo hành" class="form-control">
                    @error('insurance')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group pr-2">
                    <label for="">Trạng thái</label>
                    <select name="status" id="" class="form-control">
                        <option value="">Chọn trạng thái</option>
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                    @error('status')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="mt-1 text-center">
                        <div class="preview-image"> </div>
                    </div>
                    <label for="">Ảnh</label>
                    <input type="file" id="images" name="images[]" class="form-control"
                        multiple placeholder="Chọn ảnh">
                    @error('images')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    @error('images.*')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group col-12 pr-2">
                <label for="">Mô tả đầu trang</label>
                <input name="desc_short" value="{{old('desc_short')}}" class="form-control pr-2"></input>
                @error('desc_short')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-12 pr-2">
                <label for="">Mô tả</label>
                <textarea name="desc" rows="4" id="ckeditor1" class="form-control pr-2">{{old('desc')}}</textarea>
            </div>
            <div class="text-right col-12 pb-2">
                <div class="text-right">
                    <a href="{{ route('product.index') }}" class="btn btn-danger">Hủy</a>
                    &nbsp;
                    <button type="submit" class="btn btn-success mr-2 pr-2">Lưu</button>
                </div>

            </div>
        </div>
    </div>
</form>
<script src="{{asset('ckeditor')}}/ckeditor.js"></script>
<script type="text/javascript">
CKEDITOR.replace('ckeditor1');
</script>
<script>
$(function() {
    // Multiple images preview with JavaScript
    let multiImgPreview = function(input, imgPreviewPlaceholder) {

        let filesAmount = input.files.length;
        if (filesAmount > 0) {
            $('#images').on('change', function() {
                $('img.imgpre').remove();
            });
        }
        for (i = 0; i < filesAmount; i++) {
            let reader = new FileReader();
            reader.onload = function() {
                $($.parseHTML('<img>')).attr('src', reader.result).attr('class', 'imgpre').appendTo(
                    imgPreviewPlaceholder);
            }
            reader.readAsDataURL(input.files[i]);
        }
    };
    $('#images').on('change', function() {
        multiImgPreview(this, 'div.preview-image');
    });
});
</script>
<script type="text/javascript">
 
 function ChangeToSlug()
	 {
		 var slug;
		 //Lấy text từ thẻ input title 
		 slug = document.getElementById("slug").value;
		 slug = slug.toLowerCase();
		 //Đổi ký tự có dấu thành không dấu
			 slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
			 slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
			 slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
			 slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
			 slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
			 slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
			 slug = slug.replace(/đ/gi, 'd');
			 //Xóa các ký tự đặt biệt
			 slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
			 //Đổi khoảng trắng thành ký tự gạch ngang
			 slug = slug.replace(/ /gi, "-");
			 //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
			 //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
			 slug = slug.replace(/\-\-\-\-\-/gi, '-');
			 slug = slug.replace(/\-\-\-\-/gi, '-');
			 slug = slug.replace(/\-\-\-/gi, '-');
			 slug = slug.replace(/\-\-/gi, '-');
			 //Xóa các ký tự gạch ngang ở đầu và cuối
			 slug = '@' + slug + '@';
			 slug = slug.replace(/\@\-|\-\@|\@/gi, '');
			 //In slug ra textbox có id “slug”
		 document.getElementById('convert_slug').value = slug;
	 }
</script>

@endsection