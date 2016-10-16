<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AcademicYear;
use App\Result;

class ResultController extends Controller
{
    //

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
