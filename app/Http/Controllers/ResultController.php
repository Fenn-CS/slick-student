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
      
      $Scores = [];
      if($user->personality==='Student'){
       $student = $user->student()->first();
       if($type=='CA'){
       $scores = $student->scores()->where('semester', $semester)->where('type',$type)->where('academic_year_id',$academicyear->id)->get();

       foreach ($scores as $score) {
        $course = Course::find($score->course);
        $Scores[] = (object) ['course_code'=>$course->code,'course_title'=>$course->title,'value'=>$score->value,'grade'=>''];
       }

       return ['title'=>'<h1>CA Results<small>Control Panel</small><h1>','content'=>view('pages.caresults',['scores'=>$Scores])->render()];

        } else if($type=='FINAL'){
           
        
        $ca_scores = $student->scores()->where('semester', $semester)->where('type','CA')->where('academic_year_id',$academicyear->id)->get();
           
       for($i=0;$i<count($ca_scores);$i++) {

       $exam_score = $student->scores()->where('semester', $semester)->where('type','EXAM')->where('academic_year_id',$academicyear->id)->where('course',$ca_scores[$i]->course)->first();
       $final = $ca_scores[$i]->value + $exam_score->value;
       $course = Course::find($ca_scores[$i]->course);
       $Scores[] = (object) ['course_code'=>$course->code,'course_title'=>$course->title,'course_cv'=>$course->credit_value,'ca'=>$ca_scores[$i]->value,'exam'=>$exam_score->value,'final'=>$final,'grade'=>$this->grade($final)];
       }


         return ['title'=>'<h1>FINAL Results<small>Control Panel</small><h1>','content'=>view('pages.finalresults',['scores'=>$Scores,'gpa'=>$this->gpa($Scores)])->render()];


        }
      } else {

         return ['title'=>'<h1>REFERENCE ERROR<small>Control Panel</small><h1>','content'=>'Results are available only for students, if you are registered as a student also, log in with your student account LOL'];
      }



       
     }

     public function grade($score)
     {
      if($score>79&&$score<100)
        return 'A';
      if($score>69&&$score<80)
        return 'B+';
      if($score>59&&$score<70)
        return 'B';
      if($score>55&&$score<60)
        return 'C+';
      if($score>49&&$score<55)
        return 'C';
      if($score>44&&$score<49)
        return 'D+';
      if($score>29&&$score<40)
        return 'D';
      if($score>-1&&$score<31)
        return 'F';
     }

     public function gradePoint($score)
     {
       if($score>79&&$score<100)
        return 4;
      if($score>69&&$score<80)
        return 3.5;
      if($score>59&&$score<70)
        return 3;
      if($score>55&&$score<60)
        return 2.5;
      if($score>49&&$score<55)
        return 2;
      if($score>44&&$score<49)
        return 1.5;
      if($score>40&&$score<45)
        return 1;
      if($score>-1&&$score<31)
        return 0;
     }

     public function gpa($scores)
     {
      $total_credits = 0;
      $sum_of_course_credits = 0;

      foreach($scores as $score)
      {
        $total_credits += $score->course_cv;
        $sum_of_course_credits += $score->course_cv * $this->gradePoint($score->final);
      }

      return $sum_of_course_credits/$total_credits;

     }
}
