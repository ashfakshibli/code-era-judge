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
        $userCount = 0;
        foreach($contestData->user as $user){

            $userData = DB::table('rankings')
                            ->where([
                                ['user_id','=',$user->id], 
                                ['contest_id','=',$contestData->id], 
                                ['result','=','AC'],
                                ]);

            $userDataAll = DB::table('rankings')
                            ->where([
                                ['user_id','=',$user->id], 
                                ['contest_id','=',$contestData->id], 
                                ]);

            $rankingData[$userCount]['contestant_name'] = $user->name;

            
            $rankingData[$userCount]['solved'] = $userData->count();

            $rankingData[$userCount]['time_point'] = $userDataAll->sum('rankings.point');

            $letter = range('A', 'Z');
            $count = 0;
            foreach ($contestData->problem as $problem) {
                $problemSolved = DB::table('rankings')
                            ->where([
                                ['user_id','=',$user->id], 
                                ['contest_id','=',$contestData->id], 
                                ['problem_id','=',$problem->id], 
                                ['result','=','AC'],
                                ]);
                $problemAttempted = DB::table('rankings')
                            ->where([
                                ['user_id','=',$user->id], 
                                ['contest_id','=',$contestData->id], 
                                ['problem_id','=',$problem->id], 
                                ['result','=','WA'],
                                ]);
                if($problemSolved->count()){
                        $rankingData[$userCount]['problem'][$letter[$count]]['result'] = 'AC';
                }
                elseif ($problemAttempted->count()) {
                    $rankingData[$userCount]['problem'][$letter[$count]]['result'] = 'WA';
                }
                else $rankingData[$userCount]['problem'][$letter[$count]]['result'] = 'NA';

                if($problemSolved->count() && $problemAttempted->count()){
                    $rankingData[$userCount]['problem'][$letter[$count]]['point'] = $problemSolved->sum('rankings.point')+ $problemAttempted->sum('rankings.point');
                }
                else $rankingData[$userCount]['problem'][$letter[$count]]['point'] = '0';
                
                $count++;

            }
            $userCount++;

        }

        //dd($rankingData);

       

        

        $sortedRankingData = $this->orderBy($rankingData, 'solved');

        //dd($sortedRankingData);
        return view('contest.ranking', compact('sortedRankingData', 'contestData'));


    }

    function orderBy($data, $field) { 
        $code = "return  \$b['$field'] -\$a['$field'] ;"; 
        usort($data, create_function('$a,$b', $code));
        return $data; 
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
