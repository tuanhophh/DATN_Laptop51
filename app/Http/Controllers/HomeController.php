<?php

namespace App\Http\Controllers;

use App\Models\ComputerCompany;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Route;

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
        session()->put('url_path',FacadesRequest::path());
        $product_hot_sell = Product::select('bill_details.*', 'products.*', DB::raw('SUM(bill_details.qty) As total'))
        ->join('bill_details', 'bill_details.product_id', '=', 'products.id')
        ->groupBy('products.id')
        ->get()
        ->take(8);
        $ComputerCompany = ComputerCompany::all();
        $productNew = Product::where('status', 1)->orderBy('id', 'DESC')->get()->take(8);
        // dd($productNew);
        $products = Product::where('status', 1)->get();
        $images = DB::table('product_images')->get();
        // $searchData = compact('keyword', 'computerCompany_id');
        return view('website.index', compact('products', 'ComputerCompany', 'productNew', 'images','product_hot_sell'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return back();
    }
    public function show(Request $request)
    {   
        session()->put('url_path',FacadesRequest::path());
        $product_hot_sell = Product::select('bill_details.*', 'products.*', DB::raw('SUM(bill_details.qty) As total'))
            ->join('bill_details', 'bill_details.product_id', '=', 'products.id')
            ->groupBy('products.id')
            ->get();
        $ComputerCompany = ComputerCompany::all();
        $productNew = Product::where('status', 1)->orderBy('id', 'DESC')->paginate(10);
        $images = DB::table('product_images')->get();
        // $product_hot_sell =
        return view('website.product', compact( 'ComputerCompany', 'productNew', 'images', 'product_hot_sell'));
    }
    public function detail($slug)
    {   
        session()->put('url_path',FacadesRequest::path());
        $ComputerCompany = ComputerCompany::all();
        $pro = Product::where('slug', $slug)->first();
        // dd($ComputerCompany);
        if (!$pro || !$ComputerCompany) {
            // $productNew = Product::where('status', 1)->orderBy('id', 'DESC')->get()->take(4);
            // $products = Product::where('status', 1)->get();
            // $images = DB::table('product_images')->get();
            return abort(404);
        }
        $product_hot_sell = Product::select('bill_details.*', 'products.*', DB::raw('SUM(bill_details.qty) As total'))
        ->join('bill_details', 'bill_details.product_id', '=', 'products.id')
        ->groupBy('products.id')
        ->get()
        ->take(6);
        // $countPro = Product::where('');
        $detailPro = DB::table('attribute_value')->where('product_id', $pro->id)->get();
        $productsComputerCompany = Product::where('companyComputer_id', $pro->companyComputer_id)->where('status', 1)->get()->take(8);
        $images = DB::table('product_images')->where('product_id', $pro->id)->get();
        $images_product_list = DB::table('product_images')->get();
        return view(
            'website.product-detail',
            compact('pro', 'detailPro', 'productsComputerCompany', 'images', 'ComputerCompany','product_hot_sell','images_product_list')
        );
    }
    public function company($id)

    {   
        session()->put('url_path',FacadesRequest::path());
        $products = Product::where('companyComputer_id', $id)->get();
        $ComputerCompany = ComputerCompany::all();
        $images = DB::table('product_images')->get();
        // dd($ComputerCompany = ComputerCompany::find($id)->first());
        // $comPany = ComputerCompany::where('companyComputer_id',$companyComputer_id)->get();
        // $ComputerCompany = ComputerCompany::where('id',$id)->get();
        // $pro = Product::find($id);
        // $detailPro = DetailProduct::where('id', $companyComputer_id)->get();
        if ($ComputerCompany == null) {
            return back()->with('error', 'Không tìm thấy danh mục sản phẩm');
        }
        return view(
            'website.product-category',
            compact('products', 'ComputerCompany', 'images','id')
        );
    }
    public function seachproduct($name)
    {
        $ComputerCompany = ComputerCompany::all();
        $productNew = Product::where('status', 1)->where('name', 'like', '%' . $name . '%')->get();
        $images = DB::table('product_images')->get();
        // dd($productNew);
        $products = Product::where('status', 1)->get();
        return view('website.product', compact('products', 'ComputerCompany', 'productNew','images'));
    }
}
