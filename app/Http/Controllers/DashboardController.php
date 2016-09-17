<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Student;
use App\Department;
use App\Program;
use App\RegisteredCourse;
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
return ['title'=>'<h1>View Classes <small>Control Panel</small><h1>','content'=>view('pages.viewclasses')->render()];
    }
    public function getTeachersView()
    {
      $controller = new TeacherController();
return ['title'=>'<h1>View Teachers <small>Control Panel</small><h1>','content'=>view('pages.viewteachers',['teachers'=>$controller->getTeachers()])->render()];       

    }
    public function getScoresView()
    {
return ['title'=>'<h1>Scores <small>Control Panel</small><h1>','content'=>view('pages.viewscores')->render()];       

    }

    public function getRegisterCoursesView(Request $request)
    {
      $controller = new CourseController();
      $student = Student::where('user_id', $request->user()->id)->first();
      return ['title'=>'<h1>Course Registration <small>Control Panel</small><h1>','content'=>view('pages.registercourses', ['courses'=>$controller->getRegisteredCourses($student->id)])->render()];
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
