<?php

namespace App\Http\Controllers;

use App\Models\BillUser;
use App\Models\bill_detail;
use App\Models\list_bill;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as FacadesRequest;

class BillController extends Controller
{
    public function index(Request $request)
    {

        $bills = list_bill::orderBy('id', 'desc')->paginate(8);
        // if (!empty($_GET['type_bill'])) {
        //     $type_bill = $_GET['type_bill'];
        //     $bills = list_bill::where('type', $type_bill)->orderBy('id', 'desc')->paginate(8);
        // }
        // if (!empty($_GET['search'])) {
        //     $bill =   $bills->where('code', '%' . $_GET['search'] . '%');
        // }
        // }
        $bill_user = BillUser::all();

        return view('admin.bills.index', compact('bills', 'bill_user'));
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
            $bills = list_bill::orderBy('id', 'desc')->paginate(8);
            $bill_user = BillUser::all();
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
        $bills = list_bill::orderBy('id', 'desc')->paginate(8);
        $bill_user = BillUser::all();
        $model = list_bill::find($id);
        $model['method'] = $request->payment_method;
        $model['status'] = $request->payment_status;
        $model->save();
        return redirect()->route('bill.index')->with('success', 'Sửa thành công');
    }
}