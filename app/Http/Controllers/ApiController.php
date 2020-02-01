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
        return response()->json([
            "members"=>$members->toArray()
        ],200);
    }

    public function allProjects() {
        $project = Project::all();
        return response()->json([
            "projects"=>$project->toArray()
        ],200);
    }

    public function myContribution($id) {
        if (Contribution::where(['id'=>$id])->exists()) {
            $myContribution = Contribution::where(['id'=>$id])->first();
            return response()->json([
                "single-contribution"=>$myContribution->toArray()
            ],200);
        } else {
            return response()->json([
                "message"=>"User does not exist"
            ],404);
        }

    }

    public function allContributions() {
        $contributions = Contribution::all();
        return response()->json([
            "all-contributions"=>$contributions->toArray()
        ],200);
    }

    public function allMinutes() {
        $minutes = Minutes::all();
        return response()->json([
            "all-minutes"=>$minutes->toArray()
        ],200);
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
