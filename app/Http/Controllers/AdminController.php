<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //
    public function createDefaultRolesAndPermissions()
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

    }
}
