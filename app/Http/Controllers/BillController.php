<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\BillUser;
use App\Models\Product;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index(Request $request)
    {
        $bills = Bill::orderBy('id', 'desc')->paginate(8);

        $bill_user = BillUser::all();

        return view('admin.bills.index', compact('bills','bill_user'));
    }
    public function detail($id)
    {
        $bill = Bill::find($id);
        $bill_user = BillUser::where('bill_code',$bill->code)->get()->first->toArray();
        $bill_detail = BillDetail::where('bill_code',$bill->code)->get();
        $prod = Product::all();
        // dd($bill_detail);

        if (!$bill) {
            return view('admin.bills.index')->with('error','Không tìm thấy hóa đơn');
        }
        // $ComputerCompany = ComputerCompany::all();
        return view('admin.bills.detail',compact('bill','bill_user','bill_detail','prod')
        );
    }

    public function edit($id)
    {
        $bill = Bill::find($id);
        $bill_user = BillUser::where('bill_code',$bill->code)->get()->first->toArray();
        $bill_detail = BillDetail::where('bill_code',$bill->code)->get();
        $prod = Product::all();
        if (!$bill) {
            return redirect(route('error'));
        }
        // $ComputerCompany = ComputerCompany::all();
        return view('admin.bills.edit',compact('bill','bill_user','bill_detail','prod')
        );
    }
    public function saveEdit(Request $request, $id)
    {
        $model = bill::find($id);
        $model->fill($request->all());
        $model->save();
        return redirect(route('admin.bills.index'));
    }

}
