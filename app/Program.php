<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //
    public function department()
    {
    return $this->belongsTo('App\Department');
    }
    public function students()
    {
    return $this->hasMany('App\Student');
    }
    public function courses()
    {
    return $this->hasMany('App\Course');
    }
    public function classes()
    {
    return $this->hasMany('App\ProgramClass');
    }
}
