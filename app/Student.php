<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
     public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function program()
    {
        return $this->belongsTo('App\Program');
    }

    public function courses()
    {
    	return $this->hasMany('App\RegisteredCourse');
    }

    public function scores()
    {
    	return $this->hasMany('App\Score');
    }
}
