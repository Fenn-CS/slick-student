<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
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
        $controller = new StudentController;

return ['title'=>'<h1>Student List <small>Control Panel</small><h1>','content'=>view('pages.viewstudents',['students'=>$controller->getStudents()])->render()];

    }

    public function getCoursesView()
    {
return ['title'=>'<h1>Course List <small>Control Panel</small><h1>','content'=>view('pages.viewcourses')->render()];
    }
    public function getDepartmentsView()
    {
return ['title'=>'<h1>View Departments <small>Control Panel</small><h1>','content'=>view('pages.viewdepartments')->render()];
    }
    public function getClassesView()
    {
return ['title'=>'<h1>View Classes <small>Control Panel</small><h1>','content'=>view('pages.viewclasses')->render()];
    }
    public function getTeachersView()
    {
return ['title'=>'<h1>View Teachers <small>Control Panel</small><h1>','content'=>view('pages.viewteachers')->render()];       

    }
    public function getScoresView()
    {
return ['title'=>'<h1>Scores <small>Control Panel</small><h1>','content'=>view('pages.viewscores')->render()];       

    }
    public function test(){
       
    }
}
