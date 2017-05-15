<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Problem;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contestant.home');
    }


    public function profile()
    {
        return view('contestant.profile');
    }

    public function contests()
    {
        return view('contestant.all_contests');
    }

    public function problems(Problem $problem)
    {
        $problems =  $problem->with('Contest')->get();

        return view('problem.problems', compact('problems'));
    }
}
