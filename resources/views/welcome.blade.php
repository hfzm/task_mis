@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2>Welcome to the Task Tracking System</h2>
            <p>Task Management Syste is a MIS which can be used to organize and manage all the tasks in an organization very easilty. For using this system login first or if you don't have an account so request the authorities using below phone number or email to create an account.</p>
            <strong>00930000000</strong><br>
            <strong>email@app.com</strong>
            <br>
            <br>
            @include('user.contact')
        </div>
    </div>
@endsection