<?php

namespace App\Http\Controllers;

use App\Models\BookingDetail;
use App\Models\DetailProduct;
use App\Models\RepairPart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingDetailController extends Controller
{
    public function getDetailProduct($id)
    {
        $product_detail = DetailProduct::find($id);

        if ($product_detail) {
            // dd($product_detail);
            return response()->json($product_detail);
        }
    }






    public function hoaDon($booking_detail_id)
    {
        $booking_detail = BookingDetail::find($booking_detail_id);
        if ($booking_detail) {
            $repair_parts = RepairPart::where("booking_detail_id", $booking_detail_id)->get();
            if ($repair_parts) {
                $repair_parts->load('detail_product');
                $repair_parts->load('booking_detail');
                // Auth
                // dd($repair_parts);
            }
            return view('admin.booking.hoa_don', compact('booking_detail', 'repair_parts'));
        }
    }
}
