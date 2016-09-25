<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AssignedCourse;
use App\Course;
use App\User;
use App\ProgramClass;

class CourseAssignmentController extends Controller
{
    //

    public function addNewCourseAssignment(Request $request)
    {
    	$course_code = $request['course'];
    	$teacher = $request['teacher'];
    	$class = $request['class'];
        
       if($course_code===''||$teacher===''||$class===''){

       	 return ['success'=>false,'message'=>'You must complete all fields'];
       }

       $course = Course::where('code',$course_code)->first();
       $teaher = User::where('name', $teacher)->where('personality', 'Teacher')->first();
       $class  = ProgramClass::where('name', $class)->first();

    	try {
    		
    	} catch (\Illuminate\Database\QueryException $ex) {

    		 return ['success'=>false,'message'=>'An unexpected error occured, the class you are trying to register might be registered already '];
    	}

    	return ['success'=>true,'message'=>$course->title.' for '.$class->name.' successfully assigned to '.$request['teacher'],'reset'=>'#form-assigncourse'];
    }
}
