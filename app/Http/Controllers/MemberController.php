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
        $user = User::where('id',$id)->with(['permissions'])->first();
        if (!$user)
        {
            abort(404);
        }
        $permissions = Permission::all();
        $perms = $user->permissions->pluck('id')->all();
        return view('member-role',['role'=>$user, 'permissions'=>$permissions, 'perms'=>$perms]);
    }
    public function assignPermission(Request $request,$id) {

        $ids = array_map('intval', $request->input('permissions'));
        $permission = Permission::whereIn('id',$ids)->pluck('name')->all();

        $user = User::where(['id'=>$id])->first();
        $user->syncPermissions($permission);
        return redirect()->route('add.member')->with(['message'=>'Successfully added']);


    }

}
