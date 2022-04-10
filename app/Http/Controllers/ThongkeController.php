<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RepairPart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;

class ThongkeController extends Controller
{
    public function sanpham(Request $request)
    {
        if (isset($_GET['ngay-bd']) && isset($_GET['ngay-kt'])) {
            $ngay_bd = date('Y-m-d', strtotime($_GET['ngay-bd']));
            $ngay_kt = date('Y-m-d', strtotime($_GET['ngay-kt']));
            $products = Product::with('nhaphangsanpham')->whereBetween('created_at', [$ngay_bd, $ngay_kt])->get();
            $sum_product = $products->sum('qty');
        } else {
            $products = Product::query()->with('nhaphangsanpham');
            $sum_product = $products->sum('qty');
            $products = $products->paginate(10);
        }

        return view('admin.thongke.sanpham', compact( 'products','sum_product', 'request'));
    }
    public function ajax(Request $request)
    {
        $repair_parts = null;
//        if (empty($request->start_date) || empty($request->end_date)){
            $repair_parts = RepairPart::query()
                ->orderBy("created_at","desc")
                ->get()->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d');
            })->take(7);
//        }
        $results = [];
        foreach ($repair_parts as $time => $repair_part) {
            $value = 0;
            foreach ($repair_part as $item) {
                $value += $item->quantity;
            }
            array_push($results,['time' => $time, 'value' => $value]);
        }
        return response()->json($results);
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
