<?php

namespace App\Http\Controllers;

use App\Models\ComputerCompany;
use App\Models\DetailProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware(['auth','verify']);
    // }
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
        $productNew = Product::where('status', 1)->orderBy('id', 'DESC')->get()->take(4);
        // dd($productNew);
        $products = Product::where('status', 1)->get();
        // $searchData = compact('keyword', 'computerCompany_id');
        return view('website.product', compact('products', 'ComputerCompany', 'productNew'));
        $products = Product::where('status', 1)->get();
        foreach ($products as $product) {
            $images = DB::table('product_images')->get();
        }
        // $searchData = compact('keyword', 'computerCompany_id');
        return view('website.product', compact('products', 'ComputerCompany', 'productNew', 'images'));
        // return response()->json($products);
    }
    public function detail($slug)
    {
        $ComputerCompany = ComputerCompany::all();
        $pro = Product::where('slug', $slug)->first();
        // dd($ComputerCompany);
        if (!$pro || !$ComputerCompany) {
            $productNew = Product::where('status', 1)->orderBy('id', 'DESC')->get()->take(4);
            $products = Product::where('status', 1)->get();
            $images = DB::table('product_images')->get();
            return view('website.product', compact('productNew', 'ComputerCompany', 'products', 'images'))->with('error', 'Không tìm thấy sản phẩm');
        }
        // $countPro = Product::where('');
        // ->join('computer_companies', 'products.companyComputer_id', '=', 'computer_companies.id')->select()->first();
        $detailPro = DB::table('attribute_value')->where('product_id', $pro->id)->get();
        // dd(DB::table('attribute_value')->where('product_id',$id)->get());
        $products = Product::where('companyComputer_id', $pro->companyComputer_id)->where('status', 1)->get()->take(4);
        $images = DB::table('product_images')->get();
        // dd($detailPro);

        return view(
            'website.product-detail',
            compact('pro', 'detailPro', 'products', 'images')
        );
    }
    public function company($id)
    {
        $products = Product::where('companyComputer_id', $id)->get();;

        $ComputerCompany = ComputerCompany::find($id);
        $images = DB::table('product_images')->get();
        // dd($ComputerCompany = ComputerCompany::find($id)->first());
        // $comPany = ComputerCompany::where('companyComputer_id',$companyComputer_id)->get();
        // $ComputerCompany = ComputerCompany::where('id',$id)->get();
        // $pro = Product::find($id);
        // $detailPro = DetailProduct::where('id', $companyComputer_id)->get();
        if ($ComputerCompany == NULL) {
            return back()->with('error', 'Không tìm thấy danh mục sản phẩm');
        }
        return view(
            'website.product-category',
            compact('products', 'ComputerCompany', 'images')
        );
    }
    public function seachproduct($name)
    {

        $ComputerCompany = ComputerCompany::all();
        $productNew = Product::where('status', 1)->where('name', 'like', '%' . $name . '%')->get();
        // dd($productNew);
        $products = Product::where('status', 1)->get();
        return view('website.product', compact('products', 'ComputerCompany', 'productNew'));
    }
}
