<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    protected $fillable = [
		'user_id', 'subject', 'message', 'view',
	];

	public function users(){
		return $this->belongsTo('App\User');
	}
}
