<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\Category;
use App\Models\DetailProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DetailProductController extends Controller
{
    public function index(Request $request)
    {
        $details = DetailProduct::orderBy('id', 'desc')->paginate(10);
        $details->load('products');
        return view('admin.detail-products.index', compact('details'));
    }

    public function remove($id)
    {
        $model = DetailProduct::find($id);
        if (!empty($model->image)) {
            $imgPath = str_replace('storage/', '', $model->image);
            Storage::delete($imgPath);
        }
        $model->delete();
        return redirect(route('detail-product.index'));
    }
    public function addForm()
    {
        $products=Product::all();
        return view('admin.detail-products.add',compact('products'));
    }
    public function saveAdd(Request $request)
    {
        $model = new DetailProduct();
        if ($request->hasFile('image')) {
            $imgPath = $request->file('image')->store('public/detail-products');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->image = $imgPath;
        }

        $model->fill($request->all());
        $model->save();
        return redirect(route('detail-product.index'));
    }

    public function editForm($id)
    {
        $pro = DetailProduct::find($id);
        if (!$pro) {
            return back();
        }
        return view(
            'admin.detail-products.edit',
            compact('pro')
        );
    }
    public function saveEdit(Request $request, $id)
    {
        // $request la gui du lieu len
        // dd($request->name)
        $model = DetailProduct::find($id);
        Storage::delete($model->image);
        if (!$model) {
            return back();
        }
        if ($request->hasFile('image')) {
            $imgPath = $request->file('image')->store('public/detail-products');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->image = $imgPath;
        }

        $model->fill($request->all());
        $model->save();
        return redirect(route('detail-product.index'));
    }
}