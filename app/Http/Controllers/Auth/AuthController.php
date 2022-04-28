<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
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
        $phoneSend['phone'] = '+84'. $request->phone;
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
        ]);
        return redirect()->route('verify')->with(['phone' => $data['phone']]);
    }

    protected function resendVerify(Request $request){
        $phoneSend['phone'] = '+84'. $request->phone;
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($phoneSend['phone'], "sms");
        return back()->with('message','Đã gửi lại mã xác minh');
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

        $phoneSend['phone'] = '+84'. $request->phone;
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($data['verification_code'], array('to' =>  $phoneSend['phone']));
        if ($verification->valid) {
            $user = tap(User::where('phone', $data['phone']))->update(['isVerified' => true]);
            /* Authenticate user */
            Auth::login($user->first());
            if(Session::has('url_path') != NULL){
               $url_path = session()->get('url_path');
               return redirect('/san-pham/'. $url_path)->with(['message' => ' Xác minh số điện thoại thành công']);
            }
            return redirect()->route('home')->with(['message' => 'Số điện thoại đã được xác minh']);
        }
        return back()->with(['phone' => $data['phone'], 'error' => 'Mã xác minh không đúng!']);
    }
}
