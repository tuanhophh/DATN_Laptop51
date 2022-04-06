<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductExportController;
use App\Models\Booking;
// use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
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

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
// Auth::routes(['register' => false]);
// Auth::routes();
Route::get('login',[AuthLoginController::class, 'showLoginForm'])->name('login');
Route::post('login',[AuthLoginController::class, 'login']);
Route::get('register',[RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register',[RegisterController::class, 'register']);
Route::post('logout', 'Auth\AuthLoginController@logout')->name('logout');
Route::post('save-cart', [CartController::class,'saveCart']);
Route::get('gio-hang', [CartController::class,'showCart']);
Route::get('delete-to-cart/{rowId}', [CartController::class,'deleteToCart']);
Route::post('update-cart-quantity', [CartController::class,'updateCartQuantity']);
Route::get('thanh-toan',[PaymentController::class,'showPayment']);
Route::post('save-payment',[PaymentController::class, 'savePayment']);
Route::post('payment/online',[PaymentController::class,'createPayment'])->name('payment.online');
Route::get('vnpay/return',[PaymentController::class,'vnpayReturn'])->name('vnpay.return');
// Route::get('vnpay/return', function(){
//     return view('vnpay.vnpay_return');
// });
Route::prefix('')->group(function () {
    //     đăng nhập
    // Route::get('logout', [\App\Http\Controllers\HomeController::class, 'logout']);
    //     trang cá nhân
    Route::get('profile', function () { 
        return view('website.profile');
    });
    // trang cửa hàng
    Route::get('cua-hang', [HomeController::class, 'show'])->name('website.product');

    Route::get('{id}', [HomeController::class, 'detail'])->name('website.product-detail');
    Route::get('cua-hang/{computerCompany_id}', [HomeController::class, 'company'])->name('website.product');
    // trang giới thiệu
    Route::get('gioi-thieu', function () {
        return view('website.gioi-thieu');
    });
    //Dịch vụ
    Route::get('sua-laptop-lay-ngay-1h', function () {
        return view('website.dv-sua-1h');
    });
    Route::get('sua-laptop-tai-nha-hoac-van-phong', function () {
        return view('website.dv-sua-tai-nha');
    });
    Route::get('thay-the-va-nang-cap-phan-cung', function () {
        return view('website.dv-thay-or-nang-cap');
    });
    Route::get('cai-dat-phan-mem-ban-quyen', function () {
        return view('website.dv-cai-dat-phan-mem');
    });
    Route::get('dich-vu-cho-macbook', function () {
        return view('website.dv-macbook');
    });
    // trang đặt lịch
    Route::get('dat-lich', function () {
        return view('website.booking');
    });
    // trang liên hệ
    Route::get('lien-he', function () {
        return view('website.contact');
    });
    // trang lỗi 404
    Route::get('404', function () {
        return view('website.404');
    });
});
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('add', [UserController::class, 'addForm'])->name('user.add');
    Route::post('add', [UserController::class, 'saveAdd']);
    Route::get('/remove/{id}', [UserController::class, 'remove'])->name('user.remove');
    Route::get('edit/{id}', [UserController::class, 'editForm'])->name('user.edit');
    Route::post('edit/{id}', [UserController::class, 'saveEdit']);
});


// Route::prefix('dat-lich')->group(function () {
//     Route::get('/', [BookingController::class, 'listBooking'])->name('dat-lich.index');
//     Route::get('/danh-sach-may', [BookingController::class, 'listBookingDetail'])->name('dat-lich.danh-sach-may');

//     Route::get('tao-moi', [BookingController::class, 'formCreateBooking'])->name('dat-lich.add');
//     Route::post('tao-moi', [BookingController::class, 'creatBooking']);
//     Route::get('sua/{id}', [BookingController::class, 'formEditBooking'])->name('dat-lich.edit');
//     Route::post('sua/{id}', [BookingController::class, 'editBooking']);
//     Route::get('xoa/{id}', [BookingController::class, 'deleteBooking'])->name('dat-lich.delete');
// });
// Route::prefix('sua-chua')->group(function () {
//     Route::get('/{id}', [BookingController::class, 'repairDetail'])->name('suachua.get');
// });
// });
Route::get('export-product', [ProductExportController::class, 'exportProduct'])->name('export-product');
Route::get('export-detail-product', [ProductExportController::class, 'exportDetailProduct'])->name('export-detail-product');
Route::get('import-product', [ProductExportController::class, 'importViewProduct'])->name('view-import-product');
Route::post('import-product', [ProductExportController::class, 'importProduct'])->name('import-product');
Route::get('import-detail-product', [ProductExportController::class, 'importViewDetailProduct'])->name('view-import-detail-product');
Route::post('import-detail-product', [ProductExportController::class, 'importDetailProduct'])->name('import-detail-product');
// Route::get('login',[ProductController::class, 'getlogin'])->name('login');
// Route::get('login',[ProductController::class, 'postLogin']);
// Route::get('info',[ProductController::class, 'getUserInfo']);
// Route::get('logout',[ProductController::class, 'logOut']);
Route::get('order', [MailController::class,'OrderSuccessEmail'])->name('order-mail');


