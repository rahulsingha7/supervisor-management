<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupervisorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home',[StudentController::class,'home']);
Route::get('about',[StudentController::class,'about']);
Route::get('contact',[StudentController::class,'contact']);
Route::get('teacher/home',[SupervisorController::class,'supervisorHome']);

//login and register
Route::get('login',[AuthController::class,'login']);
Route::get('register',[AuthController::class,'register']);

Route::post('store-login',[AuthController::class,'storeLogin']);

//middleware
Route::middleware(['CheckLogin'])->group(function () {
    //admin
    Route::get('dashboard',[AdminController::class,'dashboard']);
    Route::get('dashboard',[AdminController::class,'requestCount']);
    Route::get('admin/pending-student',[AdminController::class,'pendingStudent']);     
    Route::get('admin/pending-teacher',[AdminController::class,'pendingTeacher']);
    Route::get('delete-pendingStudent/{pid}',[AdminController::class,'deletePendingStudent']);
    Route::get('update-pendingStudent/{pid}',[AdminController::class,'updatePendingStudent']);
    Route::get('delete-pendingTeacher/{pid}',[AdminController::class,'deletePendingTeacher']);
    Route::get('update-pendingTeacher/{pid}',[AdminController::class,'updatePendingTeacher']);
    Route::get('admin/total-student',[AdminController::class,'totalStudent']);     
    Route::get('admin/total-teacher',[AdminController::class,'totalTeacher']);
    //course
    Route::get('admin/create-course',[AdminController::class,'createCourse']);
    Route::get('admin/all-course',[AdminController::class,'allCourse']);
    //section 
    Route::get('admin/create-section',[AdminController::class,'createSection']);
    Route::get('admin/all-section',[AdminController::class,'allSection']);
    //session
    Route::get('admin/create-session',[AdminController::class,'createSession']);
    Route::post('admin/store-session',[AdminController::class,'storeSession']);
    Route::get('admin/all-session',[AdminController::class,'allSession']);
    // Route::get('admin/edit-sessionName/{sid}',[AdminController::class,'editSessionName']);
    Route::get('admin/update-sessionName/{sid}',[AdminController::class,'updateSessionName']);
    Route::get('admin/delete-sessionName/{sid}',[AdminController::class,'deleteSessionName']);
    //semester
    Route::get('admin/create-semester',[AdminController::class,'createSemester']);
    Route::get('admin/all-semester',[AdminController::class,'allSemester']);
    //assign teacher
    Route::get('admin/assign-teacher',[AdminController::class,'assignTeacher']);
    Route::get('admin/allAssigned-teacher',[AdminController::class,'allAssignedTeacher']);
});
