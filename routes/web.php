<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\taskController;

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



Route::middleware(['checkLogin'])->group(function(){

Route::get('logout',[userController::class,'logout']);


# Tasks ...
Route::resource('task', taskController::class);

});


# Register....
Route::get('register',[userController::class,'register']);
Route::post('store',[userController::class,'store']);


# Login ....
Route::get('login',[userController::class,'login']);
Route::post('dologin',[userController::class,'dologin']);

