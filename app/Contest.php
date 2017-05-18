<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Contest extends Model
{
	protected $fillable = [
        'title', 'description', 'start_time', 'end_time',
    ];

    public function problem()
	{
		return $this->hasMany(Problem::class);
	}

	public function user()
	{
		return $this->belongsToMany(User::class);
	}
	
    
}
