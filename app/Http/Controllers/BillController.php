<?php

namespace App\Http\Controllers;

use App\Models\BillUser;
use App\Models\bill_detail;
use App\Models\list_bill;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as FacadesRequest;

class BillController extends Controller
{
    public function index(Request $request)
    {
        $bills = list_bill::all();

        $bills = list_bill::when($request->code, function ($query, $code) {
            return $query->where('code', 'like', "%{$code}%");
        })->when($request->status, function ($query) use ($request) {
            if($request->status == 5){
                return $query->where('status', '=', '0' );
            }
            if($request->status == 1){
                return $query->where('status', '=', '1' );
            }
            if($request->status == 2){
                return $query->where('status', '=', '2');
            }
            if($request->status == 3){
                return $query->where('status', '=', '3');
            }
            if($request->status == 4){
                return $query->where('status', '=' , '4');
            }
            if($request->status == 0){
                return $query->orderBy('status','ASC');
            }
        })->when($request->type, function ($query) use ($request) {
            if($request->type == 0){
                return $query->where('type', '=', '0' );
            }
            if($request->type == 1){
                return $query->where('type', '=', '1' );
            }
            if($request->type == 2){
                return $query->where('type', '=', '2');
            }
        })->orderBy('created_at', 'DESC')->paginate(9);
        
        $bill_user = BillUser::all();

        return view('admin.bills.index', compact('bills', 'bill_user'));
    }
    public function show(Request $request)
    {

        $bills = list_bill::orderBy('id', 'desc')->paginate(8);
        $bill_user = BillUser::all();

        return view('admin.bills.index2', compact('bills', 'bill_user'));
    }
    public function detail($id)
    {
        $bill = list_bill::find($id);
        $bill_user = BillUser::where('bill_code', $bill->code)->get()->first->toArray();
        $bill_detail = bill_detail::where('bill_code', $bill->code)->get();
        $prod = Product::all();
        // dd($bill_detail);

        if (!$bill) {
            return view('admin.bills.index')->with('error', 'Không tìm thấy hóa đơn');
        }
        foreach (Auth::user()->unreadNotifications as $notification) {
            if ($notification->data['url'] ===  '/' . FacadesRequest::path()) {
                $userUnreadNotification = auth()->user()
                    ->unreadNotifications
                    ->where('id', $notification->id)
                    ->first();
                if ($userUnreadNotification) {
                    $userUnreadNotification->markAsRead();
                }
            }
        };
        // $ComputerCompany = ComputerCompany::all();
        return view(
            'admin.bills.detail',
            compact('bill', 'bill_user', 'bill_detail', 'prod')
        );
    }

    public function edit($id)
    {
        $bill = list_bill::find($id);
        if (!$bill) {
            return redirect()->route('bill.index')->with('error', 'Không tìm thấy hóa đơn');
        }
        $bill_user = BillUser::where('bill_code', $bill->code)->get()->first->toArray();
        $bill_detail = bill_detail::where('bill_code', $bill->code)->get();
        $prod = Product::all();
        // $ComputerCompany = ComputerCompany::all();
        return view(
            'admin.bills.edit',
            compact('bill', 'bill_user', 'bill_detail', 'prod')
        );
    }
    public function saveEdit(Request $request, $id)
    {   
        $list_bill = list_bill::find($id);
        $list_bill['method'] = $request->method;
        $list_bill['status'] = $request->status;
        $list_bill['total_price'] = $request->total_price;
        $bill_detail = bill_detail::where('bill_code',$list_bill->code)->get();
        if(($list_bill->status == 0 || $list_bill->status == 3)  && ($request->status == 2 || $request->status == 4)){
            foreach($bill_detail as $bill_d){
            $products = Product::where('id', $bill_d->product_id)->get();
                foreach($products as $product){
                    $product->qty = $product->qty - $bill_d->quaty;
                    $product->save();
                }
            }
        }
        $bill_user = BillUser::where('bill_code',$list_bill->code)->orderBy('created_at','DESC')->first();
        $bill_user['name'] = $request->name;
        $bill_user['email'] = $request->email;
        $bill_user['phone'] = $request->phone;
        $bill_user['address'] = $request->address;
        $bill_user['note'] = $request->note;
        $list_bill->save();
        $bill_user->save();
        Toastr::success('Sửa hóa đơn thành công','Thành công');
        return redirect()->route('bill.index');
    }
}
