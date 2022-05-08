<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComputerCompany extends Model
{
    use HasFactory;
    public $table = 'computer_companies';
    public $fillable = ['company_name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    /**
     * The roles that belong to the ComputerCompany
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function component()
    {
        return $this->belongsToMany(Component::class, 'component_computer_conpanies', 'computer_conpany_id', 'component_id');
    }
}