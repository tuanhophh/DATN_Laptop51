<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        // $users->load('roles');
        return view('admin.users.index', [
            'users' => $users,
            // 'roles' =>$users
        ]);
    }
    public function addForm(){
        $roles = Role::all();
        return view('admin.users.add', compact('roles'));
    }
    public function saveAdd(Request $request){
        // dd($request);
        $model = new User();  
        if($request->hasFile('avatar')){
            $imgPath = $request->file('avatar')->store('public/users');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->avatar = $imgPath;
        }
              
        $model->fill($request->all());
        $model->save();
        return redirect(route('user.index'));

        
    }
}