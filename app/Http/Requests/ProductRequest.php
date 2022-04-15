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
            'name' => 'required',
            'price' =>'required|integer|min:1',
            'import_price' =>'required|integer|min:1',
            'companyComputer_id' =>'required',
            'insurance'=>'required',
            'value.*' => 'required',
            'value' => 'required',
            'status' => 'required',
            'desc_short'=>'required',
            'path.*' => 'mimes:jpg,png,jpeg,gif,svg',
            'slug'=>'required|unique:products,slug,'.$this->id
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Mời bạn nhập tên sản phẩm',
            'path.*.mimes'=>'Sai định dạng ảnh',
            'price.required' =>'Mời bạn nhập giá',
            'price.integer' =>'Kiểu dữ liệu bị sai, phải là dạng số',
            'price.min' =>'Giá trị tối thiểu là 1',
            'import_price.required' =>'Mời bạn nhập giá',
            'import_price.integer' =>'Kiểu dữ liệu bị sai, phải là dạng số',
            'import_price.min' =>'Giá trị tối thiểu là 1',
            'companyComputer_id.required' =>'Bạn chưa chọn danh mục laptop',
            'insurance.required'=>'Bạn chưa nhập thời gian bảo hành',
            'value.*.required' => 'Mời bạn nhập chi tiết sản phẩm',
            'value.required' => 'Mời bạn nhập chi tiết sản phẩm',
            'desc_short.required' => 'Mời bạn nhập mô tả',
            'status.required' => 'Mời bạn nhập trạng thái',
            'slug.required' => 'Mời bạn slug',
            'slug.unique' => 'Slug không được trùng',
        ];
    }

}
