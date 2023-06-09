<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisteredCourse extends Model
{
    //
    public function student()
    {
    	return $this->belongsTo('App\Student');
    }

     public function academicYear()
    {
    	return $this->belongsTo('App\AcademicYear');
    }
}
