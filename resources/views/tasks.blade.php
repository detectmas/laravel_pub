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
            <!-- TODO: Current Tasks -->
        </div>
    </div>
@endsection