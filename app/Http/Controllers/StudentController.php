<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use App\User;
use App\Program;

class StudentController extends Controller
{
    //
      public function addNewStudent(Request $request)
    {
    
    	$name = $request['name'];
    	$nid = $request['nid'];
    	$email = $request['email'];
        $birthdate = $this->str_to_date($request['birthdate']);
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
         $problems .='<li>You must select a program for this student</li>';  	
        }
      
        if($problems!=''){
        return ['success'=>false,'message'=>'Student registration failed due to the following errors <br><br>'.$problems];
        }
        
        $user = new User();
        $user->name = $name;
        $user->reg_number=$matricule;
        $user->email = $email;
        $user->personality ='Student';
        $user->password = bcrypt($matricule);
       
        try { 
         $user->save();
        } catch(\Illuminate\Database\QueryException $ex){ 

       return ['success'=>false,'message'=>'An unexpected error occured, this record may already exist.'.$ex->getMessage()];
       // Note any method of class PDOException can be called on $ex.
        }

        $student = new Student();
        $student->nid = $nid;
        $student->date_of_birth = $birthdate;
        $student->place_of_birth = $birthplace;
        $student->phone = $phone;
        $program = Program::where('name',$program)->first();
        $student->program = $program->id;
        $student->admission_year = $admission_year;
        $student->sex = $sex;
        try { 
        $user->student()->save($student);
        } catch(\Illuminate\Database\QueryException $ex){ 
        
       return ['success'=>false,'message'=>'An unexpected error occured, this record may already exist.'];
       // Note any method of class PDOException can be called on $ex.
      }

     // $student = new Student();
     // $student->name = 'Muki Charles';
     // $student->reg_number = 'CT15A010';
     // $student->password =bcrypt('000000');
     // $student->save();
        return ['success'=>true,'message'=>'Student '.$matricule.' Registered Sucessfully','reset'=>'#form-addstudent'];

    }

    public function getStudents()
    {
      $students=User::where('personality','Student')->orderBy('created_at', 'desc')->paginate(50);
      return $students;
    }
    private function str_to_date($str)
    {
       if($str=='')
        return '';
     $date_arr = explode('-', str_replace("/","-",$str));
     return $date_arr[2].'-'.$date_arr[1].'-'.$date_arr[0];
   }



}
