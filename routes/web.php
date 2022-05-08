<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductExportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\ComputerCompany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::post('/register', [AuthController::class, 'create'])->name('register');
Route::post('/verify/resend', [AuthController::class, 'resendVerify'])->name('resend.verify');
Route::get('/verify', [AuthController::class, 'showVerify'])->name('show.verify');
Route::post('/verify', [AuthController::class, 'verify'])->name('verify');

// //  Đăng nhập
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('login-otp', [LoginController::class, 'showLoginOtp'])->name('show.login');
Route::post('login-otp', [LoginController::class, 'sendLoginOtp'])->name('send.otp.login');
Route::post('send-login-otp', [LoginController::class, 'loginOtp'])->name('login.otp');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// //  Đăng ký
// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register']);

// //  Quên mật khẩu
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::post('insert-password', [ForgotPasswordController::class, 'insertResetPasswordForm'])->name('insert.password.post');
Auth::routes(['register' => false]);

// //  Xác thực mail
// Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
// Route::get('email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');
// Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

//  Giỏ hàng
Route::post('save-cart', [CartController::class, 'saveCart'])->middleware('phoneverify');
Route::post('add-cart', [CartController::class, 'add'])->middleware('phoneverify');
Route::get('gio-hang', [CartController::class, 'showCart'])->middleware('phoneverify');
Route::get('delete-to-cart/{rowId}', [CartController::class, 'deleteToCart'])->middleware('phoneverify');
Route::post('update-cart-quantity', [CartController::class, 'updateCartQuantity'])->middleware('phoneverify');

//  Thanh toán
Route::get('thanh-toan', [PaymentController::class, 'showPayment'])->name('payment')->middleware('phoneverify');
Route::post('save-payment', [PaymentController::class, 'savePayment'])->middleware('phoneverify');
Route::post('payment/online', [PaymentController::class, 'createPayment'])->name('payment.online')->middleware('phoneverify');
Route::get('vnpay/return', [PaymentController::class, 'vnpayReturn'])->name('vnpay.return')->middleware('phoneverify');
// Route::get('vnpay/return', function(){
//     return view('vnpay.vnpay_return');
// });

//     trang cá nhân
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update-avatar', [ProfileController::class, 'changeImage'])->name('changeImage');
Route::post('profile/update-info', [ProfileController::class, 'changeInfo'])->name('changeInfo');
Route::post('profile/update-password',  [ProfileController::class, 'changePassword'])->name('changePassword');
Route::get('profile/history',  [ProfileController::class, 'history'])->name('profile.history');
Route::post('cancel-order/{code}', [ProfileController::class, 'cancelOrder'])->name('cancel-order');
Route::post('restore-order/{code}', [ProfileController::class, 'restoreOrder'])->name('restore-order');
Route::get('profile/history/{code}',  [ProfileController::class, 'historyDetail'])->name('profile.history.detail');

Route::post('cancel-repair/{code}', [ProfileController::class, 'cancelRepair'])->name('cancel-repair');
Route::post('restore-repair/{code}', [ProfileController::class, 'restoreRepair'])->name('restore-repair');
Route::get('profile/history-repair/{code}',  [ProfileController::class, 'historyDetailRepair'])->name('profile.history.detail-repair');

// trang cửa hàng
Route::get('cua-hang', [HomeController::class, 'show'])->name('website.product');

Route::get('san-pham/{slug}', [HomeController::class, 'detail'])->name('website.product-detail');
Route::get('cua-hang/{id}', [HomeController::class, 'company'])->name('website.product-category');
Route::get('cua-hang/product/{name}', [HomeController::class, 'seachproduct']);
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
// trang tin tức
Route::get('tin-tuc', function () {
    return view('website.tin-tuc');
});
// trang lỗi 404
Route::get('404', function () {
    return view('website.404');
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
Route::get('order', [MailController::class, 'OrderSuccessEmail'])->name('order-mail');

Route::get('error', function () {
    return view('error');
})->name('error');