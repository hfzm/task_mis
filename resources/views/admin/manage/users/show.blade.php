@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>User Details</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Name</label>
                    <pre>{{$user->name}}</pre>
                </div>
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <pre>{{$user->email}}</pre>
                </div>
            </div>  
            <div class="row">
                <div class="col-md-6">
                    <label for="roles">Roles</label>
                    @foreach($user->roles as $role)
                        <pre>{{$role->display_name}}</pre>
                    @endforeach
                    <p>
                        {{$user->roles->count() == 0 ? 'This user is not assigned to any roles yet!' : ''}}
                    </p>
                </div>
                <div class="col-md-6">
                    <label for="department">Department</label>
                    @if($user->department != null)
                        <pre>{{$user->department->department}}</pre>
                    @else 
                        <pre>No department attached to this user!</pre>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        
    </script>
@endsection