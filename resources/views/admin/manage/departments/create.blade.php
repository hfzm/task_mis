@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Create New Departments</h3>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('departmentsStore')}}" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="department">Department</label>
                            <input type="text" class="form-control" name="department">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="organized_by">Organized By</label>
                            <input type="text" class="form-control" name="organized_by">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Create Department</button>
            </form>
        </div>
    </div>
@endsection