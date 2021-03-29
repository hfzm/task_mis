@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Manage Permissions</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('permissionsCreate') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Permission</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-responsive-lg">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $permission->display_name }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->description }}</td>
                            <td>
                                <a href="{{route('permissionsShow', $permission->id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-info"></i></a>
                                <a href="{{route('permissionsEdit', $permission->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row justify-content-center">
                {!! $permissions->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection