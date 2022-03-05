<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request)
    {

        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function remove($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id', '=', $id)->first();
        if (!empty($category)) {
            if (empty($products)) {
                Category::where('id',$id)->delete();
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

        $categories = Category::all();
        return view('admin.categories.add', compact('categories'));
    }
    public function saveAdd(Request $request)
    {
        $model = new Category();
        $model->fill($request->all());
        $model->save();
        return redirect(route('category.index'))->with('success', 'Thêm thành công');
    }

    public function editForm($id)
    {
        $category = Category::find($id);
        // dd($category);
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
        $model = Category::find($id);
        $model->fill($request->all());
        $model->save();
        return redirect(route('category.index'))->with('success', 'Sửa thành công');
    }
    public function detail($id)
    {
        $category = Category::find($id);
        $category->load('products');
        return view('admin.categories.detail', compact('category'));
    }
}
