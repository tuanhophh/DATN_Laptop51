<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;

class ThongkeController extends Controller
{
    public function index()
    {
        $a = [];
        for ($i = 1; $i <= 12; $i++) {
            $thongke_sp = Product::whereMonth('created_at', $i)->get()->count();
            array_push($a, $thongke_sp);
        }
        return view('admin.thongke.index', compact('a'));
    }
    
}
