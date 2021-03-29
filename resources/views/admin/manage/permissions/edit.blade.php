@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Create New Permission</h3>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('permissionsUpdate', $permission->id)}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="display_name">Name (Display Name)</label>
                            <input type="text" class="form-control" name="display_name" id="display_name" value="{{$permission->display_name}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Slug</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$permission->name}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{$permission->description}}">
                        </div>
                    </div>
                </div>

                <button class="btn btn-success">Save Changes</button>
            </form>
        </div>
    </div>
@endsection