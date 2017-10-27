<?php

namespace App\Http\Controllers;

use App\Contest;
use App\User;
use App\Problem;
use App\Http\Controllers\ContestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

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
        $user = User::findOrFail(Auth::user()->id);
        $enrolled = $user->contest;

        //dd($enrolled);


        return view('contestant.profile');
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

    public function changePassword()
    {
        return view('auth.passwords.change_password');
    }

    //BPT tested
    public function passwordChange(Request $request)
    {

        $this->validate(request(),
            [
                'password' => 'required|min:6|confirmed',
            ]);


        $request->user()->fill([

            'password' => Hash::make($request->password)

            ])->save();

        if(!$error){
            ContestController::showMessage('alert-success','Success!', 'Password Change Successfully' );
            return redirect('/home');
        }
        else{
            return back();
        }

        

      
    }



    public function enroll($contestId)        
    {
        //dd($request->all());

        $contest = Contest::find($contestId);
        $contest->user()->attach(Auth::user()->id);

        ContestController::showMessage('alert-success','Success!', 'Successfully Enrolled to the contest' );

        return redirect('/contestant/enrolled');


    }
    public function enrolled()
    {
        $user = User::findOrFail(Auth::user()->id);
        $enrolled = $user->contest;
        
        return view('contest.enrolled', compact('enrolled'));

    }

    public static function notify()
    {
        $user = User::findOrFail(Auth::user()->id);
        $enrolled = $user->contest;

        return $enrolled;
    }
}
