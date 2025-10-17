<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TodoPractice2Controller; //追加

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [TaskController::class, 'index']);

Route::resource('tasks', TaskController::class);

Route::resource('todo2', TodoPractice2Controller::class);

//https://note.com/laravelstudy/n/n1b82595e9fdd
/*
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');*/
