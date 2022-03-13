<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProductExportController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('check-admin', function () {
    return view('demo_admin');
});
Route::prefix('user')->group(function(){
    Route::get('/', [UserController::class,'index'])->name('user.index');
    Route::get('add',[UserController::class,'addForm'])->name('user.add');
    Route::post('add',[UserController::class,'saveAdd']);
    Route::get('/remove/{id}', [UserController::class, 'remove'])->name('user.remove');
    Route::get('edit/{id}',[UserController::class,'editForm'])->name('user.edit');
    Route::post('edit/{id}',[UserController::class,'saveEdit']);
});
Route::prefix('dat-lich')->group(function () {
    Route::get('/', [BookingController::class, 'listBooking'])->name('dat-lich.index');
    Route::get('tao-moi', [BookingController::class, 'formCreateBooking']);
    Route::post('tao-moi', [BookingController::class, 'creatBooking']);
    Route::get('sua/{id}', [BookingController::class, 'formEditBooking'])->name('dat-lich.edit');
    Route::post('sua/{id}', [BookingController::class, 'editBooking']);
});
Route::get('export-product',[ProductExportController::class, 'exportProduct'])->name('export-product');
Route::get('export-detail-product',[ProductExportController::class, 'exportDetailProduct'])->name('export-detail-product');
Route::get('import-product', [ProductExportController::class, 'importViewProduct'])->name('view-import-product');
Route::post('import-product', [ProductExportController::class, 'importProduct'])->name('import-product');
Route::get('import-detail-product', [ProductExportController::class, 'importViewDetailProduct'])->name('view-import-detail-product');
Route::post('import-detail-product', [ProductExportController::class, 'importDetailProduct'])->name('import-detail-product');