<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;


use App\Admin;
use Auth;
//use Illuminate\Foundation\Auth\RegistersUsers;




class RegisterController extends Controller
{
	protected $redirectPath = 'admin_home';

    public function showRegistrationForm()
    {
    	return view('admin.auth.register');
    }


    public function register(Request $request)
    {
    	//validation
    	
		$this->validator($request->all())->validate();




    	//create admin
    	$admin = $this->create($request->all());


    	//authenticates admin
    	$this->guard()->login($admin);

    	//redirect
    	return redirect($this->redirectPath);
    }

    protected function validator(array $data)			
    {
    	return Validator::make($data, [
    			'name' => 'required|max:255',
    			'email' => 'required|email|max:255|unique:admins',
    			'password' => 'required|min:6|confirmed',
    		]);
    }

    protected function create(array $data)
    {
    	return Admin::create([
    		'name' => $data['name'],
    		'email' => $data['email'],
    		'password' => bcrypt($data['password']), 
    		]);
    }


    protected function guard()
    {
    	return Auth::guard('admin');
    }
}
