<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class list_bill extends Model
{
    use HasFactory;
    protected $table = 'list_bill';
    public $fillable = ['user_id', 'booking_detail_id', 'status', 'type', 'total_price', 'date', 'customers_pay', 'excess_cash', 'debt', 'code', 'method', 'codebill'];
    public function bill()
    {
        return $this->hasMany(bill_detail::class, 'bill_id', 'id');
    }
    // public function booking()
    // {
    //     return $this->hasOne(Booking::class, 'booking_detail_id', 'booking_detail_id');
    // }

    public function booking()
    {
        return $this->belongsToMany(Booking::class, 'booking_details', 'id', 'booking_detail_id');
    }
    /**
     * Get the booking_detail associated with the Bill
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function booking_detail()
    {
        return $this->hasOne(BookingDetail::class, 'booking_detail_id', 'id');
    }
    /**
     * Get the component that owns the list_bill
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function component()
    {
        return $this->belongsTo(Component::class, 'id', 'component_id');
    }
}