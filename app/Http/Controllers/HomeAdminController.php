<?php

namespace App\Http\Controllers;

use App\Models\BillDetail;
use App\Models\Booking;
use App\Models\Category;
use App\Models\ComputerCompany;
use App\Models\DetailProduct;
use App\Models\Product;
use App\Models\RepairPart;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $total_category=ComputerCompany::count('id');
        $total_product=Product::count('id');
        $total_detail_product=DetailProduct::count('id');
        $total_repair=Booking::count('id');
        $total_order=BillDetail::count('id');
        // dd($total_order);
        return view('admin.index',compact('total_category','total_product','total_detail_product','total_repair','total_order'));
    }
}
