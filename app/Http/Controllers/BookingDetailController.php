<?php

namespace App\Http\Controllers;

use App\Models\DetailProduct;
use Illuminate\Http\Request;

class BookingDetailController extends Controller
{
    public function getDetailProduct($id)
    {
        $product_detail = DetailProduct::find($id);

        if ($product_detail) {
            // dd($product_detail);
            return response()->json($product_detail);
        }
    }
}