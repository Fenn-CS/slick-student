<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    //
	public function updatePassword(Request $request)
	{
		$password = $request['password'];
		$problems ='';

		if(strlen($password)<6){
			$problems .= '<ul><li>Your password must be atleast six characters long!</li>';
		} if($problems!=''){
			return ['success'=>false,'message'=>'Password update failed becuase<br><br>'.$problems];
		}

		$user = User::find($request->user()->id);
		$user->password = bcrypt($password);
		$user->save();
		return ['success'=>true,'message'=>'Password updated successfully','reset'=>'#form-viewuserinfo'];
	}
}
