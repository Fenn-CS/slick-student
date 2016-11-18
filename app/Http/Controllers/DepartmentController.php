<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Department;
use App\Program;

class DepartmentController extends Controller
{
    //
    public function addNewDepartment(Request $request)
    {
     $name = $request['name'];
     $programs = $request['programs'];
     $head = $request['head'];
     $problems ='';

     $programs = explode(",",$programs);

       if($name==''){
        $problems .= '<ul><li>You must provide atleat a name for every new department</li></ul>';
       }  if($problems!=''){
         return ['success'=>false,'message'=>'Course addition failed due to the following errors<br><br>'.$problems];
       }

       $department = new Department();
       $department->name = $name;
       try{
       $department->save();
       foreach($programs as $program){

     	    if($program!=''){
     	    	$Program = new Program();
     	    	$Program->name =$program;
     	        $department->programs()->save($Program);
     	        }
            }
       }catch(\Illuminate\Database\QueryException $ex){ 

          return ['success'=>false,'message'=>'An unexpected error occured '.$ex->getMessage()];
        }



      return ['success'=>true,'message'=>'Department '.$name.' Registered Sucessfully','reset'=>'#form-adddepartment'];
    }


    public function getDepartments()
    {
    	$departments = Department::all();
    	return $departments;
    }
}
