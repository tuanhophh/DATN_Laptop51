<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
     */

    // use SendsPasswordResetEmails;
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm()
    {   
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('auth.forgetPassword');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
    {      
        $request->validate([
            'phone' => ['required', 'numeric', 'regex:/^(0)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
        ],
        [
                'phone.required' => 'Yêu cầu nhập số điện thoại',
                'phone.numeric' => 'Số điện thoại phải là số',
                'phone.regex' => 'Số điện thoại phải thuộc đầu số Việt Nam',
        ]);
            $user_phone = User::where('phone',$request->phone)->get()->first;
            if($user_phone == NULL){
                return back();
                Toastr::error('Không tìm thấy số điện thoại', 'Thất bại');
            }
            $data['phone'] = $request->phone;
            $data['password'] = $request->password;
            $phoneSend['phone'] = '+84'. $request->phone;
            /* Get credentials from .env */
            $token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_sid = getenv("TWILIO_SID");
            $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
            $twilio = new Client($twilio_sid, $token);
            $twilio->verify->v2->services($twilio_verify_sid)
                ->verifications
                ->create($phoneSend['phone'], "sms");
            // dd($request->all());
        // if ($verification->valid) {
        //     $user = tap(User::where('phone', $data['phone']))->update(['isVerified' => true]);

        //   DB::table('password_resets')->insert([
        //       'phone' => $request->email,
        //       'token' => $token,
        //       'created_at' => Carbon::now()
        //     ]);
        session()->put('phone_number',$request->phone);
        Toastr::success('Gửi mã về số điện thoại', 'Thành công');
        return back()->with('message', 'Gửi mã thành công');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm(Request $request)
    {   
        if(session()->has('phone')){
            return view('auth.forgetPasswordLink');
        }
        return redirect()->route('login');
    }

    public function insertResetPasswordForm(Request $request)
    {   
        // dd($request->all());

        if(session()->has('phone')){
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'password.required' => 'Yêu cầu nhập mật khẩu',
                'password.string' => 'Mật khẩu phải là chuỗi ký tự',
                'password.min' => 'Mật khẩu không được nhỏ hơn 8 kí tự',
                'password.confirmed' => 'Mật khẩu không trùng vui lòng nhập lại',
            ]);
           $phone = session()->get('phone');
           $update_password = User::where('phone',$phone)->get()->first();
           $update_password->password = Hash::make($request->password);
           $update_password->save();
           session()->forget('phone');
        }else{
            return view('auth.login');
        }

        Toastr::success('Đổi mật khẩu thành công', 'Thành công');
        return view('auth.login');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {   
        session()->put('phone_number',$request->phone);
        $data = $request->validate([
            'phone_otp' => ['required', 'numeric'],
            'phone' => ['required', 'numeric'],
        ],
        [
                'phone_otp.required' => 'Yêu cầu nhập mã xác minh',
                'phone_otp.numeric' => 'Mã xác minh phải là số',
                'phone.required' => 'Yêu cầu nhập số điện thoại',
                'phone.numeric' => 'Số điện thoại phải là số',
        ]);
        $user_phone = User::where('phone',$request->phone)->get()->first();
        if($user_phone == NULL){
            return back();
            Toastr::error('Không tìm thấy số điện thoại', 'Thất bại');
        }
        $phoneSend['phone'] = '+84'. session()->get('phone_number');
/* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($data['phone_otp'], array('to' => $phoneSend['phone']));
        if ($verification->valid) {
            $user = tap(User::where('phone', $data['phone']))->update(['isVerified' => true]);
            session()->put([
            'phone' => $request->phone,
            'phone_otp' => $data['phone_otp'],
            ]);
            session()->forget('phone_number');
            return view('auth.forgetPasswordLink');
        }
        Toastr::error('Mã xác minh không đúng', 'Thất bại');
        return back()->with(['phone' => $data['phone'], 'error' => 'Mã xác minh không đúng!']);
    }
}
