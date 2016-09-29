<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ScoreController extends Controller
{
    //
    public function requestScoreRegistration()
    {
      return ['title'=>'<h1>Course Score List<small>Control Panel</small><h1>','content'=>view('pages.addscores')->render()];
    }

    public function addScore()
    {

    }
}
