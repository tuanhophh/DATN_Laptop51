<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ComputerCompany;
use Illuminate\Http\Request;

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
   public function EditBooking(Request $request)
   {
      dd($request);
   }
   public function listBooking()
   {
      $computers = ComputerCompany::all();

      $bookings = Booking::all();
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
      return redirect(route('dat-lich.index'));
   }
}