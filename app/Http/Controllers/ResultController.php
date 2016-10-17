<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AcademicYear;
use App\Result;
use App\Year;

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
}
