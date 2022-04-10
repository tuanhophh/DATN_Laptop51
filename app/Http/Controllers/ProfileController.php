<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}