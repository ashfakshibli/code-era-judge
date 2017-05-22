<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contestant/profile', 'HomeController@profile')->name('profile');
Route::get('/password/change', 'HomeController@changePassword')->name('change_password');
Route::post('/password/change', 'HomeController@passwordChange')->name('change_password');
Route::get('contestant/contests', 'HomeController@contests');
Route::get('contestant/problems', 'HomeController@problems');
Route::get('contest/enroll/{contest_id}', 'HomeController@enroll')->name('enroll_contest');
Route::get('contestant/enrolled', 'HomeController@enrolled')->name('enrolled_contests');


Route::get('/contests', 'ContestController@index');
Route::get('/problems', 'ProblemController@index');



Route::get('/problem/{id}', 'ProblemController@show');
Route::get('/contest/{id}', 'ContestController@show');


Route::get('/code/submit', 'ProblemController@codeSubmit');
Route::post('/code/submit', 'ProblemController@fileSubmit');








//Admin Routes
//Logged in admin can't access or send request to this pages

Route::group(['middleware' => 'admin_guest'], function() {

	Route::get('admin_register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin_register');
	Route::post('admin_register', 'AdminAuth\RegisterController@register')->name('admin_store');

	Route::get('admin_login', 'AdminAuth\LoginController@showLoginForm')->name('admin_login_form');
	Route::post('admin_login', 'AdminAuth\LoginController@login')->name('admin_login');


	//Password reset route
	Route::get('admin_password/reset', 'AdminAuth\ForgotPasswordController@showForgotPasswordForm')->name('forgot_password_form');
	Route::post('admin_password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('reset_email');
	Route::get('admin_password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('reset_form');
	Route::post('admin_password/reset', 'AdminAuth\ResetPasswordController@reset')->name('reset');



});

//only logged in admin can see this pages
Route::group(['middleware' => 'admin_auth'], function() {

	Route::post('admin_logout', 'AdminAuth\LoginController@logout')->name('admin_logout');

	Route::get('/admin_home','ContestController@show_all')->name('show_all');
	
	//Problems route

	Route::get('problem/add/{contest_id?}', 'ProblemController@create')->name('create_problem');
	Route::post('problem/add/', 'ProblemController@store')->name('store_problem');
	Route::get('admin/problems', 'ProblemController@show_all')->name('show_problem');
	Route::get('problem/edit/{problem_id}', 'ProblemController@edit')->name('edit_problem');
	Route::post('problem/update/{problem_id}', 'ProblemController@update')->name('update_problem');
	Route::get('problem/destroy/{problem_id}', 'ProblemController@destroy')->name('delete_problem');

	//Contests route
	Route::get('create_contest', 'ContestController@create')->name('create_contest');
	Route::post('create_contest', 'ContestController@store')->name('store_contest');
	Route::get('admin/contests', 'ContestController@show_all')->name('show_all');
	Route::get('contest/edit/{contest_id}', 'ContestController@edit')->name('edit_contest');
	Route::post('contest/update/{contest_id}', 'ContestController@update')->name('update_contest');
	Route::get('contest/destroy/{contest_id}', 'ContestController@destroy')->name('delete_contest');



});





