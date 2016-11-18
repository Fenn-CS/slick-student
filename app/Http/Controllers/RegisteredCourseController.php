<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Student;
use App\Course;
use App\AcademicYear;


class RegisteredCourseController extends Controller
{
    //

   public function getRegisteredCourses($id)
   {
        $student =Student::find($id);
        $registeredcourses = $student->courses;
        $courses =array();
         foreach($registeredcourses as $registeredcourse )
         {
          $course = Course::find($registeredcourse->course);
          if($course instanceof Course)
           $courses[] = $course;
         }

        return $courses;
   }

    public function dropRegisteredCourse(Request $request)
    {
     $user =User::find($request->user()->id);
     $student = $user->student;
     $course = $student->courses()->where('course', $request['course'])->first();
     $course->delete();
     $courses = $this->getRegisteredCourses($student->id);
     return ['success'=>true,'dropped'=>true,'remaining'=>view('layouts.reg-courses', ['courses'=>$courses])->render()];
    }
}
