<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @if(Auth::check())
                    <a class="navbar-brand" href="{{ route('userDashboard') }}">
                        Task Tracking System
                    </a>
                @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Task Tracking System
                    </a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="{{route('taskCreate')}}" class="nav-link">Create Task</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('taskIndex')}}" class="nav-link">Tasks</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('taskCompleted')}}" class="nav-link">Completed</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{route('taskInbox')}}" class="nav-link">Inbox</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('taskAccomplished')}}" class="nav-link">Accomplished</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('changePassword') }}"><i class="fa fa-lock"></i> Change Password</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                        {{-- task notifications dropdown menu | start --}}

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-bell" id="notify_icon"></i>
                                @if(Auth::user()->unreadNotifications->count() > 0)
                                    <span id="notify_num">{{Auth::user()->unreadNotifications->count()}}</span>
                                @endif
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->unreadNotifications->count() > 0)
                                    @foreach (Auth::user()->unreadNotifications as $notification)
                                        <a href="{{route('markAsRead')}}" class="dropdown-item">Mark all as read</a>
                                        <a href="{{route('taskShow', $notification->data['task_info'])}}" class="dropdown-item">
                                            <h5>{{$notification->data['task_status']}} ({{$notification->data['title']}})</h5>
                                            <p>{{$notification->created_at->diffForHumans()}}</p>
                                        </a>
                                    @endforeach
                                @else
                                    <a href="#" class="dropdown-item">No New Notifications</a>
                                @endif
                                <a href="{{route('notifications')}}" class="dropdown-item">View all notifications</a>
                            </div>
                        </li>

                        {{-- task notifications dropdown menu | end --}}
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach

                @if(Session::has('success'))
                    <p class="alert alert-success">{{Session::get('success')}}</p>
                @endif
                @yield('content')
            </div>
        </main>
    </div>

    
    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
