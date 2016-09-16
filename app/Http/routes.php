<?php
use App\Role;
use App\Permission;
use App\User;
use App\Department;
use App\Program;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'DashboardController@dashboard');
Route::get('/create/roles-permissions','AdminController@createDefaultRolesAndPermissions');
Route::get('/test', 'DashboardController@test');



/*
 *Routes to return views
 */
Route::get('/views/addstudent', function(){
    $programs = Program::all();
	return ['title'=>'<h1>Register New Student <small>Control Panel</small><h1>','content'=>view('pages.addstudent',['programs'=>$programs])->render()];
});


Route::get('/views/addcourse', function(){
	$programs = Program::all();
    return ['title'=>'<h1>Register New Course <small>Control Panel</small><h1>','content'=>view('pages.addcourse',['programs'=>$programs])->render()];
});
Route::get('/views/assigncourse', function(){
	$teachers=User::where('personality','Teacher')->get();
	return ['title'=>'<h1>Assign Courses <small>Control Panel</small><h1>','content'=>view('pages.assigncourse',['teachers'=>$teachers])->render()];
});

Route::get('/views/addclass', function(){
	return ['title'=>'<h1>Add Class<small>Control Panel</small><h1>','content'=>view('pages.addclass')->render()];
});

Route::get('/views/addscoresprompt', function(){
	return ['title'=>'<h1>Add Scores Prompt<small>Control Panel</small><h1>','content'=>view('pages.scoresprompt',['id'=>'form-addscores'])->render()];
});
Route::get('/views/viewscoresprompt', function(){
	return ['title'=>'<h1>View Scores Prompt<small>Control Panel</small><h1>','content'=>view('pages.scoresprompt',['id'=>'form-viewscores'])->render()];
});

//This is supposed to be a post request
Route::get('/views/addscores', function(){
	return ['title'=>'<h1>View Scores Prompt<small>Control Panel</small><h1>','content'=>view('pages.addscores')->render()];
});



Route::get('/views/adddepartment', function(){
	return ['title'=>'<h1>Add Departments <small>Control Panel</small><h1>','content'=>view('pages.adddepartment')->render()];
});
Route::get('/views/addteacher', function(){
	return ['title'=>'<h1>Add Teacher <small>Control Panel</small><h1>','content'=>view('pages.addteacher')->render()];
});
Route::get('/views/registercourses', function(){
	return ['title'=>'<h1>Course Registration <small>Control Panel</small><h1>','content'=>view('pages.registercourses')->render()];
});

Route::get('/views/getstudents', 'DashboardController@getStudentsView');
Route::get('/views/getcourses', 'DashboardController@getCoursesView');
Route::get('/views/getdepartments', 'DashboardController@getDepartmentsView');
Route::get('/views/getclasses', 'DashboardController@getClassesView');
Route::get('/views/getteachers', 'DashboardController@getTeachersView');
Route::get('/views/getscores', 'DashboardController@getScoresView'); //Supposed to be a post




//Post Routes
/*Students*/
Route::post('/students/register', 'StudentController@addNewStudent');
/*Courses*/
Route::post('/courses/add', 'CourseController@addNewCourse');
/*Departments*/
Route::post('/departments/add', 'DepartmentController@addNewDepartment');
/*Teachers*/
Route::post('/teachers/add', 'TeacherController@addNewTeacher');




