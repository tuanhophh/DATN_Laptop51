<?php

namespace App\Imports;

use App\Models\ComputerCompany;
use App\Models\Product;
use App\User;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Illuminate\Validation\ValidationException;

class ProductImport implements ToModel
{
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        $category=ComputerCompany::all();
        foreach ($category as $item) {
            if ($row[7] == $item->company_name) {
                $row[7] = $item->id;
            }
            // dd($row[6]);
            if($row[6]="Không bán"){
                $row[6]=0;
            }elseif($row[6]="Bán"){
                $row[6]=1;
            }

        }
// dd($row[1]);
        return new Product([
            'name'     => $row[0],
            'image'     => $row[1],
            'import_price'     => $row[2],
            'price'     => $row[3],
            'qty'     => $row[4],
            'desc'     => $row[5],
            'status'     => $row[6],
            'companyComputer_id'     => $row[7],
            'insurance' => $row[8]

        ]);
    }
    // public function onFailure(Failure ...$failures)
    // {
    //     $exception = ValidationException::withMessages(collect($failures)->map->toArray()->all());

    //     throw $exception;
    // }

    public function startRow(): int
    {   
        return 2;
    }
    // public function rules(): array
    // {
    //     return [
    //         '0' => 'required|unique',
    //         '1'=>'required|mimes:jpeg,jpg,png',
    //         '6' =>'required',
    //         '3' =>'required|integer|min:0',
    //         '2' =>'required|integer|min:0',
    //         '7' =>'required',
    //         '8'=>'required',
    //     ];
    // }

    // public function customValidationMessages()
    // {
    //     return [
    //         '0.required' => 'Tên không được để trống',
    //         '0.unique' => 'Tên đã tồn tại',
    //         '1.required' => 'ảnh không được để trống',
    //         '1.mimes' => 'không đúng định dạng ảnh',
    //         '2.required' => 'giá không được để trống',
    //         '2.integer' => 'kiểu dữ liệu phải là số',
    //         '2.min' => 'giá nhở nhất bằng 0',
    //         '3.required' => 'giá không được để trống',
    //         '3.integer' => 'kiểu dữ liệu phải là số',
    //         '3.min' => 'giá nhở nhất bằng 0',
    //         '6.required'=>'trạng thái không đc để trống',
    //         '7.required' =>'danh mục laptop không đc để trống',
    //         '8.required'=>'bảo hành không đc để trống'
    //     ];
    // }

}
