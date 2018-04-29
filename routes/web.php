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
	return view('home');
});

Route::get('/dashboard', function () {
	return view('layouts.dashboard_layout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=> 'user'], function (){
	Route::get('/logout', 'Auth\LoginController@logoutUser')->name('user.logout');
	Route::get('/schedule', 'UserScheduleController@userIndex')->name('user.schedule');
	Route::POST('/message', 'MessageController@storeUserMessage')->name('user.message');
});


Route::PUT('/team/update-payment/{team}', 'TeamController@updatePayment')->name('team.update-payment');
Route::resource('team', 'TeamController');

Route::resource('member', 'MemberController');

Route::resource('admin/schedule', 'ScheduleController');
Route::POST('admin/location/add', 'ScheduleController@storeLocation')->name('admin.location-add');
Route::POST('admin/location/update/{admin}', 'ScheduleController@updateLocation')->name('admin.location-update');

Route::group(['prefix' => 'admin'], function () {
	Route::GET('/dashboard', 'AdminController@index')->name('admin.dashboard');
	Route::GET('/team', 'AdminController@team')->name('admin.team');
	Route::GET('/show-member/{id}', 'AdminController@show');
	Route::POST('/login', 'Admin\LoginController@login')->name('admin.submit');
	Route::GET('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::GET('/logout', 'Admin\loginController@logout')->name('admin.logout');
	Route::POST('/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::POST('/password/reset', 'Admin\ResetPasswordController@reset');
	Route::GET('/password/reset ', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::GET('/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::POST('/register', 'AdminController@store')->name('admin.register');
	Route::PUT('/update-account/{admin}', 'AdminController@update')->name('admin.update-profile');
	Route::PUT('/payment-confirm/{admin}', 'AdminController@paymentConfirm')->name('admin.payment-confirm');
	Route::PUT('/payment-unconfirm/{admin}', 'AdminController@paymentUnconfirm')->name('admin.payment-unconfirm');
	Route::GET('/admin-account-list', 'AdminController@adminIndex')->name('admin.account-list');

	Route::resource('/message', 'MessageController');
	Route::GET('/message-out', 'MessageController@msgOut')->name('message.out');
});
