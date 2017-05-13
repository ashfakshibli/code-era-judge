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
    public function index()
    {
        //
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
        $inputs = $request->all();
        $inputs['start_end_time'] = explode('-', $inputs['start_end_time']);
        $inputs['start_time'] = Carbon::createFromFormat('d/m/Y H:i', trim($inputs['start_end_time'][0]))->toDateTimeString();

        $inputs['end_time'] = Carbon::createFromFormat('d/m/Y H:i', trim($inputs['start_end_time'][1]))->toDateTimeString();


        $this->validator($inputs)->validate();

        $this->create_data($inputs);

        session()->flash('message', 'Please add Problems now.');
        session()->flash('alert-class', 'alert-success');
        session()->flash('alert-heading', 'Contest Created!');

        return redirect('/admin_home');
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
    public function show_all()
    {
        return view('contest.all_contests');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
