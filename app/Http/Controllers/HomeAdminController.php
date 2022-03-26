<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ComputerCompany;
use App\Models\DetailProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function index(){
        $total_category=ComputerCompany::count('id');
        $total_product=Product::sum('qty');
        $total_detail_product=DetailProduct::sum('qty');
        return view('admin.index',compact('total_category','total_product','total_detail_product'));
    }
}
