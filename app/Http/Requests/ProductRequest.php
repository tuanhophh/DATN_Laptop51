<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name,'.$this->id,
            'price' =>'required|numeric|min:50000',
            'import_price' =>'required|numeric|min:1',
            'companyComputer_id' =>'required',
            'insurance'=>'required|between:0,36',
            'qty' => 'required|min:1',
            'status' => 'required|between:0,1',
            'desc_short'=>'required',
            'ram'=>'required',
            'cpu'=>'required',
            'cardgraphic'=>'required',
            'screen'=>'required',
            'harddrive'=>'required',
            'images.*' => 'mimes:jpg,png,jpeg,gif,svg',
            'slug'=>'required|unique:products,slug,'.$this->id,
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Mời bạn nhập tên sản phẩm',
            'images.*.mimes'=>'Sai định dạng ảnh',
            'images.mimes'=>'Sai định dạng ảnh',
            'images.*.required'=>'Yêu cầu nhập ảnh',
            'price.required' =>'Mời bạn nhập giá',
            'qty.required' =>'Mời bạn số lương',
            'qty.min' =>'Số lượng nhỏ nhất là 0',
            'price.numeric' =>'Kiểu dữ liệu bị sai, phải là dạng số',
            'price.min' =>'giá bán tối thiểu là 50.000 vnđ',
            'import_price.required' =>'Mời bạn nhập giá',
            'import_price.numeric' =>'Kiểu dữ liệu bị sai, phải là dạng số',
            'import_price.min' =>'Giá trị tối thiểu là 1 vnđ',
            'companyComputer_id.required' =>'Bạn chưa chọn danh mục laptop',
            'insurance.required'=>'Bạn chưa nhập thời gian bảo hành',
            'insurance.between'=>'Thời gian bảo hành từ 0 đến 36 tháng',
            'desc_short.required' => 'Mời bạn nhập mô tả',
            'status.required' => 'Mời bạn nhập trạng thái',
            'status.between' => 'Mời bạn chọn lại trạng thái',
            'slug.required' => 'Mời bạn nhập đường dẫn',
            'slug.unique' => 'Đường dẫn không được trùng',
            'name.unique' => 'Tên sản phẩm không được trùng',
            'ram.required' => 'Mời bạn nhập ram',
            'cpu.required' => 'Mời bạn nhập cpu',
            'cardgraphic.required' => 'Mời bạn nhập Card đồ họa',
            'screen.required' => 'Mời bạn nhập màn hình',
            'harddrive.required' => 'Mời bạn nhập ổ cứng',
            
        ];
    }

}
