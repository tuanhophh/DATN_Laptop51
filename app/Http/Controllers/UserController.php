<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Auth\Authenticatable;

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
        
        return view('admin.users.add' , compact('roles'));
    }
    public function saveAdd(Request $request){
        // dd($request);
        $model = new User();
        // $model = $request->id_role;
        $model['id_role'] = 1;
        $model->fill($request->all());
        // dd($model);
        if($request->hasFile('avatar')){
            $imgPath = $request->file('avatar')->store('public/users');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->avatar = $imgPath;
        }
        $model->save();
        // dd($model->id);
        DB::table('role_user')->insert([
            'role_id' => $request->role_id,
            'user_id' => $model->id,
        ]);
        // $user = $this->user->create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password)
        // ]);
        // $user = $request->role_id;
        // $user->roles()->attach($request->role_id);
        // dd($user);
        // }
              
        return redirect(route('user.index'));
}
    public function remove($id)
    {
        $model=User::find($id);
       
        if(!empty($model->avatar)){
            $imgPath = str_replace('storage/', 'public/', $model->avatar);
            Storage::delete($imgPath);
        }
        $model->delete(); 
        return redirect(route('user.index'));
    }
    public function editForm($id)
    {
        $user = User::find($id);
        // $user_role = DB::table('role_user')->where('user_id', $id)->first();
        $roles = Role::all();
        // $users = User::all();
        if (!$user) {
            return back();
        }
        // dd($roles);
        return view(
            'admin.users.edit',
            compact('user','roles')
        );
    }
    public function saveEdit(Request $request,$id)
    {   
        $model = User::find($id);
        if (!$model) {
            return back();
        }
        
        if($request->hasFile('avatar')){
            // $oldImg = str_replace('storage/', 'public/', $model->avatar);
            Storage::delete($model->avatar);

            $imgPath = $request->file('avatar')->store('user');
            $imgPath = str_replace('public/', 'storage', $imgPath);
            $model->avatar = $imgPath;
        }
        $model->fill($request->all());
        $model->save();
        DB::table('role_user')->where('user_id',$model->id)->update([
            'role_id' => $request->role_id,
            'user_id' => $model->id,
        ]);
        return redirect(route('user.index'));
    }
}