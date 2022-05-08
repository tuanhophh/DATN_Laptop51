<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill_detail extends Model
{
    use HasFactory;
    protected $table = 'billdetail';
    public $fillable = ['product_id', 'quaty', 'bill_id', 'component_id', 'nhap', 'ban', 'description'];
}
