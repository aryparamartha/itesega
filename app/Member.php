<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {
	protected $fillable = [
		'name', 'steamid', 'email', 'phonenumber', 'address',
	];
}
