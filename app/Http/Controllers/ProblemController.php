<?php

namespace App\Http\Controllers;

use Auth;
use App\Problem;
use App\Contest;
use App\Http\Controllers\ContestController;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Hackerearth\sdk\index;


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


        $problem->fill($request->all())->save();

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

    public function fileSubmit(Request $request)
    {
        

        $valid = ['text/x-c','text/plain','application/octet-stream','application/javascript', 'text/x-php'];
        $extension = $request->file->getMimeType();

        if(!in_array($extension, $valid)){
            ContestController::showMessage('alert-danger','Invalid!', 'The file type is invalid' );
            return back();

        }

        $filePath = $request->file->path();
        $sampleInput = $request->input;
        $language = $request->language;

        $response = $this->codeSubmit($filePath, $sampleInput, $language);


        dd($response, $request->output);

        if($response == $request->output){
            $input['result'] = 'AC';
         }
        else $input['result'] = 'WA';


        $problem= Problem::findOrFail($request->problem_id);
        $input['problem_id'] = $request->problem_id;
        $input['contest_id'] = $problem->contest->id;
        $input['user_id']  = Auth::user()->id;
        



        dd($input);

        





        

    }


    public function codeSubmit($filePath, $sampleInput, $language )
    {
                //Setting up the Hackerearth API
        $hackerearth = Array(
                'client_secret' => 'abc4fcdec465a257cef67e9a4d204f459b0247ca', //(REQUIRED) Obtain this by registering your app at http://www.hackerearth.com/api/register/
                'time_limit' => '5',   //(OPTIONAL) Time Limit (MAX = 5 seconds )
                'memory_limit' => '262144'  //(OPTIONAL) Memory Limit (MAX = 262144 [256 MB])
            );

        //Feeding Data Into Hackerearth API
        $config = Array();
        $config['time']='5';        //(OPTIONAL) Your time limit in integer and in unit seconds
        $config['memory']='262144'; //(OPTIONAL) Your memory limit in integer and in unit kb
        $config['file']= $filePath;   
        $config['source']='';       //(REQUIRED) Your formatted source code for which you want to use hackerEarth api, leave this empty if you are using file
        $config['input']= $sampleInput;        //(OPTIONAL) formatted input against which you have to test your source code
        $config['language']=$language;  //(REQUIRED) Choose any one of the below
                                    // C, CPP, CPP11, CLOJURE, CSHARP, JAVA, JAVASCRIPT, HASKELL, PERL, PHP, PYTHON, RUBY

        //Sending request to the API to compile and run and record JSON responses
        $response = $this->run_with_file($hackerearth,$config);     // Use this $response the way you want , it consists data in PHP Array
        //Printing the response
        return $response;
        
    }


    function run($hackerearth,$config)
    {
        // Get cURL resource
        $curl = curl_init();
        // Seting some options
        curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://api.hackerearth.com/v3/code/run/',
        CURLOPT_POST => 1,
        CURLOPT_CAINFO => 'cacert.pem',
        CURLOPT_SSL_VERIFYPEER => 'true',
        CURLOPT_ENCODING => 'UTF-8',
        CURLOPT_POSTFIELDS => array(
                            'client_secret' => $hackerearth['client_secret'],
                            'time_limit' => $hackerearth['time_limit']||$config['time'],
                            'memory_limit' => $hackerearth['memory_limit']||$config['memory'],
                            'source' => $config['source'],
                            'input' => $config['input'],
                            'lang' => $config['language']
        )
        ));
        // Send the request & returning response 
        return json_decode(curl_exec($curl), true);
    }

    function run_with_file($hackerearth,$config){
            // Get cURL resource
            $curl = curl_init();
            // Seting some options
            $myfile = fopen($config['file'], "r") or die("Unable to open file!");
            curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.hackerearth.com/v3/code/run/',
            CURLOPT_POST => 1,
            CURLOPT_CAINFO => 'cacert.pem',
            CURLOPT_SSL_VERIFYPEER => 'true',
            CURLOPT_ENCODING => 'UTF-8',
            CURLOPT_POSTFIELDS => array(
                                'client_secret' => $hackerearth['client_secret'],
                                'time_limit' => $hackerearth['time_limit']||$config['time'],
                                'memory_limit' => $hackerearth['memory_limit']||$config['memory'],
                                'source' => fread($myfile,filesize($config['file'])),
                                'input' => $config['input'],
                                'lang' => $config['language']
            )
            ));
            // Send the request & returning response 
            return json_decode(curl_exec($curl), true);
    }

   

    
}
