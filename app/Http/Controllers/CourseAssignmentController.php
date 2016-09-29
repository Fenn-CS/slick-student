<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;
use App\User;
use App\ProgramClass;
use App\CourseAssignment;

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
       $teacher = User::where('name', $teacher)->where('personality', 'Teacher')->first();
       $teacher = $teacher->teacher()->first();
       $class  = ProgramClass::where('name', $class)->first();

    	try {

    		$courseAssignment = new CourseAssignment();
    		$courseAssignment->course = $course->id;
    		$courseAssignment->class = $class->id;
    		$teacher->courses()->save($courseAssignment);
    		
    	} catch (\Illuminate\Database\QueryException $ex) {

    		 return ['success'=>false,'message'=>'An unexpected error occured, the class you are trying to register might be registered already '.$ex->getMessage()];
    	}

    	return ['success'=>true,'message'=>$course->title.' for '.$class->name.' successfully assigned to '.$request['teacher'],'reset'=>'#form-assigncourse'];
    }
}
