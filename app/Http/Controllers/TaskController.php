<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;

class TaskController extends Controller
{
    //
    function displayTasks() { 
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    function addTask(Request $req) {
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
    }

    function deleteTask($id) {
        Task::findOrFail($id)->delete();
        return redirect('/');
    }
}