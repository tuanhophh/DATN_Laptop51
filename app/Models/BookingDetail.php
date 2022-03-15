<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;
    protected $table = "booking_details";
    public $fillable = ["booking_id", 'company_computer_id', 'expected_cost', 'repair', 'repair_type', 'description', 'start_time', 'finish_time', 'active', 'name_computer'];
    public function computerCompany()
    {
        return $this->belongsToMany(ComputerCompany::class, 'computer_company_id', 'id');
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}