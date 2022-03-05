<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComputerCompany extends Model
{
    use HasFactory;
    public $table = 'computer_companies';
    public $fillable = ['company_name'];
}