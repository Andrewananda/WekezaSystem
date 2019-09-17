<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class MemberController extends Controller
{

    public function userPermission() {
        $users = User::all();
        return view('add-permission-user',['users'=>$users]);
    }
    public function createRole() {
        $permission = Permission::all();
        $user = Auth::user();
        $user->givePermissionTo($permission);
        return "Updated";
    }
    public function addPermission($id) {
        $role = User::where('id',$id)->with(['permissions'])->first();
        if (!$role)
        {
            abort(404);
        }
        $permissions = Permission::all();
        $perms = $role->permissions->pluck('id')->all();
        return view('member-role',['role'=>$role, 'permissions'=>$permissions, 'perms'=>$perms]);
    }
    public function assignPermission(Request $request,$id) {

        $p_ids = array_map('intval',$request->input('permissions'));
        $permission = Permission::where('id',$p_ids)->pluck('name')->all();

        $role = Role::where(['id',2])->first();
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($permission);
        return redirect()->route('add.member')->with(['message'=>'Successfully added']);


    }

}
