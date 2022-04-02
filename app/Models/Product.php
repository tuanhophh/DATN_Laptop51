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
<<<<<<< HEAD
    public $fillable = ['name', 'price', 'qty', 'desc', 'status', 'category_id', 'insurance'];
    public function category()
=======
    public $fillable = ['name','import_price', 'price', 'qty', 'desc', 'status', 'companyComputer_id','insurance'];
    public function companyComputer()
>>>>>>> 2982e9231454450eb861f6d03afa8248bb626b60
    {
        return $this->belongsTo(ComputerCompany::class, 'companyComputer_id');
    }
    public function nhaphangsanpham()
    {
        return $this->hasMany(Nhaphangsanpham::class, 'product_id');
    }
}