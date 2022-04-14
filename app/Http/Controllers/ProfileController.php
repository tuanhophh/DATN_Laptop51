<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return view('auth.login')->with('message','Bạn phải đăng nhập để vào trang này');
        }
    }

     public function index()
    {
    $id = Auth::id();
    $user = User::find($id);
    // dd($user);
    return view('website.profile',compact('user'))->with('message','Đăng nhập thành công');
    }

    public function changeImage(Request $request)
    {

    $id = Auth::id();
    $user = User::find($id);
    if($request->hasFile('avatar')){
        // $oldImg = str_replace('storage/', 'public/', $model->avatar);
        $imgu = new User;
        $request->validate([
            'avatar' => 'mimes:jpg,png,jpeg',
        ],
         [
            'avatar.mimes' => 'Sai định dạng ảnh',
        ]);
        Storage::delete($user->avatar);
        $imgu = $request->file('avatar')->store('products');
        $imgu = str_replace('public/', 'storage', $imgu);
        $user->avatar = $imgu;
        $user->save();
        return Redirect::back()->with('message','Thay đổi ảnh thành công');
    }

    // dd($user);
    return Redirect::back()->with('message','Thay đổi ảnh thành công');
    }

    public function changeInfo(ProfileRequest $reque)
    {   
        // $reque->validate([
        //     'name' => 'required',
        //     'email' => 'required||email||regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
        //     // 'interval' => 'required',
        //     // 'repair_type' => 'required'
        //  ]);
        $id = Auth::id();
        $user = User::find($id);
        if (!$user) {
            return back();
        }
        $user->fill($reque->all());
        $user->save();
        return Redirect::back()->with('message','Thay đổi thông tin thành công');
    }

    
    public function changePassword(Request $request)
    {       
        $user = Auth::user();
    
        $userPassword = $user->password;
        
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
        ],
        [   
            'current_password.required' => 'Nhập mật khẩu cũ',
            'password.required' => 'Nhập mật khẩu mới',
            'password.min' => 'Yêu cầu nhập tối thiểu 6 ký tự',
            'password.same' => 'Mật khẩu không trùng',
            'confirm_password.required' => 'Xác nhận mật khẩu mới',

        ]);

        if (!Hash::check($request->current_password, $userPassword)) {
            return Redirect::back()->with('current_password','Sai mật khẩu');
            // dd($user);
        }
        
        $user->password = Hash::make($request->password);
        $user->save();
        return Redirect::back()->with('message','Thay đổi mật khẩu thành công');
    }

}