<?php

namespace App\Http\Controllers;

use App\Contribution;
use App\Project;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $projects = Project::all();
        $contributions = Contribution::query()->sum('amount');
        return view('home',['users'=>$users,'projects'=>$projects,'contributions'=>$contributions]);
    }
}
