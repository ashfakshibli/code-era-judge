<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $fillable = [
        'result', 'problem_id', 'contest_id','user_id','point',
    ];
}
