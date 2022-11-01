<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function registerStore(Request $req){
        $name = $req->name;
        $email = $req->email;
        $sid= $req->sid;
        $password = $req->password;
        $confirm_pass = $req->confirm;

        if($password != $confirm_pass){
            return redirect()->back()->with('err', 'Password Mismatch');
        }
        else{
            $obj = new User();
            $obj->name = $name;
            $obj->email = $email;
            $obj->sid = $sid;
            $obj->password = md5($password);
            $obj->role = 'student';

            if($obj->save()){
                return redirect()->back()->with('success', 'Registration Completed waiting for admin approval.');
            }
        }
    }
    public function registerStoreTeacher(Request $req){
        $name = $req->name;
        $email = $req->email;
        $password = $req->password;
        $confirm_pass = $req->confirm;

        if($password != $confirm_pass){
            return redirect()->back()->with('error', 'Password Mismatch');
        }
        else{
            $obj = new User();
            $obj->name = $name;
            $obj->email = $email;
            $obj->password = md5($password);
            $obj->role = 'teacher';

            if($obj->save()){
                return redirect()->back()->with('success', 'Registration Completed waiting for admin approval.');
            }
        }
    }
    public function storeLogin(Request $req){
        $email = $req ->email;
        $password = $req->password;
        $user = User::where('email','=',$email)
                ->where('password','=', md5($password))
                ->first();
        if($user){
          if($user->active == 0){
             return redirect()->back()->with('info','Account not approved yet');
          }
          else if($user->active == 1 && $user->role == 'admin'){
             $req->session()->put('username',$user->name);
             $req->session()->put('userrole',$user->role);
             return redirect('dashboard');
          }
          else if($user->active == 1 && $user->role == 'student'){
             $req->session()->put('username',$user->name);
             $req->session()->put('userrole',$user->role);
             return redirect('home');
          }
          else if($user->active == 1 && $user->role == 'teacher'){
             $req->session()->put('username',$user->name);
             $req->session()->put('userrole',$user->role);
             return redirect('teacher/home');
          }
       }
       else{
           return redirect()->back()->with('info','Email & Password doesnt match');
       }
    }

}
