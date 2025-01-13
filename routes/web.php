<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


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


# Landing page with all tasks
#Probably more appropriate to use a controller like TaskController and move all the logic there
Route::get('/', [TaskController::class,'displayTasks']);

# Add a task
Route::post('/new-task', [TaskController::class,'addTask']);

# Delete an existing task
Route::delete('/task/{id}',[TaskController::class,'deleteTask']);