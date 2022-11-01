<?php

namespace App\Http\Controllers;

use App\Models\sessions;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.pages.dashboard');
    }
    public function requestCount(){
        $pendingStudent = User::where('role','student')->where('active', 0)->count();
        $pendingTeacher = User::where('role','teacher')->where('active', 0)->count();
        $totalStudent = User::where('role','student')->where('active', 1)->count();
        $totalTeacher = User::where('role','teacher')->where('active', 1)->count();
        return view('admin.pages.dashboard', compact('pendingStudent','pendingTeacher','totalStudent','totalTeacher'));
    }
    public function pendingStudent(){
        $pendingStudentList = User::where('role','student')->where('active', 0)->get();
        return view('admin.pages.pendingStudent', compact('pendingStudentList'));
    }
    public function pendingTeacher(){
        $pendingTeacherList = User::where('role','teacher')->where('active', 0)->get();
        return view('admin.pages.pendingTeacher',compact('pendingTeacherList'));
    }
    public function deletePendingStudent($pid){
        $deleted = DB::table('users')->where('id', '=', $pid)->delete();
        return redirect('admin/pending-student');
    }
    public function updatePendingStudent($pid){
        DB::table('users')->where('id', '=', $pid)->where('active',0)->update(['active' => 1]);
        return redirect('admin/pending-student');
    }
    public function deletePendingTeacher($pid){
        $deleted = DB::table('users')->where('id', '=', $pid)->delete();
        return redirect('admin/pending-teacher');
    }
    public function updatePendingTeacher($pid){
        DB::table('users')->where('id', '=', $pid)->where('active',0)->update(['active' => 1]);
        return redirect('admin/pending-teacher');
    }
    public function totalStudent(){
        $totalStudentList = User::where('role','student')->where('active', 1)->get();
        return view('admin.pages.totalStudent', compact('totalStudentList'));
    }
    public function totalTeacher(){
        $totalTeacherList = User::where('role','teacher')->where('active', 1)->get();
        return view('admin.pages.totalTeacher', compact('totalTeacherList'));
    }
    public function createCourse(){
        return view('admin.pages.createCourse');
    }
    public function allCourse(){
        return view('admin.pages.allCourse');
    }
    public function createSection(){
        return view('admin.pages.createSection');
    }
    public function allSection(){
        return view('admin.pages.allSection');
    }
    public function createSemester(){
        return view('admin.pages.createSemester');
    }
    public function allSemester(){
        return view('admin.pages.allSemester');
    }
    public function createSession(){
        return view('admin.pages.createSession');
    }
    public function allSession(){
        return view('admin.pages.allSession');
    }
    public function storeSession(Request $req){
          $session_name= $req->session_name;
          $obj = new
    }
    public function assignedTeacher(){
        return view('admin.pages.assignCourseTeacher');
    }
    public function allAssignedTeacher(){
        return view('admin.pages.allCourseTeacher');
    }
}
