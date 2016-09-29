<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Teacher;
use App\CourseAssignment;

class TeacherController extends Controller
{
    //
    public function addNewTeacher(Request $request)
    {
    	$name = $request['name'];
    	$nid = $request['nid'];
    	$email = $request['email'];
    	$birthdate = $request['birthdate'];
    	$birthplace = $request['birthplace'];
    	$program = $request['program'];
    	$phone = $request['number'];
    	$sex = $request['sex'];
    	$problems='';
    	$admission_year = $request['admissionyear'];
    	if(true)
    	{
           $matricule =$request['matricule'];
    	}else
        {
    	   $matricule =$request['automatricule'];
        }
    	
        if($matricule==''){
         $problems .='<ul><li>Impossible to register teacher without staff numbers</li>';
        }if($name==''){
        $problems .='<li>You must provide teacher name</li>';	
        }if($birthdate==''){
         $problems .='<li>You must provide teacher date of birth</li>';  	
        }if($birthplace==''){
         $problems .='<li>You must provide teacher place of birth</li>';  	
        }
        	
        if($problems!=''){
        return ['success'=>false,'message'=>'Teacher registration failed due to the following errors <br><br>'.$problems];
        }
        
        $user = new User();
        $user->name = $name;
        $user->reg_number=$matricule;
        $user->email = $email;
        $user->personality ='Teacher';
        $user->password = bcrypt($matricule);
        try { 
         $user->save();
        } catch(\Illuminate\Database\QueryException $ex){ 

       return ['success'=>false,'message'=>'An unexpected error occured, this record may already exist.'];
       // Note any method of class PDOException can be called on $ex.
        }

        $teacher = new Teacher();
        $teacher->nid = $nid;
        $teacher->date_of_birth = $birthdate;
        $teacher->place_of_birth = $birthplace;
        $teacher->phone = $phone;
        $teacher->sex = $sex;
        try { 
        $user->teacher()->save($teacher);
        } catch(\Illuminate\Database\QueryException $ex){ 
        
       return ['success'=>false,'message'=>'An unexpected error occured, this record may already exist.'];
       // Note any method of class PDOException can be called on $ex.
      }

        return ['success'=>true,'message'=>'Teacher '.$matricule.' Registered Sucessfully','reset'=>'#form-addteacher'];
    }

    public function getTeachers()
    {
        $teachers = User::where('personality','Teacher')->orderBy('created_at', 'desc')->paginate(50);
        return $teachers;
    }

    public function getTeacherCourses()
    {
        $courseAssigments = CourseAssignment::all();
        return $courseAssigments;
    }
}
