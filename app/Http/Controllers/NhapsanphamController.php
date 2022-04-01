<?php

namespace App\Http\Controllers;

use App\Models\BookingDetail;
use App\Models\Category;
use App\Models\ComputerCompany;
use App\Models\Nhaphangsanpham;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NhapsanphamController extends Controller
{

    public function index(Request $request)
    {

        $nhap_sanpham = Nhaphangsanpham::orderBy('id', 'desc')->paginate(10);
        return view('admin.nhap_sanpham.index', compact('nhap_sanpham'));
    }

    public function addForm($id)
    {
        $findProduct = Product::find($id);
        return view('admin.nhap_sanpham.add', compact('findProduct'));
    }
    public function saveAdd(Request $request, $id)
    {

        $model = new Nhaphangsanpham();
    //    $a=json_encode
        $model->product_id = $id;
        $model->fill($request->all());
        $model->save();
        $product = Product::find($id);
        if (!empty($product)) {
            $product->qty = $product->qty + $request->qty;
            $product->save();
        }
        return redirect(route('product.index'))->with('success', 'Thêm thành công');
    }

    public function editForm($id)
    {
        $category = Nhaphangsanpham::find($id);
        if (empty($category)) {
            return redirect(route('nhap_sanpham.index'))->with('error', 'Không tìm thấy danh mục');
        }
        return view(
            'admin.nhap_sanpham.edit',
            compact('category')
        );
    }
    public function saveEdit(Request $request, $id)
    {
        $model = Nhaphangsanpham::find($id);
        $model->fill($request->all());
        $model->save();
        return redirect(route('nhap_sanpham.index'))->with('success', 'Sửa thành công');
    }
}
