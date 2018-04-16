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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=> 'user'], function (){
	Route::get('/logout', 'Auth\LoginController@logoutUser')->name('user.logout');
	Route::get('/jadwal', 'UserScheduleController@userIndex')->name('user.jadwal');
});


Route::post('/team/update-avatar', 'TeamController@updateAvatar')->name('team.update-avatar');
Route::resource('team', 'TeamController');



Route::resource('member', 'MemberController');
// Route::GET('member/update-avatar/{member}/edit', 'MemberController@editAvatar')->name('member.edit-avatar');
// Route::PUT('member/update-avatar/{member}', 'MemberController@updateAvatar')->name('member.update-avatar');

Route::resource('admin/jadwal', 'ScheduleController');

Route::group(['prefix' => 'admin'], function () {
	Route::GET('/home', 'AdminController@index')->name('admin.home');

	Route::POST('/login', 'Admin\LoginController@login')->name('admin.submit');
	Route::GET('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::GET('/logout', 'Admin\loginController@logout')->name('admin.logout');
	Route::POST('/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::POST('/password/reset', 'Admin\ResetPasswordController@reset');
	Route::GET('/password/reset ', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::GET('/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
});
