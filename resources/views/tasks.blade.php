@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>New Task</strong>
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
                        <div class="form-group row">
                                <!-- Task Name -->
                            <div class="col-md-4">
                                <label for="task" class="col-form-label">Task Name</label>
                                <input type="text" name="name" id="task" class="form-control" value="{{ old('task') }}">
                            </div>                    
                            <!-- Task Date -->
                            <div class="col-md-4">
                                <label for="date" class="col-form-label">Due Date</label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}">
                            </div>

                            <!-- Task Time -->
                            <div class="col-md-4">
                                <label for="time" class="col-form-label">Due Time</label>
                                <select name="time" id="time" class="form-control">
                                    <option value="AM" {{ old('time') == 'AM' ? 'selected' : '' }}>AM</option>
                                    <option value="PM" {{ old('time') == 'PM' ? 'selected' : '' }}>PM</option>
                                </select>
                            </div>
                        </div>
            
                        <!-- Add Task Button -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Current Tasks</strong>
                </div>

                <div class="panel-body">
                    @if (session('delete'))
                        <div class="alert alert-success">
                            <strong>{{ session('delete') }}</strong>
                        </div>
                    @elseif (session('deleteError'))
                        <div class="alert alert-danger">
                            <strong>{{ session('deleteError') }}</strong>
                        </div>
                    @endif
                    <table class="table table-striped task-table">
    
                        <!-- Table Headings -->
                        <thead>
                            <th>Task Name</th>
                            <th>Date</th>
                            <th>Due Time</th>
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
                                    <!-- Task Date -->
                                    <td class="table-text">
                                        <div>{{ $task->date }}</div>
                                    </td>
                                    
                                    <!-- Task Time -->
                                    <td class="table-text">
                                        <div>{{ $task->time }}</div>
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
        </div>
    </div>
@endsection