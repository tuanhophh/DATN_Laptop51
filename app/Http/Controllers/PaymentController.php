<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillRequest;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\BillUser;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
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
        if ($request->payment_method == 2) {
            $totalBill = str_replace(',', '', Cart::subtotal(0)) * 100;
            // dd($totalBill);
            // session(['info_customer' => $data]);
            return view('vnpay.index', compact('totalBill'));
        } else {
            $bill = new Bill();
            $bill->payment_method = $request->payment_method;
            $bill->total = Cart::subtotal();
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
            Cart::destroy();
            return Redirect::to('/thanh-toan')->with('message', 'Thanh toán thành công cho đơn hàng: ', $length);
        };
        // Lưu vào bảng bills

    }
    public function createPayment(Request $request)
    {   $vnp_TmnCode = "3EW6FLZG";
        $vnp_HashSecret = "XTRTBABSGMLYLMFNAPKGCBPDUVTJGXXK";
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/vnpay/return";
        $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length = substr(str_shuffle(str_repeat($pool, 5)), 0, 16);
        $vnp_TxnRef = $length; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = $request->order_type;
        $vnp_Amount = str_replace(',', '', Cart::subtotal(0)) * 100;
        $vnp_Locale = $request->language;
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        // dd($request->all());
        //Add Params of 2.0.1 Version

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        // dd($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        // dd($vnp_Url);
        return redirect($vnp_Url);
    }
    public function vnpayReturn(Request $request)
    {   
        
        // dd($request->toArray());
        return view('vnpay.vnpay_return');
    }
}
