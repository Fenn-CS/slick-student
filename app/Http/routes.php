<?php
use App\Role;
use App\Permission;
use App\User;

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

Route::get('/create/roles-permissions', function()
{
    $student = new Role();
    $student->name = 'Student';
    $student->display_name = 'Student';
    $student->save();

    $teacher = new Role();
    $teacher->name = 'Teacher';
    $teacher->display_name = 'Student';
    $teacher->save();

    $accountant = new Role();
    $accountant->name = 'Accountant';
    $accountant->display_name = 'Student';
    $accountant->save();

    $admin = new Role();
    $admin->name = 'Administrator';
    $admin->display_name = 'Administrator';
    $admin->save();

    $master = new Role();
    $master->name = 'Master';
    $master->display_name = 'System Master';
    $master->save();

    $read = new Permission();
    $read->name = 'can_read';
    $read->display_name = 'Can Read Any Info';
    $read->save();

    $edit = new Permission();
    $edit->name = 'can_edit';
    $edit->display_name = 'Can Edit Any Info';
    $edit->save();

    $student->attachPermission($read);
    $accountant->attachPermission($read);
    $teacher->attachPermission($edit);

    $user1 = User::find(3);
    $user2 = User::find(4);

    $user1->attachRole($teacher);
    $user2->attachRole($student);

    return 'All done.';
});



/*
 *Routes to return views
 */
Route::get('/views/addstudent', function(){

	return ['title'=>'<h1>Register New Student <small>Control Panel</small><h1>','content'=>view('pages.addstudent')->render()];
});


Route::get('/views/addcourse', function(){
	return ['title'=>'<h1>Register New Course <small>Control Panel</small><h1>','content'=>view('pages.addcourse')->render()];
});
Route::get('/views/assigncourse', function(){
	return ['title'=>'<h1>Assign Courses <small>Control Panel</small><h1>','content'=>view('pages.assigncourse')->render()];
});

Route::get('/views/addclass', function(){
	return ['title'=>'<h1>Add Class<small>Control Panel</small><h1>','content'=>view('pages.addclass')->render()];
});

Route::get('/views/adddepartment', function(){
	return ['title'=>'<h1>Add Departments <small>Control Panel</small><h1>','content'=>view('pages.adddepartment')->render()];
});
Route::get('/views/registercourses', function(){
	return ['title'=>'<h1>Course Registration <small>Control Panel</small><h1>','content'=>view('pages.registercourses')->render()];
});

Route::get('/views/getstudents', function(){
return ['title'=>'<h1>Student List <small>Control Panel</small><h1>','content'=>view('pages.viewstudents')->render()];
});

Route::get('/views/getcourses', function(){
return ['title'=>'<h1>Course List <small>Control Panel</small><h1>','content'=>view('pages.viewcourses')->render()];
});

Route::get('/views/getdepartments', function(){
	return ['title'=>'<h1>View Departments <small>Control Panel</small><h1>','content'=>view('pages.viewdepartments')->render()];
});
Route::get('/views/getclasses', function(){
	return ['title'=>'<h1>View Classes <small>Control Panel</small><h1>','content'=>view('pages.viewclasses')->render()];
});

