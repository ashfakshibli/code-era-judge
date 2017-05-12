<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;


class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/admin_home';

    public function showResetForm(Request $request, $token=null)		
    {	
    	return view('admin.passwords.reset')->with(
    			['token' => $token, 'email' => $request->email]
    		);
    }


    public function guard()
    {
    	return Auth::guard('admin');
    }

    public function broker()
    {
    	return Password::broker('admins');
    }
}
