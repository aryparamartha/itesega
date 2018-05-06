<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'teamname', 'description', 'email', 'phonenumber', 'password', 'avatar',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function messages(){
		return $this->hasMany('App\UserMessage');
	}

	public function messageTemporaries(){
		return $this->hasMany('App\UserMessageTemporary');
	}

	public function adminMessage(){
		return $this->hasMany('App\AdminMessage');
	}

	public function member(){
		return $this->hasMany('App\Member', 'teamid');
	}
}
