<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contest;
use Carbon\Carbon;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Contest $contests)
    {
        $contests->all();
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contest.create_contest');
    }







    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $this->timeSeparator($request->all());
        
        $this->validator($inputs)->validate();

        $this->create_data($inputs);

        $this->showMessage('alert-success', 'Contest created!', 'The contest has been created. Add problems now.');

        return redirect('/admin_home');
    }


    public function showMessage($alertClass='alert-success', $heading, $message='' )
    {
        session()->flash('message', $message );
        session()->flash('alert-class', $alertClass);
        session()->flash('alert-heading', $heading);
    }


    public function timeSeparator(array $array)
    {
        $inputs = $array;
        $inputs['start_end_time'] = explode('-', $inputs['start_end_time']);
        $inputs['start_time'] = Carbon::createFromFormat('d/m/Y H:i', trim($inputs['start_end_time'][0]))->toDateTimeString();

        $inputs['end_time'] = Carbon::createFromFormat('d/m/Y H:i', trim($inputs['start_end_time'][1]))->toDateTimeString();    
        return $inputs;    
    }


    protected function validator(array $data)           
    {
        return Validator::make($data, [
                'title' => 'required',
                'description' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
            ]);
    }

    protected function create_data(array $data)
    {
        return Contest::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'start_time' => $data['start_time'], 
            'end_time' => $data['end_time'], 
            ]);
    }







    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }









    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_all(Contest $contest)
    {
        $contests = $contest->all();
     
        return view('contest.admin_contest_list', compact('contests'));
    }








    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contest = Contest::findOrFail($id);

        return view('contest.edit', compact('contest'));
        
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
        $contest = Contest::findOrFail($id);

        $inputs = $this->timeSeparator($request->all()); 

        $this->validator($inputs)->validate();

        $contest->fill($inputs)->save();


        $this->showMessage('alert-success','Contest updated!');

        return redirect('/admin/contests');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
