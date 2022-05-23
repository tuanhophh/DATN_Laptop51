<?php

namespace App\Http\Controllers;

use App\Models\BillUser;
use App\Models\bill_detail;
use App\Models\Booking;
use App\Models\BookingDetail;
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
        $bills = Booking::query()
            ->with('booking_detail')
            ->whereHas('booking_detail', function ($q) use ($request) {
                if ($request->status == 'Chờ xử lý') {
                    $q->where('status_booking', '=', null);
                }

                if ($request->status == 'Tiếp nhận máy') {
                    $q->where('status_booking', '=', 'received');
                }

                if ($request->status == 'Hủy') {
                    $q->where('status_booking', '=', 'cancel');
                }

                if ($request->status == 'Đang chờ sửa') {
                    $q->where('status_booking', '=', 'latch')
                        ->where('status_repair', '=', 'fixing');
                }

                if ($request->status == 'Đang sửa') {
                    $q->where('status_booking', '=', 'latch')
                        ->where('status_repair', '=', 'waiting');
                }

                if ($request->status == 'Hoàn thành sửa') {
                    $q->where('status_booking', '=', 'latch')
                        ->where('status_repair', '=', 'finish');
                    $q->with('list_bill');
                    $q->whereHas('list_bill', function ($e) use ($request) {
                        $e->where('type', '!=', 2);
                    });
                }

                if ($request->code ?? null) {
                        $q->where('code','like','%'. $request->code.'%');
                    };

                if ($request->status == 'Đã thanh toán') {
                    $q->with('list_bill');
                    $q->whereHas('list_bill', function ($e) use ($request) {
                        $e->where('type', 2);
                    });
                };
            })

            ->orderBy('created_at', 'DESC')->paginate(9);

        return view('admin.bills.index', compact('bills'));
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
        $bill_detail = bill_detail::where('bill_code', $list_bill->code)->get();
        if (($list_bill->status == 0 || $list_bill->status == 3)  && ($request->status == 2 || $request->status == 4)) {
            foreach ($bill_detail as $bill_d) {
                $products = Product::where('id', $bill_d->product_id)->get();
                foreach ($products as $product) {
                    $product->qty = $product->qty - $bill_d->quaty;
                    $product->save();
                }
            }
        }
        $list_bill['status'] = $request->status;
        $list_bill['total_price'] = $request->total_price;
        $bill_user = BillUser::where('bill_code', $list_bill->code)->orderBy('created_at', 'DESC')->first();
        $bill_user['name'] = $request->name;
        $bill_user['email'] = $request->email;
        $bill_user['phone'] = $request->phone;
        $bill_user['address'] = $request->address;
        $bill_user['note'] = $request->note;
        $list_bill->save();
        $bill_user->save();
        Toastr::success('Sửa hóa đơn thành công', 'Thành công');
        return redirect()->route('bill.index');
    }
}
