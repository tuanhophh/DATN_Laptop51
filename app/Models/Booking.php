<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    public $fillable = ['full_name', 'phone', 'company_computer_id', 'email', 'expected_cost', 'repair', 'repair_type', 'time', 'description', 'active', 'interval'];
}