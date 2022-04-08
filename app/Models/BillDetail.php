<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;

    protected $table = "bill_details";
    public $fillable = ['product_id', 'qty', 'price', 'bill_code'];

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_code');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
