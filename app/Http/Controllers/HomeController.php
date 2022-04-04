<?php

namespace App\Http\Controllers;

use App\Models\ComputerCompany;
use App\Models\DetailProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('website.index');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');

    }
    public function show(Request $request)
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
        $computerCompany_id = $request->has('computerCompany_id') ? $request->cate_id : "";
        $rq_order_by = $request->has('order_by') ? $request->order_by : 'asc';
        $rq_column_names = $request->has('column_names') ? $request->column_names : "id";

        // dd($keyword, $cate_id, $rq_column_names, $rq_order_by);
        $query = Product::where('name', 'like', "%$keyword%");
        if ($rq_order_by == 'asc') {
            $query->orderBy($rq_column_names);
        } else {
            $query->orderByDesc($rq_column_names);
        }

        if (!empty($computerCompany_id)) {
            $query->where('computerCompany_id', $computerCompany_id);
        }
        $products = $query->paginate($pageSize);
        $ComputerCompany = ComputerCompany::all();
        
        $products->load('companyComputer');
        $searchData = compact('keyword', 'computerCompany_id');
        $searchData['order_by'] = $rq_order_by;
        $searchData['column_names'] = $rq_column_names;
        return view('website.product', compact('products', 'ComputerCompany', 'column_names', 'order_by', 'searchData'));
        // return response()->json($products);
    }
    public function detail($id)
    {
        $pro = Product::find($id);
        $detailPro = DetailProduct::where('product_id', $id)->get();
        // $companyComputer_id = $pro->companyComputer_id;
        // $products = Product::where('companyComputer_id',$companyComputer_id)->get();;
        if (!$pro) {
            return back();
        }
        return view(
            'website.product-detail',
            compact('pro','detailPro')
        );
    }
    public function company($companyComputer_id)
    {   

        $products = Product::where('companyComputer_id',$companyComputer_id)->get();;
        
        // $comPany = ComputerCompany::where('companyComputer_id',$companyComputer_id)->get();
        // $pro = Product::find($id);
        // $detailPro = DetailProduct::where('id', $companyComputer_id)->get();
        if (!$products) {
            return back();
        }
        return view(
            'website.product',
            compact('products')
        );
    }
}
