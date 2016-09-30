<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\CourseAssignment;
use App\Course;
use App\ProgramClass;

class ScoreController extends Controller
{
    //
    public function requestScoreRegistration(Request $request)
    {
     $course = $request['course'];
     $type = $request['type'];
     $semester = $request['semester'];
     $class = $request['class'];

     if($course===''){
     	
     	return ['title'=>'<h1>You dont have any courses to manage<small>Control Panel</small><h1>','content'=>'You haven\'t been assigned any course and consquetly any class'];
     }
      return ['title'=>'<h1>'.$course.' Score List<small>Control Panel</small><h1>','content'=>view('pages.addscores',['course_name'=>$course,'type'=>$type])->render()];
    }

    public function addScore()
    {

    }

    public function showAddScoresPromptForm(Request $request)
    {
      return $this->showScorePromptForm('form-addscores', $request);

    }
    public function showViewScoresPromptForm(Request $request)
    {
     return $this->showScorePromptForm('form-viewscores', $request);
    }

    public function showScorePromptForm($type, $request)
    {
       
       $courses = array();
       $classes =array(); 
       $user = User::find($request->user()->id);
       if($user->personality==='Teacher')
       {

     	$teacher = $user->teacher()->first();
     	$courseAssignments = $teacher->courses;
     	//Loop and check teacher authorised courses and classes
     	foreach ($courseAssignments as $courseAssignment) {
     	   $course = Course::find($courseAssignment->course);
     	   if($course instanceof Course){}
     	   	$courses[] = $course;
     	   $class = ProgramClass::find($courseAssignment->class);
     	   if($class instanceof ProgramClass){}
     	   	 $classes[] = $class;
     	}

        } else if($user->personality==='Admin'){

         $courses = Course::all();
         $classes = ProgramClass::all();
         } else{

         return ['title'=>'<h1>Permission Error<small>Control Panel</small><h1>','content'=>'OOPS-YOU ARE NOT PERMITTED'];
      }
     $form_type ='';
     if($type==='form-addscores')
     {
      $form_type = 'Add';
     } else {
      $form_type= 'View';
     }

	return ['title'=>'<h1>'.$form_type.' Scores Prompt<small>Control Panel</small><h1>','content'=>view('pages.scoresprompt',['id'=>$type,'courses'=>$courses,'classes'=>$classes])->render()];
    }
}