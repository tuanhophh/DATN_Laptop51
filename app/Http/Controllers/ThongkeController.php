<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RepairPart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;

class ThongkeController extends Controller
{
    public function sanpham()
    {
        if (isset($_GET['ngay-bd']) && isset($_GET['ngay-kt'])) {
            $ngay_bd = date('Y-m-d', strtotime($_GET['ngay-bd']));
            $ngay_kt = date('Y-m-d', strtotime($_GET['ngay-kt']));
            $product = Product::with('nhaphangsanpham')->whereBetween('created_at', [$ngay_bd, $ngay_kt])->get();
            $sum_product= Product::with('nhaphangsanpham')->whereBetween('created_at', [$ngay_bd, $ngay_kt])->sum('qty');
            
                        // dd($product);
        } else {
            $product = Product::all();
            $product->load('nhaphangsanpham');
            $sum_product=DB::table('products')->sum('qty');
        }
        // dd($product);
        $a = [];
        for ($i = 1; $i <= 12; $i++) {
            $thongke_sp = Product::whereMonth('created_at', $i)->get()->count();
            array_push($a, $thongke_sp);
        }
        //  echo json_encode($product);
        // return response()->json($product);
        return view('admin.thongke.sanpham', compact('a', 'product','sum_product'));
    }
    public function ajax()
    {
        $product = Product::all();
        $product->load('nhaphangsanpham');
        return response()->json($product);    
    }

    public function chitietSanpham()
    {
        return view('admin.thongke.chitiet-sanpham');
    }

    public function order()
    {
        $users = DB::table('repair_parts')
            ->select('repair_parts.id as id', 'bookings.email', DB::raw('count(email) as count_email'))
            ->groupBy('email')
            ->join('booking_details', 'repair_parts.booking_detail_id', '=', 'booking_details.id')
            ->join('bookings', 'booking_details.booking_id', '=', 'bookings.id')
            ->first();
        dd($users);
        // $a=$order->booking_detail->load('booking');
        // dd($a);
        return view('admin.thongke.order', compact('order'));
    }
}
