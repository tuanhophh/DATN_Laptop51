<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ComputerCompany;
use Illuminate\Http\Request;
use Mail;

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
      $computers = ComputerCompany::all();

      $bookings = Booking::all();
      foreach ($bookings as $b) {
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
      }
      return view('admin.booking.show', compact('bookings', 'computers'));
   }



   public function creatBooking(Request $request)
   {
      $request->validate([
         'full_name' => 'required',
         'phone' => 'required',
         'interval' => 'required',
         'repair_type' => 'required'
      ]);
      // dd($request);
      $request->input($request);
      $model = Booking::create($request->all());
      // dd($model);

      if ($model) {
         $data = [
            'name' => $model->full_name,
            'email' => $model->email,
            'phone' => $model->phone,
            'interval' => $model->interval,
            'repair_type' => $model->repair_type,
            'description' => $model->description
         ];
         $email = $model->email;
         Mail::send('admin.booking.confirm_mail',  $data,  function ($message) use ($email) {
            // dd($email);
            $message->from('manhhung17062001@gmail.com', 'Laptop 51');
            $message->to($email, 'Laptop 51');
            $message->subject('Đăng ký thành viên hệ thống');
         });
      }
      return redirect(route('dat-lich.index'));
   }

   public function deleteBooking($id)
   {
      Booking::destroy($id);
      return redirect(route('dat-lich.index'));
   }
}
