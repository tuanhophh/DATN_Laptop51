<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillRequest;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\BillUser;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    public function savePayment(BillRequest $request)
    {
        // $quantity = $request->qly;

        // Tạo mã ngẫu nhiên 16 số
        $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length = substr(str_shuffle(str_repeat($pool, 5)), 0, 16);
        $content = Cart::content();
        // dd($content);

        // Lưu vào bảng bills
        $bill = new Bill();
        $bill->payment_method = $request->payment_method;
        $bill->total = Cart::total();
        $bill->code = $length;
        if (Auth::id()) {
            $bill->user_id = Auth::id();
        }
        $bill->payment_status == 1;
        $bill->save();

        // Lưu vào bảng bill_details
        foreach ($content as $item) {
            $bill_detail = new BillDetail();
            $bill_detail->product_id = $item->id;
            $bill_detail->qty = $item->qty;
            $bill_detail->price = $item->price;
            $bill_detail->bill_code = $length;
            $bill_detail->save();
        }

        // Lưu vào bảng bill_users
        $bill_user = new BillUser();
        $bill_user->name = $request->name;
        $bill_user->email = $request->email;
        $bill_user->phone = $request->phone;
        $bill_user->address = $request->address;
        $bill_user->note = $request->note;
        $bill_user->bill_code = $length;
        if (Auth::id()) {
            $bill_user->user_id = Auth::id();
        }
        $bill_user->save();

        return Redirect::to('/thanh-toan')->with('message', 'Thanh toán thành công cho đơn hàng: ',$length);

    }
}
