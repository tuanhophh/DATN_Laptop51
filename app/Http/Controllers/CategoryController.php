<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ComputerCompany;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request)
    {

        $categories = ComputerCompany::orderBy('id', 'desc')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function remove($id)
    {
        $category = ComputerCompany::find($id);
        $products = Product::where('category_id', '=', $id)->first();
        if (!empty($category)) {
            if (empty($products)) {
                ComputerCompany::where('id',$id)->delete();
                return redirect(route('category.index'))->with('success', 'Xóa thành công');
            } else {
                return redirect(route('category.index'))->with('error', 'Bạn không thể xóa khi đang còn sản phẩm');
            }
        } else {
            return redirect(route('category.index'))->with('error', 'Không tìm thấy danh mục');
        }
    }
    public function addForm()
    {

        $categories = ComputerCompany::all();
        return view('admin.categories.add', compact('categories'));
    }
    public function saveAdd(Request $request)
    {
        $model = new ComputerCompany();
        $model->fill($request->all());
        $model->save();
        return redirect(route('category.index'))->with('success', 'Thêm thành công');
    }

    public function editForm($id)
    {
        $category = ComputerCompany::find($id);
        if (empty($category)) {
            return redirect(route('category.index'))->with('error', 'Không tìm thấy danh mục');
        }
        return view(
            'admin.categories.edit',
            compact('category')
        );
    }
    public function saveEdit(Request $request, $id)
    {
        $model = ComputerCompany::find($id);
        $model->fill($request->all());
        $model->save();
        return redirect(route('category.index'))->with('success', 'Sửa thành công');
    }
    public function detail($id)
    {
        $category = ComputerCompany::find($id);
        $category->load('products');
        return view('admin.categories.detail', compact('category'));
    }
}
