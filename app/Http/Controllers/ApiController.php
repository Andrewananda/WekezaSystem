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
        $members = User::all();
        return response($members);
    }

    public function allProjects() {
        $project = Project::all();
        return response($project);
    }

    public function myContribution($id) {
        $myContribution = Contribution::where(['id'=>$id])->first();
        return response($myContribution);
    }

    public function allContributions() {
        $contributions = Contribution::all();
        return response($contributions);
    }

    public function allMinutes() {
        $minutes = Minutes::all();
        return response($minutes);
    }

    public function lastMinutes() {
        $latest = Minutes::query()
            ->orderBy('id','DESC')
            ->first();
        return response($latest);
    }
}
