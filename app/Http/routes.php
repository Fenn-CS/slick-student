<?php
use App\User;
use App\Program;
use App\Course;
use App\ProgramClass;

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
	if(Auth::check()) {
		return redirect('/dashboard');
	}
    return view('welcome');
});

Route::post('/login', 'Auth\LoginController@authenticate');

Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'DashboardController@dashboard');
Route::get('/create/roles-permissions','AdminController@createDefaultRolesAndPermissions');
Route::get('/test', 'DashboardController@test');



/*
 *Routes to return views
 */
// Route::get('/views/addstudent', function(){
    
// });
Route::get('/views/addstudent', 'StudentController@addStudentForm');


Route::get('/views/addcourse', function(){
	$programs = Program::all();
    return ['title'=>'<h1>Register New Course <small>Control Panel</small><h1>','content'=>view('pages.addcourse',['programs'=>$programs])->render()];
});
Route::get('/views/assigncourse', function(){
	$teachers = User::where('personality','Teacher')->get();
	$courses  = Course::all();
	$classes  = ProgramClass::all();
	return ['title'=>'<h1>Assign Courses <small>Control Panel</small><h1>','content'=>view('pages.assigncourse',['teachers'=>$teachers,'courses'=>$courses, 'classes'=>$classes])->render()];
});

Route::get('/views/addclass', function(){
	    $programs = Program::all();
	return ['title'=>'<h1>Add Class<small>Control Panel</small><h1>','content'=>view('pages.addclass',['programs'=>$programs])->render()];
});

// Route::get('/views/addscoresprompt', function(){
// 	$courses  = Course::all();
// 	$classes  = ProgramClass::all();
// 	return ['title'=>'<h1>Add Scores Prompt<small>Control Panel</small><h1>','content'=>view('pages.scoresprompt',['id'=>'form-addscores','courses'=>$courses,'classes'=>$classes])->render()];
// });
// Route::get('/views/viewscoresprompt', function(){
// 	return ['title'=>'<h1>View Scores Prompt<small>Control Panel</small><h1>','content'=>view('pages.scoresprompt',['id'=>'form-viewscores'])->render()];
// });


Route::get('/views/adddepartment', function(){
	return ['title'=>'<h1>Add Departments <small>Control Panel</small><h1>','content'=>view('pages.adddepartment')->render()];
});
Route::get('/views/addteacher', function(){
	return ['title'=>'<h1>Add Teacher <small>Control Panel</small><h1>','content'=>view('pages.addteacher')->render()];
});

Route::get('/views/registercourses', 'DashboardController@getRegisterCoursesView');
Route::get('/views/getstudents', 'DashboardController@getStudentsView');
Route::get('/views/getcourses', 'DashboardController@getCoursesView');
Route::get('/views/getdepartments', 'DashboardController@getDepartmentsView');
Route::get('/views/getclasses', 'DashboardController@getClassesView');
Route::get('/views/getteachers', 'DashboardController@getTeachersView');
Route::get('/views/getteacherassigns', 'DashboardController@getTeacherAssignments');
Route::get('/views/userinfo', 'DashboardController@getUserInfoView'); 
Route::get('/views/academicyears', 'DashboardController@academicYearControls');
Route::get('/views/fees/operations', 'DashboardController@feeControls');
Route::get('/views/fees/pay', 'DashboardController@payFee');
Route::get('/views/restrictions/results', 'DashboardController@resultRestrictions');
// Route::get('/views/getscores', 'DashboardController@getScoresView'); 
/**** POST REQUEST THAT RETURN FORM VIEWS ****/
/*Scores*/
//GET
Route::get('/views/addscoresprompt', 'ScoreController@showAddScoresPromptForm');
Route::get('/views/viewscoresprompt', 'ScoreController@showViewScoresPromptForm');
Route::get('/views/viewresultsprompt', 'ResultController@showViewResultsPromptForm');
//POST
Route::post('/views/scores/prompt/input', 'ScoreController@requestScoreRegistration');
Route::post('/views/getscores', 'DashboardController@getScoresView');
Route::post('/scores/addscore', 'ScoreController@addScore');
Route::post('/scores/import', 'ScoreController@importScores');

//GENERAL 4 ALL USERS
Route::post('/password/update', 'UserController@updatePassword');



//Post Routes
/*Students*/
Route::post('/students/register', 'StudentController@addNewStudent');
/*Courses*/
Route::post('/courses/add', 'CourseController@addNewCourse');
//Get courses available for registration.
Route::post('/courses/registration/get', 'CourseController@getAvailableCourses');
//Save registered courses
Route::post('/courses/registration/save', 'CourseController@saveRegisteredCourses');
//Delete a registered course
Route::post('/courses/registration/drop', 'RegisteredCourseController@dropRegisteredCourse');
/*CourseAssignments*/
Route::post('courses/assignments/add', 'CourseAssignmentController@addNewCourseAssignment');
/*Departments*/
Route::post('/departments/add', 'DepartmentController@addNewDepartment');
/*Teachers*/
Route::post('/teachers/add', 'TeacherController@addNewTeacher');
/*Classes*/
Route::post('/classes/add', 'ProgramClassController@addNewClass');
/*AcademicYears*/
Route::post('/years/add', 'AcademicYearController@addNewAcademicYear');
Route::post('/years/year/activate', 'AcademicYearController@activateAcademicYear');
/*Fees */
Route::post('/fees/add', 'FeeController@addNewFee');
/*Results */
Route::post('/results/add', 'ResultController@addNewResult');
Route::post('/results/result/activate', 'ResultController@activateResultPublication');
Route::post('/results/getresults', 'ResultController@showResults');









