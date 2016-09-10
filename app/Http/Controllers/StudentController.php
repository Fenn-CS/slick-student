<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\User;

class StudentController extends Controller
{
    //
      public function addNewStudent(Request $request)
    {
    	$password = $request['password'];
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
         $problems .='<ul><li>Impossible to register student without matricule</li>';
        }if($name==''){
        $problems .='<li>You must provide student name</li>';	
        }if($birthdate==''){
         $problems .='<li>You must provide student date of birth</li>';  	
        }if($birthplace==''){
         $problems .='<li>You must provide student place of birth</li>';  	
        }if($program==''){
         $problems .='<li>You must select a program this student</li>';  	
        }if($sex==''){
         $problems .='<li>You must select student sex</li></ul>';  	
        }
        	
      
        if($problems!=''){
        return ['success'=>false,'message'=>'Student registration failed due to the following errors <br><br>'.$problems];
        }
        
        $user = new User();
        $user->name = $name;
        $user->reg_number=$matricule;
        $user->email = $email;
        $user->personality ='student';
        $user->password = bcrypt($matricule);
        if(!$user->save()){
        return ['success'=>false,'message'=>'An unexpected error occured'];
        }

        $student = new Student();
        $student->nid = $nid;
        $student->date_of_birth = $birthdate;
        $student->place_of_birth = $birthplace;
        $student->phone = $phone;
        $student->program =$program;
        $student->department= '';
        $student->admission_year = $admission_year;
        if(!$user->student()->save($student)){
        return ['success'=>false,'message'=>'An unexpected error occured'];
        }

     // $student = new Student();
     // $student->name = 'Muki Charles';
     // $student->reg_number = 'CT15A010';
     // $student->password =bcrypt('000000');
     // $student->save();
        return ['success'=>true,'message'=>'Student '.$matricule.' Registered Sucessfully'];

    }

    public function getStudents()
    {
      $students=User::where('personality','student')->orderBy('created_at', 'desc')->paginate(50);
      return $students;
    }



}
