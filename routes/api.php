<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ParntController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\TeacherController;
//use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/student')->group(function(){
    Route::post('insert',[StudentController::class,'addstudent']);
    Route::get('/',[StudentController::class,'getallstudent']);
    Route::get('show',[StudentController::class,'showstudent']);
    Route::delete('delete',[StudentController::class,'destroy']);
    Route::put('update',[StudentController::class,'update']);
    Route::get('search',[StudentController::class,'search']);
});

Route::prefix('/city')->group(function(){
    Route::post('insert',[CityController::class,'addcity']);
    Route::get('/',[CityController::class,'getallcity']);
    Route::get('show',[CityController::class,'showcity']);
    Route::put('update',[CityController::class,'update']);
    Route::delete('delete',[CityController::class,'destroy']);

});

Route::prefix('/area')->group(function(){
    Route::post('insert',[AreaController::class,'addarea']);
    Route::get('/',[AreaController::class,'gatallarea']);
    Route::get('show',[AreaController::class,'showarea']);
    Route::put('update',[AreaController::class,'update']);
    Route::delete('delete',[AreaController::class,'destroy']);

});

Route::prefix('/teacher')->group(function(){
    Route::post('insert',[TeacherController::class,'addteacher']);
    Route::get('/',[TeacherController::class,'getallteacher']);
    Route::get('show',[TeacherController::class,'showteacher']);
    Route::put('update',[TeacherController::class,'update']);
    Route::delete('delete',[TeacherController::class,'destroy']);
    Route::get('search',[TeacherController::class,'search']);

});

Route::prefix('/supervisor')->group(function(){
    Route::post('insert',[SupervisorController::class,'addsupervisor']);
    Route::get('/',[SupervisorController::class,'getallsupervisor']);
    Route::get('show',[SupervisorController::class,'showsupervisor']);
    Route::put('update',[SupervisorController::class,'update']);
    Route::delete('delete',[SupervisorController::class,'destroy']);
    Route::get('search',[SupervisorController::class,'search']);

});

Route::prefix('/parent')->group(function(){
    Route::post('insert',[ParntController::class,'addparnt']);
    Route::get('/',[ParntController::class,'getallparnt']);
    Route::get('show',[ParntController::class,'showparnt']);
    Route::put('update',[ParntController::class,'update']);
    Route::delete('delete',[ParntController::class,'destroy']);

});

Route::prefix('/address')->group(function(){
    Route::post('insert',[AddressController::class,'create']);
    Route::get('/',[AddressController::class,'gatalladdress']);
    Route::get('show',[AddressController::class,'showaddress']);
    Route::put('update',[AddressController::class,'update']);
    Route::delete('delete',[AddressController::class,'destroy']);

});
