<?php

namespace App\Http\Controllers;

use App\Models\ComputerCompany;
use App\Models\list_bill;
use App\Models\Product;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserRepair;
use App\Models\bill_detail;
use App\Models\Booking;
use App\Models\CategoryComponent;
use App\Models\Component;
use App\Models\ComponentComputerConpany;
use Illuminate\Validation\Validator;

class HomeAdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $total_category = ComputerCompany::count('id');
    $total_product = Product::count('id');
    $total_user = User::count();
    $total_bill = list_bill::where('type',1)->count('id');
    $total_order = Booking::count('id');
    $total_componentComputerConpany=CategoryComponent::count('id');
    $total_component=Component::count('id');

    // tong doanh thu 
    $doanhthutong = list_bill::sum('total_price');
    $sotiennhap = bill_detail::sum('nhap');
    $sotienban = bill_detail::sum('ban');
    $sotienlai = $sotienban - $sotiennhap;

    //doanh thu sửa chữa
    $doanhthusuachua = list_bill::where('type', 1)->sum('total_price');
    $sotiennhapsuachua = bill_detail::whereNotNull('component_id')->sum('nhap');
    $sotienbansuachua = bill_detail::whereNotNull('component_id')->sum('ban');
    $sotienlaisuachua = $sotienban - $sotiennhap;

    //doanh thu bán
    $doanhthutongban = list_bill::where('type', 2)->sum('total_price');
    $sotiennhapban = bill_detail::whereNotNull('product_id')->sum('nhap');
    $sotienbanban = bill_detail::whereNotNull('product_id')->sum('ban');
    $sotienlaiban = $sotienban - $sotiennhap;

    //top thể loại
    $socacsanphamdaban = bill_detail::whereNotNull('product_id')->distinct()->limit(10)->pluck('product_id');
    $datasanphamban = [];
 
    foreach($socacsanphamdaban as $sanpham){
      $product = Product::find($sanpham)['name'];
      array_push($datasanphamban,[['name'=>$product,'quaty'=>bill_detail::where('product_id',$sanpham)->count()]]);
    }
    // top nv sửa chữa
    $datanhanvien = [];
    $topnvsuachua = UserRepair::where('status',2)->distinct()->limit(10)->pluck('user_id');
    
    foreach($topnvsuachua as $nhanvien){
      $profile = User::find($nhanvien)['name'];
      if($profile ?? null){
         array_push($datanhanvien,['name'=>$profile,'quaty'=>UserRepair::where('user_id',$nhanvien)->count()]);
      }
    }
  
    return view('admin.index', compact(
      'total_category',
      'total_product',
      'total_bill',
      'total_user',
      'total_order',
      'total_componentComputerConpany',
      'total_component',
      'doanhthutong',
      'sotiennhap',
      'sotienlai',
      'doanhthusuachua',
      'sotiennhapsuachua',
      'sotienbansuachua',
      'sotienlaisuachua',
      'doanhthutongban',
      'sotiennhapban',
      'sotienbanban',
      'sotienlaiban',
      'datasanphamban',
      'datanhanvien'
    ));
  }
}
