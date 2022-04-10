<?php

namespace App\Http\Controllers;

use App\Models\BookingDetail;
use App\Models\DetailProduct;
use App\Models\RepairPart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use PhpOffice\PhpSpreadsheet\Writer\Pdf;
use PDF;

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
            $booking_detail->booking->full_name;
            $repair_parts = RepairPart::where("booking_detail_id", $booking_detail_id)->get();
            if ($repair_parts) {
                $repair_parts->load('detail_product');
                $repair_parts->load('booking_detail');
                // Auth
                // dd($booking_detail->booking->full_name);
            }
            return view('admin.booking.hoa_don', compact('booking_detail', 'repair_parts'));
        }
    }
    public function xuatHoaDon($booking_detail_id)
    {
        $booking_detail = BookingDetail::find($booking_detail_id);
        if ($booking_detail) {
            // $booking_detail->booking->full_name;
            $repair_parts = RepairPart::where("booking_detail_id", $booking_detail_id)
                // ->join('detail_products', 'repair_parts.detail_product_id', 'detail_products.id')
                ->get();
            if ($repair_parts) {
                $repair_parts->load('detail_product');
                $repair_parts->load('booking_detail');
                // Auth
                // dd($booking_detail->booking->full_name);
            }
            $data = ['repair_parts' => $repair_parts, 'booking_detail' =>  $booking_detail];

            $pdf = PDF::loadView('admin.booking.xuat_hoa_don', $data);
            dd(config('mail.mailers.smtp.username'));
            return  $pdf->stream();
        }
    }
}