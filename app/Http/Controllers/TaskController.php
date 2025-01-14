<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;

class TaskController extends Controller
{
    //
    public function display() { 
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    public function add(Request $req) {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:25',
        ]);
    
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        # Create and save task
        Task::create([
            'name' => $req->name
        ]);

        return redirect('/')->with('success', 'Task added successfully!');
    }

    public function delete($id) {
        try {
            Task::findOrFail($id)->delete();
            return redirect('/')->with('delete', 'Task deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect('/')->with('deleteError', 'Task not found!');
        }
    }
}
