<?php

use App\Http\Controllers\UserController;
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
    return view('website.index');
});
Route::prefix('')->group(function () {
    Route::get('/login', function () {
        return view('login');
    });
    Route::get('/profile', function () {
        return view('website.profile');
    });
    Route::get('/product', function () {
        return view('website.product');
    });
    Route::get('/service', function () {
        return view('website.service');
    });
    Route::get('/blog', function () {
        return view('website.blog');
    });
    Route::get('/booking', function () {
        return view('website.booking');
    });
    Route::get('/contact', function () {
        return view('website.contact');
    });
    Route::get('/404', function () {
        return view('website.404');
    });
});
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('add', [UserController::class, 'addForm'])->name('user.add');
    Route::post('add', [UserController::class, 'saveAdd']);
});

Route::prefix('dat-lich')->group(function () {
    Route::get('/', [BookingController::class, 'listBooking'])->name('dat-lich.index');
    Route::get('tao-moi', [BookingController::class, 'formCreateBooking'])->name('dat-lich.add');
    Route::post('tao-moi', [BookingController::class, 'creatBooking']);
    Route::get('sua/{id}', [BookingController::class, 'formEditBooking'])->name('dat-lich.edit');
    Route::post('sua/{id}', [BookingController::class, 'editBooking']);
    Route::get('xoa/{id}', [BookingController::class, 'deleteBooking'])->name('dat-lich.delete');
});
