<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = [
        'title', 'description', 'contest_id', 'input', 'output',
    ];

    protected $hidden = [
        'contest_id',
    ];

    public function contest()
    {
    	return $this->belongsTo(Contest::class);
    }


	
}
