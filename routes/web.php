<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\setup\StudentClassController;
use App\Http\Controllers\backend\setup\StudentYearController;
use App\Http\Controllers\backend\setup\StudentGroupController;
use App\Http\Controllers\backend\setup\StudentShiftController;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

//Manage user routes
Route::prefix('users')->group(function(){
Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
Route::get('/add', [UserController::class, 'UserAdd'])->name('user.add');
Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');

});

//Manage profile routes
Route::prefix('profile')->group(function(){
    Route::get('/view', [ProfileController::class, 'ViewProfile'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'EditProfile'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/password/change', [ProfileController::class, 'PasswordChange'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');

});

//Studen Class Management routes
Route::prefix('setup')->group(function(){
    Route::get('/student/class/view', [StudentClassController::class, 'StudentClassView'])->name('student.class.view');
    Route::get('/student/class/addd', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');
    Route::post('/student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('student.class.store');
    Route::get('/student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
    Route::post('/student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('student.class.update');
    Route::get('/student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');

//Student Year Routes
Route::get('/student/year/view', [StudentYearController::class, 'StudentYearView'])
        ->name('student.year.view');

Route::get('/student/year/add', [StudentYearController::class, 'StudentYearAdd'])
        ->name('student.year.add');

Route::post('/student/year/store', [StudentYearController::class, 'StudentYearStore'])
        ->name('student.year.store');

Route::get('/student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])
        ->name('student.year.edit');

Route::post('/student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])
        ->name('student.year.update');

Route::get('/student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])
        ->name('student.year.delete');


//Student Group Routes
Route::get('/student/group/view', [StudentGroupController::class, 'StudentGroupView'])
        ->name('student.group.view');

Route::get('/student/group/add', [StudentGroupController::class, 'StudentGroupAdd'])
        ->name('student.group.add');

Route::post('/student/group/store', [StudentGroupController::class, 'StudentGroupStore'])
        ->name('student.group.store');

Route::get('/student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])
        ->name('student.group.edit');

Route::post('/student/group/update/{id}', [StudentGroupController::class, 'StudentGroupUpdate'])
        ->name('student.group.update');

Route::get('/student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])
        ->name('student.group.delete');


//Student shift Routes
Route::get('/student/shift/view', [StudentShiftController::class, 'StudentShiftView'])
        ->name('student.shift.view');

Route::get('/student/shift/add', [StudentShiftController::class, 'StudentShiftAdd'])
        ->name('student.shift.add');

Route::post('/student/shift/store', [StudentShiftController::class, 'StudentShiftStore'])
        ->name('student.shift.store');

Route::get('/student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])
        ->name('student.shift.edit');

Route::post('/student/shift/update/{id}', [StudentShiftController::class, 'StudentShiftUpdate'])
        ->name('student.shift.update');

Route::get('/student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])
        ->name('student.shift.delete');

});