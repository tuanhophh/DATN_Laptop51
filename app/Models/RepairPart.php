<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairPart extends Model
{
    use HasFactory;
    protected $table = 'repair_parts';
    public $fillable = ['booking_detail_id', 'detail_product_id', 'unit_price', 'quantity', 'into_money', 'sale', 'insurance', 'warranty_period'];

    /**
     * Get the user associated with the RepairPart
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail_product()
    {
        return $this->hasOne(DetailProduct::class, 'id', 'detail_product_id');
    }

    /**
     * Get the booking_Detail that owns the RepairPart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function booking_detail()
    {
        return $this->belongsTo(BookingDetail::class, 'booking_detail_id');
    }
}