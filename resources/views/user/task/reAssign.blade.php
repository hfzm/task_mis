@extends('user.components.modal')
@section('mButton')
    Re Assign To
@endsection

@section('mTitle')
    Re Assign Task
@endsection

@section('mBody')
    
    <form action="{{route('taskReAssign', $task->id)}}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$task->title}}" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <select name="priority" id="priority" class="form-control" readonly>
                        <option value="" disabled selected>Select Priority</option>
                        <option value="1" @if($task->priority == '1') selected @endif>1st</option>
                        <option value="2" @if($task->priority == '2') selected @endif>2nd</option>
                        <option value="3" @if($task->priority == '3') selected @endif>3rd</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" class="form-control" value="{{$task->start_date}}" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" class="form-control" value="{{$task->end_date}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" rows="5">{{$task->description}}</textarea>
                </div>
            </div>
        </div>

        @if(Auth::user()->hasRole(['director']))
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="users">Assign To</label>
                        <select class="form-control users" name="director_users[]" multiple="multiselect" v-model="selectedUsers" style="width: 100%;">
                            @foreach($director_users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        @endif

        @if(Auth::user()->hasRole(['manager']))
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="users">Assign To</label>
                        <select class="form-control users" name="manager_users[]" multiple="multiselect" v-model="selectedUsers" style="width: 100%;">
                            @foreach($manager_users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        @endif
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection