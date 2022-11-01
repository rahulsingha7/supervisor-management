<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function home(){
        return view('student.pages.home');
     }
     public function about(){
         return view('student.pages.about');
     }
     public function contact(){
         return view('student.pages.contact');
     }
}
