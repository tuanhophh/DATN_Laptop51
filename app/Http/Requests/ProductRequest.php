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
            'name' => 'required|unique',
            'image'=>'mimes:jpeg,jpg,png',
            'price' =>'required|integer|min:0',
            'import_price' =>'required|integer|min:0',
            'companyComputer_id' =>'required',
            'insurance'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'mời bạn nhập tên sản phẩm',
            'name.unique' => 'tên sản phẩm đã tồn tại',
            'image.mimes'=>'sai định dạng ảnh',
            'price.required' =>'mời bạn nhập giá',
            'price.integer' =>'kiểu dữ liệu bị sai, phải là dạng số',
            'price.min' =>'giá trị tối thiểu là 0',
            'import_price.required' =>'mời bạn nhập giá',
            'import_price.integer' =>'kiểu dữ liệu bị sai, phải là dạng số',
            'import_price.min' =>'giá trị tối thiểu là 0',
            'companyComputer_id.required' =>'bạn chưa chọn danh mục laptop',
            'insurance.required'=>'bạn chưa nhập thời gian bảo hành',
        ];
    }

}
