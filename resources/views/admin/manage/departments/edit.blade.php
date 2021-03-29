@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Edit Department</h3>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('departmentsUpdate', $department->id)}}" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="department">Department</label>
                            <input type="text" class="form-control" name="department" value="{{$department->department}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="organized_by">Organized By</label>
                            <input type="text" class="form-control" name="organized_by" value="{{$department->organized_by}}">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
@endsection