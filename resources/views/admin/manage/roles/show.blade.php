@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Role Details</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('usersCreate') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Edit Role</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        <h2>{{$role->display_name}}</h2> <strong>{{$role->name}}</strong>
                        <br>
                        {{$role->description}}
                    </p>
                </div>
                <div class="col-md-6">
                    <h2>Permissions:</h2>
                    <ul>
                        @foreach($role->permissions as $permission)
                            <li>{{$permission->display_name}} <em>({{$permission->description}})</em> </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection