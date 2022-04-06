<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillRequest;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\BillUser;
use App\Models\Payment;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    public function showPayment()
    {   
        $content = Cart::content();
        if($countCart = count($content) == 0){
            return Redirect::to('/cua-hang')->with('message', 'Bạn không có đồ trong giỏ hàng, vui lòng thêm đồ vào giỏ rồi thanh toán!'); 
        }
        else{
            return view('website.payment');
        }   
    }
    public function savePayment(BillRequest $request)
    {
        // $quantity = $request->qly;

        // Tạo mã ngẫu nhiên 16 số
        $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length = substr(str_shuffle(str_repeat($pool, 5)), 0, 16);
        $content = Cart::content();
        if ($countCart = count($content) == 0) {
            return Redirect::to('/thanh-toan')->with('message', 'Bạn không có đồ trong giỏ hàng, vui lòng thêm đồ vào giỏ');
        }
        // dd($content);
        if ($request->payment_method == 2) {
            $totalBill = str_replace(',', '', Cart::subtotal(0));
            // Lưu vào bảng bills
            $bill = new Bill();
            $bill->payment_method = $request->payment_method;
            $bill->total = Cart::subtotal();
            $bill->code = $length;
            if (Auth::id()) {
                $bill->user_id = Auth::id();
            }
            $bill->payment_status == 0;
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

            //Xóa giỏ hàng
            // Cart::destroy();
            $code_length = $length;
            return view('vnpay.index', compact('totalBill', 'code_length'));
        } else {

            // Lưu vào bảng bills
            $bill = new Bill();
            $bill->payment_method = $request->payment_method;
            $bill->total = Cart::subtotal();
            $bill->code = $length;
            if (Auth::id()) {
                $bill->user_id = Auth::id();
            }
            $bill->payment_status == 0;
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
    {$vnp_TmnCode = "3EW6FLZG";
        $vnp_HashSecret = "XTRTBABSGMLYLMFNAPKGCBPDUVTJGXXK";
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/vnpay/return";
        // $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $length = substr(str_shuffle(str_repeat($pool, 5)), 0, 16);
        $vnp_TxnRef = $request->vnp_TxnRef; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = $request->order_type;
        $vnp_Amount = str_replace(',', '', Cart::subtotal(0));
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
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        // dd($vnp_Url);
        // dd($request->all());
        return redirect($vnp_Url);
    }
    public function vnpayReturn(Request $request)
    {

        $data = array(

            "bill_code" => $request->vnp_TxnRef,
            "money" => $request->vnp_Amount,
            "note" => $request->vnp_OrderInfo,
            "vnp_response_code" => $request->vnp_TransactionStatus,
            "code_vnpay" => $request->vnp_TransactionNo,
            "code_bank" => $request->vnp_BankCode,
            "time" => $request->vnp_PayDate,
            "created_at" => now(),
        );
        Payment::insert($data);
        // $request = new Payment();
        // $request->save();

        // dd($data);
        Cart::destroy();
        $length = $data['bill_code'];
        // dd($length);
        return view('website.payment')->with('message', 'Thanh toán thành công cho đơn hàng: ', $length);
    }
}
