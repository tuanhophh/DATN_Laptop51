<?php

namespace App\Http\Controllers;

use App\Jobs\SendOrderSuccessEmail;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\ComputerCompany;
use Carbon\Carbon;
use App\Models\DetailProduct;
use App\Models\RepairPart;
use App\Models\User;
use App\Models\UserRepair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
      $booking_detail = BookingDetail::find($id);
      // dd($booking_detail->booking->id);
      return view('admin.booking.edit', compact('booking_detail', 'computers'));
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
      $booking_detail = BookingDetail::find($id);
      if ($booking_detail) {
         $booking_detail->fill([
            // 'booking_id' => $model->id,
            'company_computer_id' => $request->company_computer_id,
            'description' => $request->description,
            'name_computer' => $request->name_computer
         ]);
         $booking_detail->save();
         $booking = Booking::find($booking_detail->booking_id);
         $booking->fill([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'interval' => $request->interval
         ]);
         $booking->save();
      }
      return redirect(route('dat-lich.danh-sach-may'));
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
         'phone' => 'required||integer',
         'email' => 'required||email',
         'name_computer' => 'required',

         // 'interval' => 'required',
         // 'repair_type' => 'required'
      ]);

      // dd($request);
      // $request->input($request);

      $data_booking = [
         'full_name' => $request->full_name,
         'phone' => $request->phone,
         'email' => $request->email,
         'interval' => $request->interval
      ];
      $model = Booking::create($data_booking);


      $data_booking_detail = [
         'booking_id' => $model->id,
         'company_computer_id' => $request->company_computer_id,
         'description' => $request->description,
         'name_computer' => $request->name_computer
      ];
      $booking_detail = BookingDetail::create($data_booking_detail);


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

      // if ($details['interval'] == 1) {
      //    $details['interval'] = '8h-10h';
      // } elseif ($details['interval'] == 2) {
      //    $details['interval'] = '10h-12h';
      // } elseif ($details['interval'] == 3) {
      //    $details['interval'] = '12h-14h';
      // } elseif ($details['interval'] == 4) {
      //    $details['interval'] = '14h-16h';
      // } elseif ($details['interval'] == 5) {
      //    $details['interval'] = '16h-18h';
      // } elseif ($details['interval'] == 6) {
      //    $details['interval'] = '18h-20h';
      // } else {

      //    $details['interval'] = '20h-22h';
      // }
      // dd($details);

      // dispatch(new SendOrderSuccessEmail($details));


      if ($request->btn == 'admin') {
         return redirect(route('dat-lich.danh-sach-may'));
      } else {
         return redirect(route('dat-lich.add_client'))->with('msg', 'thành công');
      }

      // return redirect(route('dat-lich.index'));
   }

   public function deleteBooking($id)
   {
      $booking =  Booking::find($id);
      if ($booking) {
         $booking->bookingDetail()->delete();
         $booking->delete();
      }
      return redirect(route('dat-lich.danh-sach-may'));
   }


   public function listBookingDetail(Request $request)
   {

      # code...
      $users = User::query()->where('id_role', 3)->get();
      $users->load('role');
      // dd($users);
      $booking_details = BookingDetail::query()->get();
      $booking_details->load('user_repair');
      $booking_details->load('booking');
      // dd($users[1]->id);
      // dd($booking_details);


      return view('admin.booking.repair', compact('booking_details', 'users',));
   }
   public function selectUserRepair(Request $request)
   {
      // dd($request);

      if ($request->booking_detail_id) {
         $check = UserRepair::where('booking_detail_id', $request->booking_detail_id)->first();
         if (!$check) {
            UserRepair::create(
               [
                  'user_id' => $request->staff,
                  'booking_detail_id' => $request->booking_detail_id
               ]
            );
         } else {
            $check->user_id = $request->staff;
            $check->save();
         }

         // return redirect(route('dat-lich.danh-sach-may'));
      }
      if ($request->active) {
         $check = BookingDetail::find($request->booking_detail_id);
         if ($check) {
            $check->active = $request->active;
            $check->save();
         }
      }
      return redirect(route('dat-lich.danh-sach-may'));
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
         $booking_detail->save();
         $booking = $booking_detail->booking()->first();
         $product_detail = DetailProduct::all();
         // $arr_pd =  array_column($product_detail->toArray(), 'name');
         $repair_parts = RepairPart::where('booking_detail_id', $id)->get();
         $arr_pd = array_column($repair_parts->toArray(), 'detail_product_id');
         // dd($repair_parts->toArray());
         return view('admin.booking.repair_detail', compact('booking', 'booking_detail', 'product_detail', 'arr_pd'));
         // return response()->json($product_detail);
      }
   }
   // public function demo()
   // {
   //    return view('admin.booking.repair_detail');
   // }
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

         if ($request->repairs) {
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
         }
         $booking = $booking_detail->booking()->first();
         // return view('admin.booking.repair_detail', compact('booking', 'booking_detail'));
         if ($request->btn == 'pause') {
            $booking_detail->active = 2;
            $booking_detail->save();
         }
         if ($request->btn == 'finish') {
            $booking_detail->active = 3;
            $booking_detail->save();
         }
      }

      return redirect(route('dat-lich.danh-sach-may'));
   }




   public function userRepair()
   {
      if (Auth::check()) {
         $booking_details = UserRepair::where('user_id', Auth::id())->get();
         return view('admin.booking.my_repair', compact('user_repais'));
      } else {
         return redirect(route('login'));
      }
   }
}