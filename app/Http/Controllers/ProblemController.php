<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use App\Problem;
use App\Contest;
use App\Http\Controllers\ContestController;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Problem $problem)
    {
        $problems =  $problem->with('Contest')->get();

        return view('problem.problems', compact('problems'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($contestId = '')
    {
        if(!empty($contestId)){
            $addToContest = Contest::find($contestId);
            return view('problem.create_problem', compact('addToContest'));
        }
        else return view('problem.create_problem');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
                'title' => 'required',
                'contest_id' => 'required',
                'description' => 'required',
                'input' => 'required',
                'output' => 'required',
            ]);

        Problem::create($request->all());

        ContestController::showMessage('alert-success','Added!', 'Problem added to the contest' );

        return redirect('/admin/contests');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $problem = Problem::with('Contest')->findOrFail($id);
        return view('problem.show', compact('problem'));
    }


    public function show_all(Problem $problem)
    {
        $problems =  $problem->with('Contest')->get();

        return view('problem.list_admin', compact('problems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $problem = Problem::findOrFail($id);

        return view('problem.edit', compact('problem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $problem = Problem::findOrFail($id);

        $this->validate(request(), [
                'title' => 'required',
                'contest_id' => 'required',
                'description' => 'required',
                'input' => 'required',
                'output' => 'required',
            ]);

        $problem->save();

        ContestController::showMessage('alert-success','Updated!', 'Problem has been updated' );

        return redirect('/admin/problems');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $problem = Problem::findOrFail($id);
        $problem->delete();

        ContestController::showMessage('alert-success','Deleted!', 'Problem has been deleted successfully' );

        return redirect('/admin/problems');




        
    }

    
}
