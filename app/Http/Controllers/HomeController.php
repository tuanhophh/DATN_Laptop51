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

        // dd($keyword, $cate_id, $rq_column_names, $rq_order_by);
        
        $ComputerCompany = ComputerCompany::all();
        $productNew = Product::all();
        $products = Product::all();

        // $searchData = compact('keyword', 'computerCompany_id');
        return view('website.product', compact('products', 'ComputerCompany','productNew'));
        // return response()->json($products);
    }
    public function detail($id)
    {
        $ComputerCompany = ComputerCompany::all();    
        $pro = Product::find($id);
        // $countPro = Product::where('');
        // ->join('computer_companies', 'products.companyComputer_id', '=', 'computer_companies.id')->select()->first();
        $detailPro = DetailProduct::where('product_id', $id)->get();
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
