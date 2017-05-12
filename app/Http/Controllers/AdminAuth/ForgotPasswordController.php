<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{
       use SendsPasswordResetEmails;


       public function showForgotPasswordForm()
       {
       		return view('admin.passwords.email');
       }

    	public function broker() //returns own custom password broker for admin model
	    {
	        return Password::broker('admins');
	    }
}
