<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
	protected $fillable = [
        'title', 'description', 'start_time', 'end_time',
    ];
	
    
}
