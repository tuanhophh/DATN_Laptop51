<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairPart extends Model
{
    use HasFactory;
    protected $table = 'repair_parts';
    public $fillable = ['booking_detail_id', 'detail_product_id', 'unit_price', 'quantity', 'into_money', 'sale', 'insurance', 'warranty_period'];
}