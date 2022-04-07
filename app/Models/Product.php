<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "products";
    protected $dates = ['deleted_at'];
    public $fillable = ['name', 'import_price', 'price', 'qty', 'desc', 'status', 'companyComputer_id', 'insurance'];
    public function companyComputer()
    {
        return $this->belongsTo(ComputerCompany::class, 'company_computer_id');
    }
    public function nhaphangsanpham()
    {
        return $this->hasMany(Nhaphangsanpham::class, 'product_id');
    }
}
