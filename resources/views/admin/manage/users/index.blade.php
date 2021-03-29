@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Manage Users</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('usersCreate') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i> Create New User</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-responsive-lg">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a href="{{route('usersShow', $user->id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-info"></i></a>
                                <a href="{{route('usersEdit', $user->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row justify-content-center">
                {!! $users->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection