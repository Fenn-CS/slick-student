<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Department;
use App\Course;

class CourseController extends Controller
{
    //
    public function addNewCourse(Request $request)
    {
       $department = $request['department'];
       $code = $request['code'];
       $title = $request['title'];
       $credval = $request['creditvalue'];
       $status = $request['status'];
       $level = $request['level'];
       $problems ='';

       if($code==''){
        $problems .= '<ul><li>You must provide a course code for every new course</li>';
       } if($title==''){
           $problems .= '<li>You must provide a course title for every new course</li></ul>';
       }  if($problems!=''){
         return ['success'=>false,'message'=>'Course addition failed due to the following errors<br><br>'.$problems];
       }
      
       $course = new Course();
       $course->title=$title;
       $course->code=$code;
       $course->credit_value=$credval;
       $course->status=$status;
       $course->level=$level;
       $department = Department::where('name',$department)->first();
       $department->courses()->save($course);

       return ['success'=>true,'message'=>'Course '.$code.' Registered Sucessfully'];

    }

    public function getCourses()
    {
      $courses = Course::all();
      return $courses;
    }
}
