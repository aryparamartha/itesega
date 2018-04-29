<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminMessage extends Model
{
    protected $fillable = [
		'name', 'email', 'subject', 'message', 'view',
	];
}
