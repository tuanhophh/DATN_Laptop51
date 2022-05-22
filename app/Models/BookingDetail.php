<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;
    protected $table = "booking_details";
    public $fillable = ["booking_id", 'company_computer_id', 'expected_cost', 'repair', 'repair_type', 'description', 'start_time', 'finish_time', 'active', 'name_computer', 'comment', 'status_repair', 'status_booking'];
    public function computerCompany()
    {
        return $this->belongsTo(ComputerCompany::class, 'company_computer_id', 'id');
    }
    public function booking()
    {
        return $this->hasOne(Booking::class, 'id', 'booking_id');
    }
    /**
     * Get the list_bill associated with the BookingDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function list_bill()
    {
        return $this->hasOne(list_bill::class, 'booking_detail_id', 'id');
    }
    /**
     * The roles that belong to the BookingDetail
     *
     */
    public function user_repair()
    {
        return $this->hasOne(UserRepair::class, 'booking_detail_id');
    }
}
