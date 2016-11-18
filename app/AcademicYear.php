<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    //
    public function registeredCourses()
    {
    	return $this->hasMany('App\RegisteredCourse');
    }

    public function scores()
    {
    	return $this->hasMany('App\Score');
    }

    public function results()
    {
    	return $this->hasMany('App\Result');
    }
}
