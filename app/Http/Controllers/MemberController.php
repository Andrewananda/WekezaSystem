<?php

namespace App\Http\Controllers;

use App\Contribution;
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
        return view('member-role',['user'=>$user, 'permissions'=>$permissions, 'perms'=>$perms]);
    }
    public function assignPermission(Request $request,$id) {

        $ids = array_map('intval', $request->input('permissions'));
        $permission = Permission::whereIn('id',$ids)->pluck('name')->all();

        $user = User::where(['id'=>$id])->first();
        $user->syncPermissions($permission);
        return redirect()->route('member.permission')->with(['message'=>'Successfully added']);

    }

    public function allPermissions() {
        $permissions = Permission::all();
        return view('all-permissions',['permissions'=>$permissions]);
    }
    public function members() {
        $users = User::all();
        return view('Contributions.contribution',['users'=>$users]);
    }
    public function contribution(Request $request) {
        $validation = $request->validate([
            'user_id'=>'required',
            'date'=>'required',
            'amount'=>'required'
        ]);
        if (!$validation) {
            return back()->withErrors(['message'=>'All fields are required']);
        }
        $user = new Contribution();
        $user->user_id = $request['user_id'];
        $user->date = $request['date'];
        $user->amount = $request['amount'];

        $user->save();
        return redirect()->back()->with(['message'=>'Successful']);
    }
    public function allContributions() {
        $users = Contribution::all();
        return view('Contributions.all-contributions',['users'=>$users]);
    }

    public function myContributions() {
        $id = Auth::user()->getAuthIdentifier();
        $contributions = Contribution::whereRaw('user_id',$id)->get();
        return view('Contributions.my-contribution',['contributions'=>$contributions]);
    }

}
