<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductExportController;
use App\Models\Booking;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Models\ComputerCompany;

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

Route::prefix('')->group(function () {
    //     đăng nhập
    Route::get('logout', [\App\Http\Controllers\HomeController::class, 'logout']);
    //     trang cá nhân
    Route::get('profile', function () {
        return view('website.profile');
    });
    // trang cửa hàng
    Route::get('cua-hang', function () {
        return view('website.product');
    });
    // Giỏ hàng
    Route::get('cart', function () {
        return view('website.cart');
    });
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
        $company_computer = ComputerCompany::all();
        return view('website.booking', compact('company_computer'));
    })->name('dat-lich.add_client');
    Route::post('dat-lich', [BookingController::class, 'creatBooking']);
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
<<<<<<< HEAD
Route::get('order', [MailController::class, 'OrderSuccessEmail'])->name('order-mail');
=======
Route::get('order', [MailController::class, 'OrderSuccessEmail'])->name('order-mail');

Route::get('error', function () {
    return view('error');
})->name('error');
>>>>>>> 7030e305b1645815451361278adf55dccbe04ac3
