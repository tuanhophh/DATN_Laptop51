<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillUser extends Model
{
    use HasFactory;
    protected $table = "bill_users";
    public $fillable = ['name', 'email', 'phone', 'address', 'note','user_id','bill_code'];
    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_code');
    }
}
