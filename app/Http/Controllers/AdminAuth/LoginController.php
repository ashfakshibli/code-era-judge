<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
	//trait
    use AuthenticatesUsers;

	protected $redirectTo = '/admin_home';
    

    //Custom guard for admin
    protected function guard()
    {
    	return Auth::guard('admin');
    }


    public function showLoginForm()
    {
    	return view('admin.auth.login');
    }





}
