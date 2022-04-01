<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ControllerRequest extends FormRequest
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
        $requestRule =  [
            'name' => [
                'required',
                Rule::unique('products')->ignore($this->id)
            ],
            'price' => 'required|min:0',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'quantity' => 'nullable|integer|min:0'
        ];
        
        if($this->id == null){
            $requestRule['image'] = "required|" . $requestRule['image'];
        }

        return $requestRule;
    }

    public function messages()
    {
        return [
            'name.required' => 'Hãy nhập tên sản phẩm',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'price.required' => 'Hãy nhập giá sản phẩm',
            'price.min' => 'Giá sản phẩm không được là số âm',
            'image.required' => 'Hãy chọn ảnh sản phẩm',
            'image.mimes' => 'Cần chọn đúng định dạng ảnh',
            'quantity.integer' => 'Cần nhập số nguyên',
            'quantity.min' => 'Số lượng không được là số âm'
        ];
    }
}
