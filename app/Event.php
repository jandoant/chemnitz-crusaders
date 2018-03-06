<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'location', 'datetime',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function prettyDate(){        
        $dt = Carbon::parse($this->datetime);
        Carbon::setLocale('de');
        return $dt->diffForHumans();
    }
}
