<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    //
     public function academicYear()
    {
    	return $this->belongsTo('App\AcademicYear');
    }
}
