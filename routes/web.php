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



//Admin Routes
//Logged in admin can't access or send request to this pages

Route::group(['middleware' => 'admin_guest'], function() {

	Route::get('admin_register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin_register');
	Route::post('admin_register', 'AdminAuth\RegisterController@register')->name('admin_store');

	Route::get('admin_login', 'AdminAuth\LoginController@showLoginForm')->name('admin_login_form');
	Route::post('admin_login', 'AdminAuth\LoginController@login')->name('admin_login');

});

//only logged in admin can see this pages
Route::group(['middleware' => 'admin_auth'], function() {

	Route::post('admin_logout', 'AdminAuth\LoginController@logout')->name('admin_logout');

	Route::get('/admin_home', function(){
		return view('admin.home');
	});
});





