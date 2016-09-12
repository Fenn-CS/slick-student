<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    public function courses()
    {
    return $this->hasOne('App\Course');
    }

    public function programs()
    {
    return $this->hasMany('App\Program');
    }
}
