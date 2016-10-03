<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Student;
use App\CourseAssignment;
use App\Course;
use App\ProgramClass;
use App\RegisteredCourse;
use App\Score;
use App\AcademicYear;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Excel;

class ScoreController extends Controller
{
    //
    public function requestScoreRegistration(Request $request)
    {
     $course = $request['course'];
     $type = $request['type'];
     $semester = $request['semester'];
     if($semester=='1st Semester')
     {
     $semester =1;
     } else{
          $semester =2;
           }
     $class = $request['class'];
     $course = Course::where('code', $course)->first();
     $registered_students = RegisteredCourse::where('course', $course->id)->get(); //In Future classes may be included
     $students = array();

     foreach ($registered_students as $registered_student) {
     $student = Student::find($registered_student->student_id);
     $score   = $student->scores()->where('course', $course->id)->where('type', $type)->first(['value']); 
     if($score instanceof Score)
     	$score = $score->value;
     $user = User::find($student->user_id);
     $students[] = (object) ['id'=>$student->id,'matricule'=>$user->reg_number,'name'=>$user->name,'score'=>$score];
     }
      
     if($course==''){

     	return ['title'=>'<h1>You dont have any courses to manage<small>Control Panel</small><h1>','content'=>'You haven\'t been assigned any course and consquetly any class'];
     }
      return ['title'=>'<h1>'.$course->title.' Score List<small>Control Panel</small><h1>','content'=>view('pages.addscores',['course_name'=>$course->title,'type'=>$type,'students'=>$students,'settings'=>$type.'-'.$semester.'-'.$course->id])->render()];
    }

    public function addScore(Request $request)
    {
     $student_id = $request['id'];
     $student_matricule = $request['matricule'];
     $score_type = $request['type'];
     $score_semester = $request['semester'];
     $value = $request['score'];
     $course = $request['course'];
     $student = Student::find($student_id);
     $user = User::where('reg_number', $student_matricule)->first();
     $proposed_student = $user->student()->first();
     //Security Checks
     if(!$this->compareStudents($student, $proposed_student))
     return ['success'=>false, 'message'=>'There\'s and inregularity with information concerning '.$student_matricule];

      $academic_year = AcademicYear::where('current', true)->first();
      if(!$academic_year instanceof AcademicYear)
         return ['success'=>false,'message'=>'No active academic year please contact administration'];

     $score = new Score();
     $score->value =$value;
     $score->course = $course;
     $score->type = $score_type;
     $score->semester = $score_semester;


     try { 
     	$old = Score::where('student_id', $student->id)->where('course', $course)->where('type', $score_type)->first();
     	if($old instanceof Score){
     		$score = $old;
     		$score->value = $value;
     	}

        $student->scores()->save($score);
        $academic_year->scores()->save($score);

        } catch(\Illuminate\Database\QueryException $ex){ 
        
       return ['success'=>false,'message'=>'An unexpected error occured, this record may already exist.'.$ex->getMessage()];
       // Note any method of class PDOException can be called on $ex.
      }
     

     return ['success'=>true];
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
       $classes = array(); 
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

    public function importScores(Request $request)
    {
        if(Input::file('mark-sheet')){
            $excel = Excel::load(Input::file('mark-sheet'))->all()->toArray();
            return ['success'=>true,'message'=>$excel];

            Excel::load(Input::file('mark-sheet'), function($reader){
                // $reader->each(function($sheet){
                // return ['success'=>true,'message'=>json_encode($sheet->toArray)]; 
                // });

            });
         //return ['success'=>true,'message'=>'Hello our egineers are working on it :)'];   
        }
        return ['success'=>true,'message'=>'Damm!!'];
    }

    public function compareStudents($student_1, $student_2)
    {
    	if($student_1->id!=$student_2->id)
    		return false;
    	return true;
    }
}
