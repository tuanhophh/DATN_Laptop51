<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    protected $table = 'components';
    public $fillable = ['name_component', 'image', 'price', 'desc', 'qty', 'status'];
    /**
     * The computer_companies that belong to the Component
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function computer_companies()
    {
        return $this->belongsToMany(ComputerCompany::class, 'component_computer_conpanies', 'component_id', 'computer_conpany_id');
    }
}
