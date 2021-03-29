@extends('user.layouts.user')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Task Details</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4>{{$task->title}}</h4>
                            <p><strong>Created By:</strong> {{$created_by->name}}</p>
                            <p>
                                <strong>Task Priority:</strong>
                                @if($task->priority == 1)
                                    Level 1
                                @endif
                                @if($task->priority == 2)
                                    Level 2
                                @endif
                                @if($task->priority == 3)
                                    Level 3
                                @endif
                            </p>
                            <p>
                                <strong>Assigned To:</strong>
                                @foreach ($task->users as $user)
                                    {{ $user->name }}{{$task->users->count() > 1 ? ',' : ''}}
                                @endforeach
                            </p>
                            <p>
                                <strong>Start Date:</strong> {{$task->start_date}}
                            </p>
                            <p>
                                <strong>End Date:</strong> {{$task->end_date}}
                            </p>
                            <p>
                                <strong>Task Progress:</strong> 
                                @if($task->progress != null)
                                    {{$task->progress}}
                                @else
                                    No actions taken yet!
                                @endif
                            </p>
                            @if($performed_by != null)
                                <p>
                                    <strong>Last Performance By:</strong>
                                    {{$performed_by->name}}
                                </p>
                            @endif
                            <p><strong>Download File:</strong> 
                                @if($task->file != null)
                                    <a href="{{asset('public/task/performance/' . $task->file)}}" target="_blank"><i class="fa fa-download"></i></a>
                                @else
                                    No file uploaded yet!
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <p>
                                <strong>Task Description:</strong> {{$task->description}}
                            </p>
                            <p>
                                <strong>Task Results:</strong> 
                                @if($task->result != null)
                                    {{$task->result}}
                                @else
                                    Incomplete
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection