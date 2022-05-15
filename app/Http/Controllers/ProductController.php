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
        $products=Product::paginate(10);
        return view('admin.products.index', compact('products'));
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
        $model->cpu = $request->cpu;
        $model->ram = $request->ram;
        $model->cardgraphic = $request->cardgraphic;
        $model->screen = $request->screen;
        $model->harddrive = $request->harddrive;
        $model->save();
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
        $model->cpu = $request->cpu;
        $model->ram = $request->ram;
        $model->cardgraphic = $request->cardgraphic;
        $model->screen = $request->screen;
        $model->harddrive = $request->harddrive;
        $model->save();
        $images = DB::table('product_images')->where('product_id', $id)->get();

        if ($request->hasfile('anh')) {
            foreach ($request->file('anh') as $key => $file) {
                $imgPath = $request->file('anh')->store('products');
                $imgPath = str_replace('public/', 'storage/', $imgPath);
                $a = $request->merge(['image' => $imgPath]);
                $insert[$key]['name_image'] = $a;
                $insert[$key]['product_id'] = $model->id;
                $insert[$key]['path'] = $imgPath;
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
            return back()->with('success', 'Ẩn sản phẩm thành công');
        } else {
            $model['status'] = 1;
            $model->save();
            return back()->with('success', 'Hiện sản phẩm thành công');
        }
    }

    // public function logOut()
    // {
    //     $response = Http::withHeaders([
    //         'X-Auth-Token' => cookie()->get('aa'),                                                   
    //         'X-User-Id' => "QKCnYgf38Mn4SCsk6",
    //         'Content-Type'  => "application/json"
    //     ])
    //         ->get('http://10.1.38.174:3000/api/v1/logout');
    //     dd($response->json());
    // }
}
