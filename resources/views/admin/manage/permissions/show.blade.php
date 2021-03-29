@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Permission Details</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('usersCreate') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Permission</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        <strong>{{$permission->display_name}}</strong> <small>{{$permission->name}}</small>
                        <br>
                        {{$permission->description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection