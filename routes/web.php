<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\StudentController;
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
    return redirect('/student');
});
Route::get('/student',[StudentController::class,'index']);

Route::get('student/create',[StudentController::class,'create']);

Route::post('student/create',[StudentController::class,'store']);

Route::get('/student/{id}',[StudentController::class, 'get_student_by_id']);
Route::get('/edit-student/{id}', [StudentController::class, 'edit']);
Route::get('/delete-student/{id}', [StudentController::class, 'delete']);
Route::put('/update-student/{id}', [StudentController::class, 'update']);