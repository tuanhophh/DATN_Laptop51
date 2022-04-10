<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }
    public function index(){
        $roles = $this->role->paginate(10);
        return view('admin.role.index',compact('roles'));
    }

    public function create()
    {   
        $permissionsParent = $this->permission->where('parent_id',0)->get();
        // dd($permissionsParent);
        return view('admin.role.add',compact('permissionsParent'));

    }
    public function store(Request $request)
    {
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);

        $role->permissions()->attach($request->permission_id);
        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
    $permissionsParent = $this->permission->where('parent_id',0)->get();
    $role = $this->role->find($id);
    // dd($role);
    $permissionsChecked  = $role->permissions;
    return view('admin.role.edit',compact('permissionsParent','role','permissionsChecked'));

    }

    public function update(Request $request, $id)
    {
        $role = $this->role->find($id);
        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('roles.index');
    }

    public function remove($id)
    {
        $role = Role::find($id);
        $role = Role::where('id', '=', $id)->first();
            if ($role){
                Role::where('id', $id)->delete();
                return redirect(route('roles.index'))->with('success', 'Xóa thành công');
            }
            else {
            return redirect(route('roles.index'))->with('error', 'Không tìm thấy');
        }
    }

}
