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
    public $fillable = ['name', 'price', 'qty', 'desc', 'status', 'category_id'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
}
