@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Manage Roles</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('rolesCreate') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Role</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-responsive-lg">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                <a href="{{route('rolesShow', $role->id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-info"></i></a>
                                <a href="{{route('rolesEdit', $role->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="row justify-content-center">
                {!! $roles->links('pagination::bootstrap-4') !!}
            </div> --}}
        </div>
    </div>
@endsection