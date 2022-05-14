<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    public $fillable = ['full_name', 'phone', 'company_computer_id', 'email', 'expected_cost', 'repair', 'repair_type', 'time', 'description', 'active', 'interval'];


    /**
     * Get all of the comments for the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookingDetail()
    {
        return $this->hasMany(BookingDetail::class, 'booking_id', 'id');
    }
    /**
     * The roles that belong to the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function computerCompany()
    {
        return $this->belongsTo(ComputerCompany::class, 'company_computer_id', 'id',);
    }
    /**
     * Get the booking that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
}