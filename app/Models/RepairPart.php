<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RepairPart extends Model
{
    use HasFactory;
    protected $table = 'repair_parts';
    public $fillable = ['booking_detail_id', 'detail_product_id', 'unit_price', 'quantity', 'into_money', 'sale', 'insurance', 'warranty_period'];


    public function booking_detail()
    {
        return $this->belongsTo(BookingDetail::class, 'booking_detail_id');
    }

    public function repair_part(){
        $users = DB::table('repair_parts')
        ->join('booking_details', 'repair_parts.booking_detail_id', '=', 'booking_details.id')
        ->join('bookings', 'booking_details.booking_id', '=', 'bookings.id')
        ->get();
        return $users;
    }
}
