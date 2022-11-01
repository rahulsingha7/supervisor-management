<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function supervisorHome(){
        return view('supervisor.pages.home');
     }
    //  public function about(){
    //      return view('student.pages.about');
    //  }
    //  public function contact(){
    //      return view('student.pages.contact');
    //  }
}
