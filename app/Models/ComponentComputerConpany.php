<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentComputerConpany extends Model
{
    use HasFactory;
    protected $table = 'component_computer_conpanies';
    public $fillable = ['component_id', 'computer_conpany_id', 'active'];
}