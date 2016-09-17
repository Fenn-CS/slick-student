<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RegisteredCourseController extends Controller
{
    //

    public function dropRegisteredCourse(Request $request)
    {
     return ['success'=>false,'dropped'=>true, 'message'=>$request['course'].' successfully dropped. You are a free bird :) !'];
    }
}
