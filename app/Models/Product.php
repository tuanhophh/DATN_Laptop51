<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "products";
    protected $dates = ['deleted_at'];
    public $fillable = ['name', 'image','desc_short', 'import_price', 'price', 'qty', 'desc', 'status', 'companyComputer_id', 'insurance'];
    public function companyComputer()
    {
        return $this->belongsTo(ComputerCompany::class, 'companyComputer_id');
    }
    public function nhaphangsanpham()
    {
        return $this->hasMany(Nhaphangsanpham::class, 'product_id');
    }
    public function categories()
    {
        return $this->belongsToMany(AttributeValue::class, 'attribute_value','product_id','category_id');
    }
}
