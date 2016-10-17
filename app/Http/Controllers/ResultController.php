<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AcademicYear;
use App\Result;
use App\Year;
use App\Course;

class ResultController extends Controller
{
    //



     public function addNewResult(Request $request)
     {
     	  $semester = $request['semester'];
          if($semester=='1st Semester'){
            $semester =1;
            } else {
              $semester =2;
            }
     	$type = $request['type'];
     	$year = $request['year'];
     	if($year==''){
     		 return ['success'=>false,'message'=>'You must specify the academic year.'];
     	}
     	$academicyear = AcademicYear::where('name', $year)->first();
     	$oldresult = Result::where('type', $type)->where('academic_year_id', $academicyear->id)->where('semester', $semester)->first();
     	if($oldresult instanceof Result){
     		 return ['success'=>false,'message'=>'This result publication had been done earlier.'];
     	}
     	$result = new Result();
     	$result->type = $type;
     	$result->semester = $semester;
     	$academicyear->results()->save($result);
        return ['success'=>true,'message'=>'Result publication done.','reset'=>'#form-result-restrictions'];
      
     }

     public function getResults()
     {
     	$results = Result::all();
     	 return $results;
     }
     public function showViewResultsPromptForm(Request $request)
     {
     	$academicyears = AcademicYear::all();
     return ['title'=>'<h1>Results Prompt<small>Control Panel</small><h1>','content'=>view('pages.resultsprompt',['academicyears'=>$academicyears])->render()];

     }

     public function activateResultPublication(Request $request)
     {
      $result = Result::find($request['id']);
      $availability = '';
      if($result->status){
      $result->status= false;
      $availability = 'unavailable';
      } else {
       $result->status= true;
      $availability = 'available';
      }
       $result->save();	
     
      return ['success'=>true,'message'=>'Results now '.$availability,'reset'=>'#form-result-restrictions'];
     }

     public function showResults(Request $request)
     {
      $user = $request->user();
      $semester = $request['semester'];
       if($semester=='1st Semester'){
            $semester =1;
            } else {
              $semester =2;
            }
      $type = $request['type'];
      $year = $request['year'];
      $academicyear = AcademicYear::where('name', $year)->first();
      $errors = '';
      if($year==''){
        $errors = '<ul><li>You must specify and academic year. Contact administration to add one!</li></ul>';
      }
      if($errors!=''){
       return ['title'=>'<h1>CA Results<small>Control Panel</small><h1>','content'=>$errors]; 
      }

      if($user->personality==='Student'){
       $student = $user->student()->first();
       $scores = $student->scores()->where('semester', $semester)->where('type',$type)->where('academic_year_id',$academicyear->id)->get();
       foreach ($scores as $score) {
        $course = Course::find($score->course);
        $Scores[] = (object) ['course_code'=>$course->code,'course_title'=>$course->title,'value'=>$score->value,'grade'=>''];
       }

       return ['title'=>'<h1>CA Results<small>Control Panel</small><h1>','content'=>view('pages.caresults',['scores'=>$Scores])->render()];
      } else {

         return ['title'=>'<h1>REFERENCE ERROR<small>Control Panel</small><h1>','content'=>'Results are available only for students, if you are registered as a student also, log in with your student account LOL'];
      }



       
     }
}
