<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
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
        $sessionList= Session::all();
        return view('admin.pages.allSession',compact('sessionList'));
    }
    // public function editSessionName($sid){
    //     $result =  DB::table('sessions')->where('id','=',$sid)->first();
    //     return view('admin.pages.allSession',['sessions'=>$result]);
    // }
    public function updateSessionName(Request $req,$sid){
        // $session_name = $req->session_name;
        Session::where('id','=',$sid)
        ->update([
            'session_name' => $req->session_name
        ]);
        return redirect()->back()->with('success', 'Session Updated');
    }
    public function deleteSessionName($sid){
        $deleted = DB::table('sessions')->where('id', '=', $sid)->delete();
        return redirect('admin/all-session');
    }
    public function storeSession(Request $req){
          $session_name= $req->session_name;
          $obj= new Session();
          $obj->session_name= $session_name;
          if($obj->save()){
            return redirect()->back()->with('success','Session Created');
        }
    }
    public function assignedTeacher(){
        return view('admin.pages.assignCourseTeacher');
    }
    public function allAssignedTeacher(){
        return view('admin.pages.allCourseTeacher');
    }
}
