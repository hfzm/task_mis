@extends('user.layouts.user')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">All Notifications List</h3>
                        <a href="{{route('clearNotifications')}}" class="float-right btn btn-secondary btn-sm">Clear Notifications</a>
                    </div>
                    <div class="card-body text-center">
                        @if($notifications->count() > 0)
                            @foreach(Auth::user()->unreadNotifications as $notification)
                                <a href="{{route('markAsRead')}}" class="dropdown-item">Mark all as read</a>
                                <a href="{{route('taskShow', $notification->data['task_info'])}}" class="dropdown-item">
                                    <h5>{{$notification->data['task_status']}} ({{$notification->data['title']}})</h5>
                                    <p>{{$notification->created_at->diffForHumans()}}</p>
                                </a>
                            @endforeach

                            @foreach (Auth::user()->readNotifications as $notification)
                                <a href="{{route('taskShow', $notification->data['task_info'])}}" class="dropdown-item" style="color: lightgray;">
                                    <h5>{{$notification->data['task_status']}} ({{$notification->data['title']}})</h5>
                                    <p>{{$notification->created_at->diffForHumans()}}</p>
                                </a>
                            @endforeach
                        @else
                            <a href="#" class="dropdown-item">No New Notifications</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection