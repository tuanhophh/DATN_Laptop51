<?php

use App\Http\Controllers\BookingController;
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
Route::prefix('dat-lich')->group(function () {
    Route::get('/', [BookingController::class, 'listBooking'])->name('dat-lich.index');
    Route::get('tao-moi', [BookingController::class, 'formCreateBooking']);
    Route::post('tao-moi', [BookingController::class, 'creatBooking']);
    Route::get('sua/{id}', [BookingController::class, 'formEditBooking'])->name('dat-lich.edit');
    Route::post('sua/{id}', [BookingController::class, 'editBooking']);
});