<?php

namespace App\Http\Controllers;

use App\Jobs\SendOrderSuccessEmail;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\ComputerCompany;
use Carbon\Carbon;
use App\Models\DetailProduct;
use App\Models\Product;
use App\Models\RepairPart;
use Illuminate\Http\Request;
use Mail;
use Nexmo\Laravel\Facade\Nexmo;

class BookingController extends Controller
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
      // $user = BookingDetail::whereMonth('created_at', '=', Carbon::now()->month)
      //    ->whereDay('created_at', '=', now()->day)
      //    ->get();

      // foreach ($user as $item) {
      //    $user->load('booking');
      //    $email = $item->booking->email;
      //    $name = $item->booking->full_name;
      //    $details = [
      //       'email' => $email,
      //       'name' => $name,
      //    ];
      //    dd($details);
      // }

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
            'email' => $check_booking->email,

            'phone' => $model->phone,
            'interval' => $model->interval,
            'repair_type' => $booking_detail->repair_type,
            'description' => $booking_detail->description
         ];
         $email = $model->email;
         // dd(config('mail.from.name'));
         $details = [
            'email' => $request->email,
            'name' => $request->full_name,
            'computer' => $request->name_computer,
            'interval' => $request->interval,
            'repair_type' => $request->repair_type,
            'desc' => $booking_detail->description,
            'status' => "đang chờ",
         ];
         // dispatch(new SendOrderSuccessEmail($data));
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
         $details = [
            'email' => $request->email,
            'name' => $request->full_name,
            'computer' => $request->name_computer,
            'interval' => $request->interval,
            'repair_type' => $request->repair_type,
            'desc' => $request->description,
            'status' => "đang chờ",
         ];
         // dd($data['email']);
      }
      if ($details['interval'] == 1) {
         $details['interval'] = '8h-10h';
      } elseif ($details['interval'] == 2) {
         $details['interval'] = '10h-12h';
      } elseif ($details['interval'] == 3) {
         $details['interval'] = '12h-14h';
      } elseif ($details['interval'] == 4) {
         $details['interval'] = '14h-16h';
      } elseif ($details['interval'] == 5) {
         $details['interval'] = '16h-18h';
      } elseif ($details['interval'] == 6) {
         $details['interval'] = '18h-20h';
      } else {

         $details['interval'] = '20h-22h';
      }
      // dd($details);

      dispatch(new SendOrderSuccessEmail($details));




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
         $product_detail = DetailProduct::all();
         $arr_pd =  array_column($product_detail->toArray(), 'name');

         return view('admin.booking.repair_detail', compact('booking', 'booking_detail', 'product_detail'));
         // return response()->json($product_detail);
      }
   }
   public function demo()
   {
      return view('admin.booking.repair_detail');
   }
   public function finishRepairDetail($id, Request $request)
   {
      // dd($request);


      $booking_detail = BookingDetail::find($id);
      $booking_detail->active = 2;

      if ($booking_detail) {
         $repair_part = RepairPart::where('id', $booking_detail->id)->get();
         $arr_PD_id = array_column($repair_part->toArray(), 'product_detail_id');

         if ($request->btn == 'pause') {

            // foreach ($request->repairs as $r) {
            // RepairPart::create($r)
            // }
            $booking_detail->active = 2;
            $booking = $booking_detail->booking()->first();
            return view('admin.booking.repair_detail', compact('booking', 'booking_detail'));
         }
         if ($request->btn == 'finish') {
            $booking_detail->active = 3;
         }
      }
   }
}