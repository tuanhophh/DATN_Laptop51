<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class list_bill extends Model
{
    use HasFactory;
    protected $table = 'list_bill';
    public $fillable = ['user_id','status','type','total_price','code','method'];
    public function bill(){
        return $this->hasMany(bill_detail::class,'bill_id','id');
    }
}
