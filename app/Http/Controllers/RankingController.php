<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Ranking;
use App\Contest;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $contestData = Contest::with('User', 'Problem')->findOrFail($id);

        //dd($contestData->user);
        //
        foreach($contestData->user as $user){

            $userData = DB::table('rankings')
                            ->where([
                                ['user_id','=',$user->id], 
                                ['contest_id','=',$contestData->id], 
                                ['result','=','AC'],
                                ]);

            $rankingData['contestant_name'] = $user->name;
            $rankingData['solved'] = count($userData);

            $rankingData['time_point'] = $userData->sum('rankings.point');

        }

        dd($rankingData);


        return view('contest.ranking', compact('contestData'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function show(Ranking $ranking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function edit(Ranking $ranking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ranking $ranking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ranking $ranking)
    {
        //
    }
}
