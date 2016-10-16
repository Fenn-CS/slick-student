<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\User;
use App\Student;
use App\Teacher;
use App\Department;
use App\Program;
use App\RegisteredCourse;
use App\ProgramClass;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }  

     public function dashboard()
    {
    	return view('dashboard');
    }

    public function getStudentsView()
    {
        $controller = new StudentController();

return ['title'=>'<h1>Student List <small>Control Panel</small><h1>','content'=>view('pages.viewstudents',['students'=>$controller->getStudents()])->render()];

    }

    public function getCoursesView()
    {
        $controller = new CourseController();
return ['title'=>'<h1>Course List <small>Control Panel</small><h1>','content'=>view('pages.viewcourses', ['courses'=>$controller->getCourses()])->render()];
    }
    public function getDepartmentsView()
    {
      $controller = new DepartmentController();
return ['title'=>'<h1>View Departments <small>Control Panel</small><h1>','content'=>view('pages.viewdepartments', ['departments'=>$controller->getDepartments()])->render()];
    }
    public function getClassesView()
    {
      $classes = ProgramClass::all();
return ['title'=>'<h1>View Classes <small>Control Panel</small><h1>','content'=>view('pages.viewclasses',['classes'=>$classes])->render()];
    }
    public function getTeachersView()
    {
      $controller = new TeacherController();
return ['title'=>'<h1>View Teachers <small>Control Panel</small><h1>','content'=>view('pages.viewteachers',['teachers'=>$controller->getTeachers()])->render()];       

    }
    public function getScoresView(Request $request)
    {
      $course = $request['course'];
      $type = $request['type'];
      $controller = new ScoreController();
     return ['title'=>'<h1>'.$course.' '.$type.' Scores <small>Control Panel</small><h1>','content'=>view('pages.viewscores',['course'=>$course,'type'=>$type])->render()];       

    }
    public function getUserInfoView(Request $request)
    {
       $user = User::find($request->user()->id);
       $model = '';
       if($user->personality=='Student')
       {
          $student = Student::where('user_id', $request->user()->id)->first(); 
          $model = $student;
       } else if($user->personality=='Teacher')
       {
         $teacher = Teacher::where('user_id', $request->user()->id)->first();
         $model = $teacher;
       } else if($user->personality=='Admin')
       {
       
       } else {}

 return ['title'=>'<h1>My Personal Info<small>Control Panel</small><h1>','content'=>view('pages.userinfo',['user'=>$user,'model'=>$model])->render()];  
    }

    public function getRegisterCoursesView(Request $request)
    {
      $user = User::find($request->user()->id);
      if($user->personality=='Student') 
      {
       $controller = new CourseController();
      $student = Student::where('user_id', $request->user()->id)->first();
      return ['title'=>'<h1>Course Registration <small>Control Panel</small><h1>','content'=>view('pages.registercourses', ['courses'=>$controller->getRegisteredCourses($student->id)])->render()];
      }
      return ['title'=>'<h1>Course registration view for admins not available yet<small>Control Panel</small><h1>','content'=>'Working on views!'];
      
    }
    public function getTeacherAssignments()
    {
      $controller = new TeacherController();
      return ['title'=>'<h1>Course Registration <small>Control Panel</small><h1>','content'=>view('pages.viewcourseassigments', ['assignments'=>$controller->getTeacherCourses()])->render()];
    }

    public function academicYearControls()
    {
      $controller = new AcademicYearController();
     return ['title'=>'<h1>Academic Year Controls <small>Control Panel</small><h1>','content'=>view('pages.academicyearcontrols', ['years'=>$controller->getAcademicYears()])->render()];
    }
    public function feeControls()
    {
      $controller = new FeeController();
      return ['title'=>'<h1>Fee Controls <small>Control Panel</small><h1>','content'=>view('pages.feeoperations',['fees'=>$controller->getFees()])->render()]; 
    }
    public function payFee()
    {
      $controller = new FeeController();
      return ['title'=>'<h1>Fee Payments <small>Control Panel</small><h1>','content'=>view('pages.payfees',['fees'=>$controller->getFees()])->render()]; 
    }

    public function resultRestrictions()
    {
      $AYcontroller = new AcademicYearController();
      $Rcontroller = new ResultController();

      return ['title'=>'<h1>Result Publications <small>Control Panel</small><h1>','content'=>view('pages.resultrestrictions', ['academicyears'=>$AYcontroller->getAcademicYears(),'results'=>$Rcontroller->getResults()])->render()];
    }
    public function test(Request $request){
      //Test to create department
      // $dept = new Department();
      // $dept->name ='ELECTRICAL';
      // $dept->save();
      // $dept = new Department();
      // $dept->name ='COMPUTER';
      // $dept->save();
      // return 'Kool';
       
       //Test to create program;
       // $program = new Program();
       // $program->name = 'SOFTWARE';
       // $program->save();
       // $program = new Program();
       // $program->name = 'HARDWARE';
       // $program->save();
       // return 'Kool';$controller = new CourseController();

       //Test to courses for logged in student;
      // $controller = new CourseController();
      // $student = Student::where('user_id', $request->user()->id)->first();

      // $courses = $controller->getRegisteredCourses($student->id);

      // return $courses;

     
     }
       
}
