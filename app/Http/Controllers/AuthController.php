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
            $obj = new User();
            $obj->name = $req ->name;
            $obj->email = $req->email;
            $obj->student_id = $req->student_id;
            $obj->password = md5($req->password);
            $obj->role = $req->role;

            if($obj->save()){
                return response()->json([
                    'status' => 'success',
                    'message' => 'account created'
                ]);
            }
               else{
            return response()->json([
                'status' => $obj,
                'message' => 'User not created'
            ]);
        }
        }
    public function registerStoreTeacher(Request $req){
            $obj = new User();
            $obj->name = $req->name;
            $obj->email = $req->email;
            $obj->teacher_id = $req->teacher_id;
            $obj->password = md5($req->password);
            $obj->role = $req->role;

            if($obj->save()){
                return response()->json([
                    'status' => 'success',
                    'message' => 'account created'
                ]);
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
