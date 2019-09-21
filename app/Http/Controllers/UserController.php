<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index() {
        return view('add-member');
    }
    public function registerMember(Request $request) {

        $validate = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'password'=>'required'
        ]);
        if (!$validate) {
            return redirect()->back()->with(['message'=>'fill all the inputs']);
        } else

        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.'  . $extension;
            $request->file('photo')->storeAs('public/member_identity',$filenameToStore);
            $base_url = "http://localhost/WekezaCousins/storage/app/public/member_identity/";
        }
        $user = new User();
        $user->name = $request['first_name'] ." " . $request['last_name'];
        $user->username = $request['username'];
        $user->id_number = $request['id_number'];
        $user->phone = $request['phone'];
        $user->password = bcrypt($request['password']);
        $user->photo = $base_url . $filenameToStore;
        $user->save();
        return redirect()->route('home')->with(['message'=>'Successfull']);
    }

    public function allMembers() {
        $users = User::all();

        return view('all-members',['users'=>$users]);
    }
    public function editMember($id) {
        $user = User::where('id',$id)->first();
        return view('edit-member',['user'=>$user]);
    }

    public function updateMember(Request $request, $id) {
        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.'  . $extension;
            $request->file('photo')->storeAs('public/member_identity',$filenameToStore);
            $base_url = "http://localhost/WekezaCousins/storage/app/public/member_identity/";

            $user = User::where('id',$id)->first();
            $user->name = $request['first_name'];
            $user->username = $request['username'];
            $user->id_number = $request['id_number'];
            $user->phone = $request['phone'];
            $user->photo = $base_url . $filenameToStore;
            $user->save();
        }

        $user = User::where('id',$id)->first();
        $user->name = $request['name'];
        $user->username = $request['username'];
        $user->id_number = $request['id_number'];
        $user->phone = $request['phone'];
        //$user->photo = $request['photo'];
        $user->update();
        return redirect()->route('all.members')->with(['message'=>'Updated Successfully']);
    }

    public function logout() {
        $user = Auth::user();
        Auth::logout($user);
        return redirect()->route('login');
    }
    public function permission() {
        return view('add-permission');
    }
    public function registerPermission(Request $request) {
        $permission = $request['name'];
        Permission::create(['name'=>$permission,'guard_name'=>'web']);
        return redirect()->back()->with(['message'=>'added successfully']);
    }

    public function profile() {
        $user = Auth::user();
        return view('profile',['user'=>$user]);
    }

}
