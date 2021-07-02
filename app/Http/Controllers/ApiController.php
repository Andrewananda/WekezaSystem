<?php

namespace App\Http\Controllers;

use App\Contribution;
use App\Minutes;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function allMembers() {
        $members = User::query()
            ->orderBy('id','desc')
            ->get();
       return GeneralApiResponse::success('Members fetched successfully', 1, $members);
    }

    public function allProjects() {
        $projects = Project::all();
        return GeneralApiResponse::success('projects fetched successsfully', 1, $projects);
    }

    public function myContribution(Request $request) {
        $user_id = $request->post('user_id');
        $user = User::where(['id'=>$user_id])->first();
        if (!$user) {
            return GeneralApiResponse::error('User not found', 0, null);
        }else {
            $user_contributions = Contribution::where(['user_id'=>$user->id])->get();
            return GeneralApiResponse::success('Contributions fetched successfully', 1, $user_contributions);
        }
    }

    public function allContributions() {
        $contributions = Contribution::all();
        return GeneralApiResponse::success('All contributions fetched successfully', 1, $contributions);
    }

    public function allMinutes() {
        $minutes = Minutes::all();
        return GeneralApiResponse::success('Minutes fetched successfully', 0, $minutes);
    }

    public function lastMinutes() {
        $latest = Minutes::query()
            ->orderBy('id','DESC')
            ->first();
        return response($latest,200);
    }
    public function login(Request $request) {
         $validation = Validator::make($request->all(), [
            'username'=>'required',
            'password'=>'required'
         ]);
         if ($validation->fails()) {
             return GeneralApiResponse::error('Error logging in', 0, $validation->errors()->first());
         }else {
             if (Auth::attempt(['email'=>$request->post('username'), 'password'=>$request->post('password')])){
                 return GeneralApiResponse::success('Login successfully', 1, Auth::user());
             }else {
                 return GeneralApiResponse::error('Error logging in', 0, null);
             }
         }
    }

    public function register(Request $request) {
        $validation = Validator::make($request->all(), [
           'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
            'id_number'=>'required|unique:users',
            'phone'=>'required|unique:users'
        ]);

        if ($validation->fails()) {
            return GeneralApiResponse::error('Validation Error', 0, $validation->getMessageBag()->first());
        }else {
            $user = new User();
            $user->name = $request->post('first_name') .' '. $request->post('last_name');
            $user->email = $request->post('email');
            $user->id_number = $request->post('id_number');
            $user->username = $request->post('first_name') . '.' . $request->post('last_name');
            $user->phone = $request->post('phone');
            $user->password = Hash::make($request->post('password'));

            $user->save();
            $user->assignRole('member');
            return GeneralApiResponse::success('User created successfully', 1, $user);
        }
    }

    public function member($id) {
        $user = User::where(['id'=>$id])->first();
        return response($user);
    }
}
