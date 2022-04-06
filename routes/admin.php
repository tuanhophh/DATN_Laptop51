<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingDetailController;
use App\Http\Controllers\CompanyComputerController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ThongkeController;
use App\Http\Controllers\NhapsanphamController;
use App\Models\DetailProduct;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeAdminController::class, 'index']);

Route::prefix('CompanyComputer')->group(function () {
    Route::get('/', [CompanyComputerController::class, 'index'])->name('CompanyComputer.index');
    Route::get('/remove/{id}', [CompanyComputerController::class, 'remove'])->name('CompanyComputer.remove');
    Route::get('add', [CompanyComputerController::class, 'addForm'])->name('CompanyComputer.add');
    Route::post('add', [CompanyComputerController::class, 'saveAdd']);
    Route::get('edit/{id}', [CompanyComputerController::class, 'editForm'])->name('CompanyComputer.edit');
    Route::post('edit/{id}', [CompanyComputerController::class, 'saveEdit']);
    Route::get('detail/{id}', [CompanyComputerController::class, 'detail']);
});
Route::prefix('nhap_sanpham')->group(function () {
    Route::get('/', [NhapsanphamController::class, 'index'])->name('nhap-sanpham.index');
    Route::get('/remove/{id}', [NhapsanphamController::class, 'remove'])->name('nhap-sanpham.remove');
    Route::get('add/{id}', [NhapsanphamController::class, 'addForm'])->name('nhap-sanpham.add');
    Route::post('add/{id}', [NhapsanphamController::class, 'saveAdd']);
    Route::get('edit/{id}', [NhapsanphamController::class, 'editForm'])->name('nhap-sanpham.edit');
    Route::post('edit/{id}', [NhapsanphamController::class, 'saveEdit']);
    Route::get('detail/{id}', [NhapsanphamController::class, 'detail']);
});
Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/remove/{id}', [ProductController::class, 'remove'])->name('product.remove');
    Route::get('add', [ProductController::class, 'addForm'])->name('product.add');
    Route::post('add', [ProductController::class, 'saveAdd']);
    Route::get('edit/{id}', [ProductController::class, 'editForm'])->name('product.edit');
    Route::post('edit/{id}', [ProductController::class, 'saveEdit']);
    Route::get('detail/{id}', [ProductController::class, 'detail']);
});
Route::prefix('detail-product')->group(function () {
    Route::get('/', [DetailProductController::class, 'index'])->name('detail-product.index');
    Route::get('/remove/{id}', [DetailProductController::class, 'remove'])->name('detail-product.remove');
    Route::get('add', [DetailProductController::class, 'addForm'])->name('detail-product.add');
    Route::post('add', [DetailProductController::class, 'saveAdd']);
    Route::get('edit/{id}', [DetailProductController::class, 'editForm'])->name('detail-product.edit');
    Route::post('edit/{id}', [DetailProductController::class, 'saveEdit']);
    Route::get('detail/{id}', [DetailProductController::class, 'detail']);
});
Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
});
Route::prefix('dat-lich')->group(function () {
    Route::get('/', [BookingController::class, 'listBookingDetail'])->name('dat-lich.index');
    Route::post('/', [BookingController::class, 'selectUserRepair']);

    Route::get('/danh-sach-may', [BookingController::class, 'listBookingDetail'])->name('dat-lich.danh-sach-may');
    Route::post('/danh-sach-may', [BookingController::class, 'selectUserRepair']);
    // Route::get('/danh-sach-may-phan-cong', [BookingController::class, 'listBookingDetail'])->name('dat-lich.danh-sach-may');


    Route::get('tao-moi', [BookingController::class, 'formCreateBooking'])->name('dat-lich.add');
    Route::post('tao-moi', [BookingController::class, 'creatBooking']);
    Route::get('sua/{id}', [BookingController::class, 'formEditBooking'])->name('dat-lich.edit');
    Route::post('sua/{id}', [BookingController::class, 'editBooking']);
    Route::get('xoa/{id}', [BookingController::class, 'deleteBooking'])->name('dat-lich.delete');
    Route::get('demo', [BookingController::class, 'demo']);
    Route::get('hoa-don/{id}', [BookingDetailController::class, 'hoaDon'])->name('dat-lich.hoa-don');
    Route::get('danh-sach-may-phan-cong', [BookingController::class, 'userRepair'])->name('dat-lich.user_epair');
    Route::get('xoa-may/{id}', [BookingController::class, 'deleteBooking'])->name('dat-lich.deleteBookingDetail');
});
Route::prefix('sua-chua')->group(function () {
    Route::get('/{id}', [BookingController::class, 'repairDetail'])->name('suachua.get');
    Route::post('/{id}', [BookingController::class, 'FinishRepairDetail']);
    Route::get('/detail-product/{id}', [BookingDetailController::class, 'getDetailProduct']);
});

Route::prefix('thongke')->group(function () {
    Route::get('sanpham', [ThongkeController::class, 'sanpham'])->name('thongke-sanpham');
    Route::get('chitiet-sanpham', [ThongkeController::class, 'chitietSanpham'])->name('thongke-chitiet-sanpham');
    Route::get('order', [ThongkeController::class, 'order'])->name('thongke-order');
    Route::get('ajax', [ThongkeController::class, 'ajax']);
});