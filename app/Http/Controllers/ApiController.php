<?php

namespace App\Http\Controllers;

use App\Contribution;
use App\Minutes;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    }

    public function member($id) {
        $user = User::where(['id'=>$id])->first();
        return response($user);
    }
}
