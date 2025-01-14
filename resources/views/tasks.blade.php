@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>
            
                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                    @if (session('success'))
                        <div class="alert alert-success">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    <!-- New Task Form -->
                    <form action="/new-task" method="POST" class="form">
                        @csrf            
                        <!-- Task Name -->
                        <div class="form-group row">
                            <label for="task" class="col-sm-2 col-form-label">Task</label>
                            <div class="col-sm-12">
                                <input type="text" name="name" id="task" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>
            
                        <!-- Add Task Button -->
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        @if (session('delete'))
                            <div class="alert alert-success">
                                <strong>{{ session('deleted') }}</strong>
                            </div>
                        @elseif (session('deleteError'))
                            <div class="alert alert-danger">
                                <strong>{{ session('deleteError') }}</strong>
                            </div>
                        @endif
                        <table class="table table-striped task-table">
        
                            <!-- Table Headings -->
                            <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                            </thead>
        
                            <!-- Table Body -->
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>
        
                                        <td>
                                            <form action="/task/{{ $task->id }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                        
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>                                        
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection