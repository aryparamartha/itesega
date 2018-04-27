<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    protected $fillable = [
		'name', 'email', 'subject', 'message', 'view',
	];
}
