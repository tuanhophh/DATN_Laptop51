<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\ComputerCompany;
use App\Models\RepairPart;
use Illuminate\Http\Request;
use Mail;
use Nexmo\Laravel\Facade\Nexmo;

class    BookingController extends Controller
{
   // public function check()
   // {
   //    return 
   // }


   public function formCreateBooking()
   {
      $computers = ComputerCompany::all();
      // dd($computers);
      return view('admin.booking.create', compact('computers'));
   }
   public function formEditBooking($id)
   {
      $computers = ComputerCompany::all();
      $booking = Booking::find($id);
      return view('admin.booking.edit', compact('booking', 'computers'));
   }
   public function EditBooking(Request $request, $id)
   {
      // dd($request);
      $request->validate([
         'full_name' => 'required',
         'phone' => 'required',
         'interval' => 'required',
         'repair_type' => 'required'
      ]);
      $booking = Booking::find($id);
      if ($booking) {
         $booking->fill($request->all())->save();
      }
      return redirect(route('dat-lich.index'));
   }
   public function listBooking()
   {
      $computers = ComputerCompany::all();
      $result = [];
      $bookings = Booking::query()->get();
      foreach ($bookings as   $key => $b) {
         if ($b->interval == 1) {
            $b->interval = '8h-10h';
         } elseif ($b->interval == 2) {
            $b->interval = '10h-12h';
         } elseif ($b->interval == 3) {
            $b->interval = '12h-14h';
         } elseif ($b->interval == 4) {
            $b->interval = '14h-16h';
         } elseif ($b->interval == 5) {
            $b->interval = '16h-18h';
         } elseif ($b->interval == 6) {
            $b->interval = '18h-20h';
         } else {

            $b->interval = '20h-22h';
         }
         array_push($result, $b->toArray());

         $booking_detail = $b->bookingDetail()->get();
         $result[$key]['count'] = $booking_detail->count();
         $result[$key]['booking_detail'] = [];
         foreach ($booking_detail as $b_d) {
            // dd($b_d->computerCompany()->get());
            array_push($result[$key]['booking_detail'], $b_d->toArray());
         }
      }
      // dd($result);
      return view('admin.booking.show', compact('result', 'bookings', 'computers'));
   }



   public function creatBooking(Request $request)
   {
      $request->validate([
         'full_name' => 'required',
         'phone' => 'required',
         'interval' => 'required',
         // 'repair_type' => 'required'
      ]);
      // dd($request);

      $request->input($request);
      $check_booking = Booking::where('phone', $request->phone)->first();
      if (!$check_booking) {
         $data_booking = [
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'interval' => $request->interval
         ];
         $model = Booking::create($data_booking);
         // dd($model->id);

         $data_booking_detail = [
            'booking_id' => $model->id,
            'company_computer_id' => $request->company_computer_id,
            // 'repair_type' => $request->repair_type,
            'description' => $request->description,
            'name_computer' => $request->name_computer
         ];
         $booking_detail = BookingDetail::create($data_booking_detail);

         $data = [
            'name' => $model->full_name,
            'email' => $model->email,
            'phone' => $model->phone,
            'interval' => $model->interval,
            'repair_type' => $booking_detail->repair_type,
            'description' => $booking_detail->description
         ];
         $email = $model->email;
      } else {

         $data_booking_detail = [
            'booking_id' => $check_booking->id,
            'company_computer_id' => $request->company_computer_id,
            // 'repair_type' => $request->repair_type,
            'description' => $request->description,
            'name_computer' => $request->name_computer
         ];
         $booking_detail = BookingDetail::create($data_booking_detail);
         $data = [
            'name' => $check_booking->full_name,
            'email' => $check_booking->email,
            'phone' => $check_booking->phone,
            'interval' => $check_booking->interval,
            'repair_type' => $booking_detail->repair_type,
            'description' => $booking_detail->description
         ];
         $email = $check_booking->email;
      }



      if (
         $check_booking
         && $booking_detail
      ) {

         Mail::send('admin.booking.confirm_mail',  $data,  function ($message) use ($email) {
            // dd($email);
            $message->from('manhhung17062001@gmail.com', 'Laptop 51');
            $message->to($email, 'Laptop 51');
            $message->subject('Đăng ký thành viên hệ thống');
         });


         // Nexmo::message()->send([
         //    'to' => '84353219955',
         //    // 'from' => '84399958700',
         //    'text' => 'Cam on ban da dat lich thanh cong'

         // ]);
      }
      return redirect(route('dat-lich.index'));
   }

   public function deleteBooking($id)
   {
      $booking =  Booking::find($id);
      if ($booking) {
         $booking->bookingDetail()->delete();
         $booking->delete();
      }
      return redirect(route('dat-lich.index'));
   }
   public function listBookingDetail()
   {
      # code...

      $booking_details = BookingDetail::query()->get();
      $arr_detail = [];
      foreach ($booking_details as $key => $bk) {
         if ($user =   $bk->booking()->first() != null) {

            $user =   $bk->booking()->first()->toArray();
         }
         // dd($user);
         if ($user == false) {
            $user = [];
         };
         array_push($arr_detail, $bk->toArray() + $user);
      }
      // dd($arr_detail);

      return view('admin.booking.repair', compact('booking_details', 'arr_detail'));
   }
   public function deleteBookingDetail($id)
   {
      Booking::destroy($id);
      return redirect('dat-lich.danh-sach-may');
   }
   public function repairDetail($id)
   {

      $booking_detail = BookingDetail::find($id);
      // dd($booking_detail->booking()->first());
      if ($booking_detail) {

         $booking_detail->active = 1;
         $booking = $booking_detail->booking()->first();
         return view('admin.booking.repair_detail', compact('booking', 'booking_detail'));
      }
   }
   public function finishRepairDetail($id, Request $request)
   {
      // dd($request);
      function detailProduct($id)
      {

         $detail_product = DetailProduct::find($id);
         if ($detail_product) {
            return $detail_product;
         } else {
            return '';
         }
      }

      $booking_detail = BookingDetail::find($id);
      // dd($booking_detail->booking()->first());
      if ($booking_detail) {
         $repair_part = RepairPart::where('id', $booking_detail->id)->get();
         $arr_PD_id = array_column($repair_part->toArray(), 'product_detail_id');

         $arr_quantity = $request->soluong;

         foreach ($request->repairs as $r) {
            if (in_array($r, $arr_PD_id) == false) {
               $dt = [
                  'booking_detail_id' => $id,
                  'detail_product_id' => $r,
                  'unit_price' => detailProduct($r)->price,
                  'quantity' => $arr_quantity[$r],
                  'into_money' => detailProduct($r)->price * $arr_quantity[$r],
               ];
               // dd($dt);
               $model = RepairPart::create($dt);
               // dd($model);
            } else {
               $model = RepairPart::where('booking_detail_id', $id)->where('detail_product_id', $r)->first();
               $dt = [
                  'booking_detail_id' => $id,
                  'detail_product_id' => $r,
                  'unit_price' => detailProduct($r)->price,
                  'quantity' => $arr_quantity[$r] + $model->quantity,
                  'into_money' => detailProduct($r)->price * ($arr_quantity[$r] + $model->quantity),
               ];
               // dd($dt);

               $model->fill($dt)->save();
            }
         }
         $booking = $booking_detail->booking()->first();
         return view('admin.booking.repair_detail', compact('booking', 'booking_detail'));
         if ($request->btn == 'pause') {
            $booking_detail->active = 2;
         }
         if ($request->btn == 'finish') {
            $booking_detail->active = 3;
         }
      }
      return redirect(route('dat-lich.danh-sach-may'));
   }
}