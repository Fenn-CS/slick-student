<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AcademicYear;

class AcademicYearController extends Controller
{
    //
    public function getAcademicYears()
    {
    $years = AcademicYear::all();
    return $years;
    }
    public function addNewAcademicYear(Request $request)
    {
       $name = $request['name'];
       if($name==''){
       return ['success'=>false,'message'=>'Why are you trying to register a year without it\'s name??'];
       }
      $year = new AcademicYear();
      $year->name = $name;
      $year->save();
      return ['success'=>true,'message'=>'The '.$name.'year successfully added','reset'=>'#form-academic-years'];


    }

    public function activateAcademicYear(Request $request)
    {
      $year = AcademicYear::where('current', true)->first();
      if($year instanceof AcademicYear)
      $year->current = false;
      $year->save();
      $year = AcademicYear::where('name', $request['name'])->first();
      $year->current = true;
      $year->save();
      return ['success'=>true,'message'=>'The '.$year->name.' year successfully activated','reset'=>'#form-academic-years'];
    }
}
