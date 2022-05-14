<?php

namespace App\Imports;

use App\Models\ComputerCompany;
use App\Models\Product;
use App\User;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Illuminate\Validation\ValidationException;

class ProductImport implements ToModel, WithStartRow, WithValidation, SkipsOnError
{
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        $category = ComputerCompany::query()->where("company_name","=", $row[7])->first();

        if ($row[6] == "Không bán") {
            $row[6] = 0;
        } elseif ($row[6] == "Bán") {
            $row[6] = 1;
        }

        return Product::query()->updateOrCreate([
            'name' => $row[0]
        ],[
            'image' => $row[1],
            'import_price' => $row[2],
            'price' => $row[3],
            'qty' => intval($row[4]),
            'desc' => $row[5],
            'status' => $row[6],
            'companyComputer_id' => $category->id,
            'insurance' => $row[8]
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
        return [
            '0' => 'required|exists:products,id',
            '1' => 'required|string',
            '6' => 'required',
            '3' => 'required|integer|min:0',
            '4' => 'nullable|numeric|min:0',
            '2' => 'required|integer|min:0',
            '7' => 'required|exists:computer_companies,company_name',
            '8' => 'required|numeric',
        ];
    }

    public function customValidationMessages()
    {
        return [
            '0.required' => 'Tên sản phẩm không được để trống',
            '0.exists' => 'Tên sản phẩm đã tồn tại',
            '1.required' => 'Ảnh không được để trống',
            '2.required' => 'Giá không được để trống',
            '2.integer' => 'Kiểu dữ liệu phải là số',
            '2.min' => 'Giá nhỏ nhất bằng 0',
            '3.required' => 'Giá không được để trống',
            '3.integer' => 'Kiểu dữ liệu phải là số',
            '3.min' => 'Giá nhỏ nhất bằng 0',
            
            '4.numeric' => 'Kiểu dữ liệu phải là số',
            '4.min' => 'Số lượng nhỏ nhất bằng 0',
            '6.required' => 'Trạng thái không được để trống',
            '7.required' => 'Danh mục laptop không được để trống',
            '7.exists' => 'Danh mục không tồn tại',
            '8.required' => 'Bảo hành không được để trống',
            '8.numeric' => 'Bảo hành phải là một số'
        ];
    }
}
