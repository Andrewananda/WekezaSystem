<?php

namespace App\Http\Controllers;

use App\Contribution;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;


class MemberController extends Controller
{

    public function userPermission() {
        $users = User::all();
        return view('permissions.add-permission-user',['users'=>$users]);
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
        return view('member.member-role',['user'=>$user, 'permissions'=>$permissions, 'perms'=>$perms]);
    }
    public function assignPermission(Request $request,$id) {

        $ids = array_map('intval', $request->input('permissions'));
        $permission = Permission::whereIn('id',$ids)->pluck('name')->all();

        $user = User::where(['id'=>$id])->first();
        $user->syncPermissions($permission);
        return redirect()->back()->with(['message'=>'Successfully added']);

    }

    public function allPermissions() {
        $permissions = Permission::all();
        return view('permissions.all-permissions',['permissions'=>$permissions]);
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
        $users = Contribution::query()
        ->orderBy('id','Desc')
        ->get();
        return view('Contributions.all-contributions',['users'=>$users]);
    }

    public function myContributions() {
        $id = Auth::user()->getAuthIdentifier();
        $contributions = Contribution::query()
            ->orderBy('date','Desc')
        ->where(['user_id'=>$id])->get();
        return view('Contributions.my-contribution',['contributions'=>$contributions]);
    }
    public function addProject(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        if (!$validate) {
            return back()->withInput(['message' => 'all inputs are required']);
        }
        $project = new Project();
        $project->title = $request['title'];
        $project->description = $request['description'];
        $project->save();
        return redirect()->back()->with(['message' => 'added successfully']);
    }
    public function allProjects() {
        $projects =  Project::all();
        return view('Projects.all-projects',['projects'=>$projects]);
    }

}
