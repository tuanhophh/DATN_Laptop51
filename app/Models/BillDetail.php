<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;

    protected $table = "bill_details";
    public $fillable = ['product_id', 'qty', 'price', 'bill_code'];

    public function bills()
    {
        return $this->belongsTo(Bill::class, 'code');
    }
}
