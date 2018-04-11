<?php

namespace App;

use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable {
	use Notifiable;

	protected $guard = 'admin';

	// /**
	//  * Send the password reset notification.
	//  *
	//  * @param  string  $token
	//  * @return void
	//  */
	// public function sendPasswordResetNotification($token) {
	// 	$this->notify(new AdminResetPasswordNotification($token));
	// }

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'teamname', 'description', 'email', 'phonenumber', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * Send the password reset notification.
	 *
	 * @param  string  $token
	 * @return void
	 */
	public function sendPasswordResetNotification($token) {
		$this->notify(new AdminResetPasswordNotification($token));
	}
}
