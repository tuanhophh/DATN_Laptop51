<?php

namespace App\Http\Controllers;

use App\Models\BillRepair;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\DetailBillRepair;
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
                $repair_parts->load('components');
                $repair_parts->load('booking_detail');
                // Auth
                // dd($booking_detail->booking->full_name);
            }
            return   view('admin.booking.hoa_don', compact('booking_detail', 'repair_parts'));
        }
    }

    public function luuHoaDon($booking_detail_id, Request $request)
    {
        // dd($request);
        $booking_detail = BookingDetail::find($booking_detail_id);
        $repair_parts = RepairPart::where('booking_detail_id', $booking_detail_id)->get();

        if ($booking_detail) {
            $data = [
                'code_bill' => $booking_detail->code,
                'booking_detail_id' => $booking_detail_id,
                'date' => now(),
                'sum_price' => array_sum(array_column($repair_parts->toArray(), 'into_money')),
                'customers_pay' => $request->customers_pay,
                'excess_cash' => $request->excess_cash,

            ];
            $bill_repair =    BillRepair::create($data);
            foreach ($repair_parts as $r) {
                $data1 = ['bill_repair_id' => $bill_repair->id, 'code_bill' => $bill_repair->code_bill, 'repair_part_id' => $r->id];
                DetailBillRepair::create($data1);
            }
        }
    }
    public function luuThongTinSuaChua($id, Request $request)
    {
        dd($request);
        $booking_detail = BookingDetail::find($id);
    }
    public function xuatHoaDon($booking_detail_id)
    {
        $booking_detail = BookingDetail::find($booking_detail_id);
        if ($booking_detail) {
            $repair_parts = RepairPart::where("booking_detail_id", $booking_detail_id)
                ->get();
            if ($repair_parts) {
                $repair_parts->load('components');
                $repair_parts->load('booking_detail');
            }
            $data = ['repair_parts' => $repair_parts, 'booking_detail' =>  $booking_detail];
            $pdf = PDF::loadHTML('admin.booking.xuat_hoa_don');

            $pdf = PDF::loadView('admin.booking.xuat_hoa_don', $data);
            // dd(config('mail.mailers.smtp.username'));
            return  $pdf->stream();
        }
    }



    public function phieuNhanMay($booking_detail_id, Request $request)
    {

        $booking_detail = BookingDetail::find($booking_detail_id);
        // $booking_detail
        if ($booking_detail) {
            $booking = Booking::find($booking_detail->booking_id)->fill($request->all())->save();
            $booking_detail->fill($request->all())->save();
            $booking_detail->status_repair = "waiting";
            $data = ['booking_detail' =>  $booking_detail];
            $pdf = PDF::loadHTML('admin.booking.pdf_phieu_nhan_may');

            $pdf = PDF::loadView('admin.booking.pdf_phieu_nhan_may', $data);
            // dd(config('mail.mailers.smtp.username'));
            return  $pdf->stream('nhan-may.pdf');
        }
    }
}