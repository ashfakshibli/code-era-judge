<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
	use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];



    protected $hidden = [
        'password', 'remember_token',
    ];


    public function sendPasswordResetNotification($token)
    {
    	$this->notify(new AdminResetPasswordNotification($token));
    }
}
