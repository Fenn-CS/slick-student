<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ProgramClass;
use App\Program;
use App\Course;

class ProgramClassController extends Controller
{
    //
    public function addNewClass(Request $request)
    {   $name = $request['name'];
        $problems ='';
    if($name===''){
    	$problems ='<ul><li>Select a level and department in order to complete name field</li></ul>';
 return ['success'=>false,'message'=>'The new class cannot be registered without an auto generated name. <br><br>'.$problems];
    }
        $class = new ProgramClass();
        $class->name = $name;
        $class->level = $request['level'];
        $program = Program::where('name', $request['program'])->first();

        try{

         $program->classes()->save($class);

        }catch(\Illuminate\Database\QueryException $ex){ 

          return ['success'=>false,'message'=>'An unexpected error occured, the class you are trying to register might be registered already '];
        }
        
    	
    	return ['success'=>true,'message'=>$request['name'].' Registered Successfully','reset'=>'#form-addclass'];
    }
}
