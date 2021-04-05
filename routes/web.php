<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;


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