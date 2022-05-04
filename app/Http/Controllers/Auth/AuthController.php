<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;

class AuthController extends Controller
{
    protected function create(RegisterRequest $request)
    {

        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['password'] = $request->password;
        $phoneSend['phone'] = '+84' . $request->phone;
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($phoneSend['phone'], "sms");
        User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'id_role' => 0,
        ]);
        session()->put('phone_verify', $request->phone);
        Toastr::success('Gửi mã xác minh thành công', 'Thành công');
        return redirect()->route('verify');
    }

    protected function resendVerify(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'numeric', 'regex:/^(0)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
        ],
            [
                'phone.required' => 'Yêu cầu nhập số điện thoại',
                'phone.numeric' => 'Số điện thoại phải là số',
                'phone.regex' => 'Số điện thoại phải thuộc đầu số Việt Nam',
            ]);

        session()->put('phone_verify', $request->phone);
        $phoneSend['phone'] = '+84' . $request->phone;
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($phoneSend['phone'], "sms");
        return back()->with('message', 'Đã gửi lại mã xác minh');
    }

    protected function showVerify(Request $request)
    {
        if (session()->has('phone_verify')) {
            return view('auth.verify');
        }
        return redirect()->route('login');
    }
    protected function verify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone' => ['required', 'numeric'],
        ],
            [
                'verfication_code.required' => 'Yêu cầu nhập mã xác minh',
                'verfication_code.numeric' => 'Mã xác minh phải là số',
                'phone.required' => 'Yêu cầu nhập số điện thoại',
                'phone.numeric' => 'Số điện thoại phải là số',

            ]);

        $phoneSend['phone'] = '+84' . $request->phone;
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($data['verification_code'], array('to' => $phoneSend['phone']));
        if ($verification->valid) {
            $user = tap(User::where('phone', $data['phone']))->update(['isVerified' => true]);
            /* Authenticate user */
            Auth::login($user->first());
            if (Session::has('url_path') != null) {
                $url_path = session()->get('url_path');
                session()->forget('phone_verify');
                Toastr::success('Xác minh số điện thoại thành công', 'Thành công');
                return redirect('/san-pham/' . $url_path)->with(['message' => 'Xác minh số điện thoại thành công']);
            }
            session()->forget('phone_verify');
            Toastr::success('Xác minh số điện thoại thành công', 'Thành công');
            return redirect()->route('home')->with(['message' => 'Xác minh số điện thoại thành công']);
        }
        return back()->with(['phone' => $data['phone'], 'error' => 'Mã xác minh không đúng!']);
    }
}
