<?php

namespace App\Http\Controllers;

// use App\Helpers\Http;

use App\Http\Requests\ProductRequest;
use App\Models\ComputerCompany;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // dd($product=Product::all());
        $pageSize = 8;
        $column_names = [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá',
        ];

        $order_by = [
            'asc' => 'Tăng dần',
            'desc' => 'Giảm dần',
        ];

        $keyword = $request->has('keyword') ? $request->keyword : "";
        $companyComputer_id = $request->has('companyComputer_id') ? $request->companyComputer_id : "";
        $rq_order_by = $request->has('order_by') ? $request->order_by : 'asc';
        $rq_column_names = $request->has('column_names') ? $request->column_names : "id";

        // dd($keyword, $cate_id, $rq_column_names, $rq_order_by);
        $query = Product::orderBy('id', 'desc')->where('name', 'like', "%$keyword%");
        if ($rq_order_by == 'asc') {
            $query->orderBy($rq_column_names);
        } else {
            $query->orderByDesc($rq_column_names);
        }

        if (!empty($companyComputer_id)) {
            $query->where('companyComputer_id', $companyComputer_id);
        }
        $products = $query->paginate($pageSize);
        $ComputerCompany = ComputerCompany::all();

        $products->load('companyComputer');
        $searchData = compact('keyword', 'companyComputer_id');
        $searchData['order_by'] = $rq_order_by;
        $searchData['column_names'] = $rq_column_names;
        return view('admin.products.index', compact('products', 'ComputerCompany', 'column_names', 'order_by', 'searchData'));
        // return response()->json($products);
    }

    public function remove($id)
    {
        $model = Product::find($id);
        if (!empty($model)) {
            if (!empty($model->image)) {
                $imgPath = str_replace('storage/', '', $model->image);
                Storage::delete($imgPath);
            }
            $model->delete();
            return redirect(route('product.index'))->with('success', 'Xóa thành công');
        } else {
            return redirect(route('error'));
        }
    }

    public function addForm()
    {
        $ComputerCompany = ComputerCompany::all();
        return view('admin.products.add', compact('ComputerCompany'));
    }

    public function saveAdd(ProductRequest $request)
    {
        $model = new Product();

        $model->name = $request->name;
        $model->slug = $request->slug;
        $model->desc_short = $request->desc_short;
        $model->import_price = $request->import_price;
        $model->price = $request->price;
        $model->qty = $request->qty;
        $model->desc = $request->desc;
        $model->status = $request->status;
        $model->companyComputer_id = $request->companyComputer_id;
        $model->insurance = $request->insurance;
        $model->save();
        $values = $request->value;
        $data = [];
        $i = 0;
        foreach ($values as $value) {
            $i += 1;
            $data[] = [
                'product_id' => $model->id,
                'category_id' => $i,
                'value' => $value,
            ];
        }
        DB::table('attribute_value')->insert($data);
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $path = $file->store('products');
                $path = str_replace('public/', 'storage/', $path);
                $name = $file->getClientOriginalName();
                $insert[$key]['name_image'] = $name;
                $insert[$key]['product_id'] = $model->id;
                $insert[$key]['path'] = $path;
            }
            DB::table('product_images')->insert($insert);
        }
        return redirect(route('product.index'));
    }

    public function editForm($id)
    {
        $pro = Product::find($id);
        $attribute_value = DB::table('attribute_value')->where('product_id', $pro->id)->get();
        $images = DB::table('product_images')->where('product_id', $id)->get();
        if (!$pro) {
            return redirect(route('error'));
        }
        $ComputerCompany = ComputerCompany::all();
        return view(
            'admin.products.edit',
            compact('pro', 'ComputerCompany', 'attribute_value', 'images')
        );
    }

    public function saveEdit(ProductRequest $request, $id)
    {
        $model = Product::find($id);
        $model->name = $request->name;
        $model->slug = $request->slug;
        $model->desc_short = $request->desc_short;
        $model->import_price = $request->import_price;
        $model->price = $request->price;
        $model->qty = $request->qty;
        $model->desc = $request->desc;
        $model->status = $request->status;
        $model->companyComputer_id = $request->companyComputer_id;
        $model->insurance = $request->insurance;
        $model->save();
        $images = DB::table('product_images')->where('product_id', $id)->get();

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $path = $file->store('products');
                $path = str_replace('public/', 'storage/', $path);
                $name = $file->getClientOriginalName();
                $insert[$key]['name_image'] = $name;
                $insert[$key]['product_id'] = $model->id;
                $insert[$key]['path'] = $path;
            }
            foreach ($images as $image) {
               
                $id = $image->id;
                $image_path = $image->path;
                // if($image_path){
                //     unlink($image_path);
                // }
                DB::table('product_images')->delete($id);
            }
            DB::table('product_images')->insert($insert);
        }

        return redirect(route('product.index'));
    }

    public function ShowHide(Request $request, $id)
    {
        $model = Product::find($id);
        if ($model->status == 1) {
            $model['status'] = 0;
            $model->save();
            return back()->with('success', 'Hiện thành công');
        } else {
            $model['status'] = 1;
            $model->save();
            return back()->with('success', 'Ẩn thành công');
        }

    }

}
