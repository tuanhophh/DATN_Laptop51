<?php

namespace App\Http\Controllers;

// use App\Helpers\Http;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\SaveProductRequest;
use App\Models\Category;
use App\Models\ComputerCompany;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // dd($product=Product::all());
        $pageSize = 10;
        $column_names = [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá',
        ];

        $order_by = [
            'asc' => 'Tăng dần',
            'desc' => 'Giảm dần'
        ];


        $keyword = $request->has('keyword') ? $request->keyword : "";
        $companyComputer_id = $request->has('companyComputer_id') ? $request->companyComputer_id : "";
        $rq_order_by = $request->has('order_by') ? $request->order_by : 'asc';
        $rq_column_names = $request->has('column_names') ? $request->column_names : "id";

        // dd($keyword, $cate_id, $rq_column_names, $rq_order_by);
        $query = Product::where('name', 'like', "%$keyword%");
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
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imgPath = $request->file('image')->store('products');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->image = $imgPath;

        }

        $model->fill($request->all());
        $model->save();
        return redirect(route('product.index'));
    }

    public function editForm($id)
    {
        $pro = Product::find($id);
        if (!$pro) {
            return redirect(route('error'));
        }
        $ComputerCompany = ComputerCompany::all();
        return view(
            'admin.products.edit',
            compact('pro', 'ComputerCompany')
        );
    }
    public function saveEdit(ProductRequest $request, $id)
    {
        $model = Product::find($id);

        if ($request->hasFile('image')) {
            // $oldImg = str_replace('storage/', 'public/', $model->image);
            Storage::delete($model->image);

            $imgPath = $request->file('image')->store('products');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->image = $imgPath;
        }

        $model->fill($request->all());
        $model->save();
        return redirect(route('product.index'));
    }

    // public function postLogin()
    // {
    //     $data = Http::post('http://10.1.38.174:3000/api/v1/login', [
    //         'username' => 'hop',
    //         'password' => 'tuanhop96'
    //     ]);
    //     $post = json_decode($data->getBody()->getContents());
    //     $a=session()->put('aa',$post->data->authToken);
    //     $token = request()->session()->get('aa');
    //     dd($token);
    //     // dd($post->data->authToken);
    //     // return response()->json($post);
    // }

    // public function getUserInfo()
    // {
    //     // dd(request()->session('aa'));
    //     $response = Http::withHeaders([
    //         'X-Auth-Token' =>session('aa'),
    //         'X-User-Id' => "QKCnYgf38Mn4SCsk6",
    //         'Content-Type'  => "application/json"
    //     ])
    //         ->get('http://10.1.38.174:3000/api/v1/users.info', [
    //             'userId' => 'QKCnYgf38Mn4SCsk6'
    //         ]);
    //     dd($response->json());
    // }

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
