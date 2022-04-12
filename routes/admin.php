<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingDetailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyComputerController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ThongkeController;
use App\Http\Controllers\NhapsanphamController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Category;
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

Route::get('/', [HomeAdminController::class, 'index'])->name('admin.dashboard')->middleware('can:dash-board');
Route::prefix('bill')->group(function(){
Route::get('/',[BillController::class,'index'])->name('bill.index')->middleware('can:list-bill');
Route::get('detail/{id}',[BillController::class,'detail'])->name('bill.detail')->middleware('can:list-bill');
Route::get('edit/{id}',[BillController::class,'edit'])->name('bill.edit')->middleware('can:edit-bill');
Route::post('edit/{id}',[BillController::class,'saveEdit'])->middleware('can:edit-bill');
});
Route::prefix('CompanyComputer')->group(function () {
    Route::get('/', [CompanyComputerController::class, 'index'])->name('CompanyComputer.index')->middleware('can:list-category');
    Route::get('/remove/{id}', [CompanyComputerController::class, 'remove'])->name('CompanyComputer.remove')->middleware('can:delete-category');
    Route::get('add', [CompanyComputerController::class, 'addForm'])->name('CompanyComputer.add')->middleware('can:add-category');
    Route::post('add', [CompanyComputerController::class, 'saveAdd'])->middleware('can:add-category');
    Route::get('edit/{id}', [CompanyComputerController::class, 'editForm'])->name('CompanyComputer.edit')->middleware('can:edit-category');
    Route::post('edit/{id}', [CompanyComputerController::class, 'saveEdit'])->middleware('can:edit-category');
    Route::get('detail/{id}', [CompanyComputerController::class, 'detail'])->middleware('can:list-category');
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
    Route::get('/', [ProductController::class, 'index'])->name('product.index')->middleware('can:list-product');
    Route::get('/remove/{id}', [ProductController::class, 'remove'])->name('product.remove')->middleware('can:delete-product');
    Route::get('add', [ProductController::class, 'addForm'])->name('product.add')->middleware('can:add-product');
    Route::post('add', [ProductController::class, 'saveAdd'])->middleware('can:add-product');
    Route::get('edit/{id}', [ProductController::class, 'editForm'])->name('product.edit')->middleware('can:edit-product');
    Route::post('edit/{id}', [ProductController::class, 'saveEdit'])->middleware('can:edit-product');
    Route::get('detail/{id}', [ProductController::class, 'detail'])->middleware('can:edit-product');
    Route::post('show-hide/{id}', [ProductController::class, 'ShowHide'])->name('product.show-hide')->middleware('can:edit-product');

});
Route::prefix('detail-product')->group(function () {
    Route::get('/', [DetailProductController::class, 'index'])->name('detail-product.index')->middleware('can:list-product');
    Route::get('/remove/{id}', [DetailProductController::class, 'remove'])->name('detail-product.remove')->middleware('can:delete-product');
    Route::get('add', [DetailProductController::class, 'addForm'])->name('detail-product.add')->middleware('can:add-product');
    Route::post('add', [DetailProductController::class, 'saveAdd'])->middleware('can:add-product');
    Route::get('edit/{id}', [DetailProductController::class, 'editForm'])->name('detail-product.edit')->middleware('can:edit-product');
    Route::post('edit/{id}', [DetailProductController::class, 'saveEdit'])->middleware('can:edit-product');
    Route::get('detail/{id}', [DetailProductController::class, 'detail'])->middleware('can:list-product');
});
// Route::prefix('login')->group(function () {
//     Route::get('/', [LoginController::class, 'index'])->name('admin.login');
// });
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
    Route::get('xuat-hoa-don/{booking_detail_id}', [BookingDetailController::class, 'xuatHoaDon'])->name('dat-lich.xuat-hoa-don');

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
Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index')->middleware('can:list-category');
    Route::get('/remove/{id}', [CategoryController::class, 'remove'])->name('category.remove')->middleware('can:delete-category');
    Route::get('add', [CategoryController::class, 'addForm'])->name('category.add')->middleware('can:add-category');
    Route::post('add', [CategoryController::class, 'saveAdd'])->middleware('can:add-category');
    Route::get('edit/{id}', [CategoryController::class, 'editForm'])->name('category.edit')->middleware('can:edit-category');
    Route::post('edit/{id}', [CategoryController::class, 'saveEdit'])->middleware('can:edit-category');
    // Route::get('detail/{id}', [CategoryController::class, 'detail'])->middleware('can:delete-category');
});

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index')->middleware('can:list-user');
    Route::get('add', [UserController::class, 'addForm'])->name('user.add')->middleware('can:add-user');
    Route::post('add', [UserController::class, 'saveAdd'])->middleware('can:add-user');
    Route::get('remove/{id}', [UserController::class, 'remove'])->name('user.remove')->middleware('can:delete-user');
    Route::get('edit/{id}', [UserController::class, 'editForm'])->name('user.edit')->middleware('can:edit-user');
    Route::post('edit/{id}', [UserController::class, 'saveEdit'])->middleware('can:edit-user');
});
Route::prefix('roles')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles.index')->middleware('can:list-role');
    Route::get('add', [RoleController::class, 'create'])->name('roles.create')->middleware('can:add-role');
    Route::post('add', [RoleController::class, 'store'])->name(('roles.store'))->middleware('can:add-role');
    Route::get('remove/{id}', [RoleController::class, 'remove'])->name('roles.remove')->middleware('can:delete-role');
    Route::get('edit/{id}', [RoleController::class, 'edit'])->name('roles.edit')->middleware('can:edit-role');
    Route::post('edit/{id}', [RoleController::class, 'update'])->name('roles.update')->middleware('can:edit-role');
});


