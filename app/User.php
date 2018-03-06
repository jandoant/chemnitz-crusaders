<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function attendedEvents()
    {
        return $this->belongsToMany('App\Event')
            ->select('id')
            ->withPivot('status_id')
            ->as('attendance')
            ->withTimestamps(); 
    }

    public function fullName()
    {
        return $this->firstname." ".$this->lastname; 
    }

    public function fullNameReverse()
    {
        return $this->lastname.", ".$this->firstname; 
    }

    public function age()
    {
        $dt = Carbon::parse($this->birthdate);
        Carbon::setLocale('de');
        return $dt->age;
    }

    
}
