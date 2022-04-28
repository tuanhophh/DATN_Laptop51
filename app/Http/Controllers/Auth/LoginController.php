<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'phone';
    }
    public function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => ['required','string'],
            'password' => ['required','string'],
        ],
        [
            'phone.required' => 'Yêu cầu nhập số',
            'phone.string' => 'Số điện thoại phải là số',
            // 'phone.regex' => 'Số điện thoại trong khoảng từ 9(bỏ 0 ở đầu) đến 10 số',
            'password.required' => 'Yêu cầu nhập mật khẩu',
            'password.string' => 'Yêu cầu nhập mật khẩu',
            'failed' => 'Sai mật khẩu hoặc tài khoản?',
            'password' => 'Sai mật khẩu',
            'throttle' => 'Đăng nhập quá nhiều vui lòng đợi ít phút',
       ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'phone' => ['required', 'numeric','regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('website.index');
        }
        return back()->withErrors([
            'phone.required' => 'Yêu cầu nhập số điện thoại',
            'phone.numeric' => 'Số điện thoại phải là số',
            'phone.regex' => 'Số điện thoại phâỉ thuộc danh mục số điện thoại việt nam',
            'password.required' => 'Yêu cầu nhập mật khẩu',
            'password.string' => 'Mật khẩu phải là chuỗi ký tự',
        ]);
    }

    protected function sendLoginResponse(Request $request)
    {   
        $request->session()->regenerate();  

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }
        if(Auth::user()->id_role === 0){
            return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
        }
        else{
            return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->route('admin.dashboard')->with('message', 'Đăng nhập tài khoản thành công!');
        }
    }


}
