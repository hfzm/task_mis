@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Manage Departments</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('departmentsCreate') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i> Create New Department</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-responsive-lg">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Department</th>
                        <th>Organized By</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $department->department }}</td>
                            <td>{{ $department->organized_by }}</td>
                            <td>{{ $department->created_at }}</td>
                            <td>
                                <a href="{{route('departmentsShow', $department->id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-info"></i></a>
                                <a href="{{route('departmentsEdit', $department->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row justify-content-center">
                {!! $departments->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection