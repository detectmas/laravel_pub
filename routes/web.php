<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;

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
Route::get('/', function () { #Probably more appropriate to use a controller
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('tasks', [
        'tasks' => $tasks
    ]);
});

# Add a task
Route::post('/new-task', function (Request $req) {
    $validator = Validator::make($req->all(), [
        'name' => 'required|max:255',
    ]);
 
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    # Create and save task
    $task = new Task;
    $task->name = $req->name;
    $task->save();
    return redirect('/');
});

# Delete an existing task
Route::delete('/task/{id}', function ($id) {
    //
});