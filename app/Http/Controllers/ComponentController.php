<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function index(Request $request)
    {
        // $pageSize = 10;
        // $column_names = [
        //     'name' => 'Tên  phụ kiện',
        //     'price' => 'Giá',
        // ];

        // $order_by = [
        //     'asc' => 'Tăng dần',
        //     'desc' => 'Giảm dần'
        // ];


        // $keyword = $request->has('keyword') ? $request->keyword : "";
        // $companyComputer_id = $request->has('companyComputer_id') ? $request->companyComputer_id : "";
        // $rq_order_by = $request->has('order_by') ? $request->order_by : 'asc';
        // $rq_column_names = $request->has('column_names') ? $request->column_names : "id";

        // // dd($keyword, $cate_id, $rq_column_names, $rq_order_by);
        // $query = ComponentController::where('name_component', 'like', "%$keyword%");
        // if ($rq_order_by == 'asc') {
        //     $query->orderBy($rq_column_names);
        // } else {
        //     $query->orderByDesc($rq_column_names);
        // }

        // if (!empty($companyComputer_id)) {
        //     $query->where('product_id', $companyComputer_id);
        // }
        // $details = $query->paginate($pageSize);
        // // $ComputerCompany = Product::all();

        // // $details->load('detaiProduct');
        // $searchData = compact('keyword', 'companyComputer_id');
        // $searchData['order_by'] = $rq_order_by;
        // $searchData['column_names'] = $rq_column_names;
        // return view('admin.detail-products.index', compact('details', 'ComputerCompany', 'column_names', 'order_by', 'searchData'));

        // $details = ComponentController::orderBy('id', 'desc')->paginate(10);
        // $details->load('products');
        // return view('admin.detail-products.index', compact('details'));
    }

    public function remove($id)
    {
        $model = ComponentController::find($id);
        if (!empty($model->image)) {
            $imgPath = str_replace('storage/', '', $model->image);
            Storage::delete($imgPath);
        }
        $model->delete();
        return redirect(route('detail-product.index'));
    }
    public function addForm()
    {

        return view('admin.detail-products.add', compact('products', 'categories'));
    }
    public function saveAdd(ComponentControllerRequest $request)
    {
        $model = new ComponentController();
        if ($request->hasFile('anh')) {
            $imgPath = $request->file('anh')->store('products');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $request->merge(['image' => $imgPath]);
        }

        $model->fill($request->all());
        $model->save();
        return redirect(route('detail-product.index'));
    }

    public function editForm($id)
    {
        $pro = ComponentController::find($id);
        if (!$pro) {
            return back();
        }
        return view(
            'admin.detail-products.edit',
            compact('pro')
        );
    }
    public function saveEdit(ComponentControllerRequest $request, $id)
    {
        // $request la gui du lieu len
        // dd($request->name)
        $model = ComponentController::find($id);
        Storage::delete($model->image);
        if (!$model) {
            return back();
        }
        if ($request->hasFile('anh')) {
            Storage::delete($model->image);
            $imgPath = $request->file('anh')->store('products');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $request->merge(['image' => $imgPath]);
        }

        $model->fill($request->all());
        $model->save();
        return redirect(route('detail-product.index'));
    }
}
