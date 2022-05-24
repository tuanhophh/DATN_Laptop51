<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyComputerRequest;
use App\Models\BookingDetail;
use App\Models\Category;
use App\Models\ComputerCompany;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanyComputerController extends Controller
{

    public function index(Request $request)
    {

        $CompanyComputer = ComputerCompany::orderBy('id', 'desc')->paginate(10);
        return view('admin.CompanyComputer.index', compact('CompanyComputer'));
    }

    public function remove($id)
    {
        $CompanyComputer = ComputerCompany::find($id);
        $products = Product::where('CompanyComputer_id', '=', $id)->first();
        if (!empty($CompanyComputer)) {
            if (empty($products)) {
                ComputerCompany::where('id', $id)->delete();
                return redirect(route('CompanyComputer.index'))->with('success', 'Xóa thành công');
            } else {
                return redirect(route('CompanyComputer.index'))->with('error', 'Bạn không thể xóa khi đang còn sản phẩm');
            }
        } else {
            return redirect(route('CompanyComputer.index'))->with('error', 'Không tìm thấy danh mục');
        }
    }
    public function addForm()
    {

        $CompanyComputer = ComputerCompany::all();
        return view('admin.CompanyComputer.add', compact('CompanyComputer'));
    }
    public function saveAdd(CompanyComputerRequest $request)
    {
        $model = new ComputerCompany();
        if ($request->hasFile('anh')) {
            $imgPath = $request->file('anh')->store('products');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $request->merge(['logo'=>$imgPath]);
        }
        $model->logo = $request->logo;
        $model->company_name = $request->company_name;
        // dd($model);
        $model->save();
        return redirect(route('CompanyComputer.index'))->with('success', 'Thêm thành công');
    }

    public function editForm($id)
    {   
        
        $CompanyComputer = ComputerCompany::find($id);
        if (empty($CompanyComputer)) {
            return redirect(route('CompanyComputer.index'))->with('error', 'Không tìm thấy danh mục');
        }
        return view(
            'admin.CompanyComputer.edit',
            compact('CompanyComputer')
        );
    }
    public function saveEdit(Request $request, $id)
    {
        $request->validate([
            'company_name' => ['required'
                    ],
                    'anh' => [
                        'image','mimes:jpg,png,jpeg,gif,svg'
                    ]
        ],
        [
            'company_name.required' => 'Hãy nhập tên máy tính',
            'anh.image' => 'Phải là ảnh',
            'anh.mimes' => 'Sai dịnh dạng ảnh'
        ]);
        $model = ComputerCompany::find($id);
        if ($request->hasFile('anh')) {
            $imgPath = $request->file('anh')->store('products');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $request->merge(['logo'=>$imgPath]);
            $model->logo = $imgPath;
        }
        $model->company_name = $request->company_name;
        $model->save();
        return redirect(route('CompanyComputer.index'))->with('success', 'Sửa thành công');
    }
    
}
