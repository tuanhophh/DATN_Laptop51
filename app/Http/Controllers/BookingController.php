<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
public function check()
{
   return 
}


   public function formCreateBooking()
   {
      return view('admin.booking.create');
   }
   public function listBooking()
   {
      $bookings = Booking::all();
      return view('admin.booking.show', compact('bookings'));
   }
   public function creatBooking(Request $request)
   {
      # code...
   }
}
