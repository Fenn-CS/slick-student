<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Program;
use App\Course;
use App\RegisteredCourse;
use App\Student;
use App\User;

class CourseController extends Controller
{
    //
    public function addNewCourse(Request $request)
    {
       $program = $request['program'];
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
       $program = Program::where('name',$program)->first();
       try{
        
        $program->courses()->save($course);

       }catch(\Illuminate\Database\QueryException $ex){ 

       return ['success'=>false,'message'=>'An unexpected error occured, this record may already exist.'];
       // Note any method of class PDOException can be called on $ex.
        }
       

       return ['success'=>true,'message'=>'Course '.$code.' Registered Sucessfully','reset'=>'#form-addcourse'];

    }

    public function getCourses()
    {
      $courses = Course::all();
      return $courses;
    }

    public function getAvailableCourses(Request $request)
    { 
      $level ='';
      if($request['level']!=='...')
      $level =explode(" ",$request['level'])[1];
      $courses =Course::where('level', $level)->get();
      return ['success'=>true,'selection'=>true, 'courses'=>'<h4>Courses found for '. $level.'</h4>'.view('layouts.courses', ['courses'=>$courses])->render()];
    }

    public function saveRegisteredCourses(Request $request)
    {  
      /*Validate course registration list*/ 
      if($request['courses']=='')
      return ['success'=>false,'message'=>'What the hell are you trying to register?? an empty list? damm!'];
      $user = User::find($request->user()->id);
      if($user->personality=='Student'){
      $student = Student::where('user_id', $request->user()->id)->first();
      $courses = explode("-", $request['courses']);
      
      /*Loop over array of courses and save the one by one */
      foreach($courses as $course){
         if($course!='')  {
        $Course = Course::where('code', $course)->first();
        $registeredCourse = new RegisteredCourse();
        $registeredCourse->course = $Course->id;

        //Check if course was previously registered
        $course_exist = RegisteredCourse::where('student_id', $student->id)->where('course', $Course->id)->first();
        if(!is_null($course_exist))
         return ['success'=>false,'message'=>'One or more of the courses you selected have already been registered againts your name this particularly includes'.view('layouts.courses', ['courses'=>[$Course]])->render()];

        $student->courses()->save($registeredCourse);
      }
     }
        /*Get All courses registered by student and pass the to the view for rendering */
      
           $courses = $this->getRegisteredCourses($student->id);
       
     
        return ['success'=>true,'selection'=>false, 'courses'=>'<h4>Courses Registered '.count($courses).'</h4>'.view('layouts.reg-courses', ['courses'=>$courses])->render()];


    }  else {

      return ['success'=>false,'message'=>'You are not a student why the hell are you trying to register courses?? '];
     }
}

    public function getRegisteredCourses($id)
    {
   $student =Student::find($id);
    $registeredcourses = $student->courses;
     $courses =array();
      foreach($registeredcourses as $registeredcourse )
        {
          $course = Course::find($registeredcourse->student_id);
          if($course instanceof Course)
           $courses[] = $course;
        }

        return $courses;
   }

}
