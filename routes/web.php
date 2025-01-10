<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlStructsController;
use App\Http\Controllers\FormsController;

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

// Route::get('/', function () {
//     // return redirect('/about');
//     return view('welcome');
// });

Route::view('/','home'); # Main entry point. welcome view is for the laravel default project page


// Route::get('about', function() {
//     return view('about');
// });
Route::view('/about','about'); # This is the same as above
Route::view('/contact','contact');
Route::get('/laravel-cs',[ControlStructsController::class,'viewLoad']);

Route::post("/userForm", [FormsController::class,'getData']);
Route::view("/login","forms");