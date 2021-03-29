@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Edit User</h3>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('usersUpdate', $user->id) }}" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="department_id">Department</label>
                            <select name="department_id" class="form-control">
                                <option value="0" selected disabled>Select Department</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}" @if($user->department_id == $department->id) selected @endif>{{$department->department}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="Manually add password!" v-if="password_options == 'manual'">
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="password_options" value="keep" v-model="password_options">Do Not Change Password
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="password_options" value="auto" v-model="password_options">Auto-Generate New Password
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="password_options" value="manual" v-model="password_options">Manually Set New Password
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="roles">Roles:</label>
                        <input type="hidden" name="roles" :value="rolesSelected">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    @foreach($roles as $role)
                                        <p>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="rolesSelected" v-model="rolesSelected" value="{{ $role->id }}"><em>({{ $role->display_name }})</em>
                                            </label>
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <button class="btn btn-success">Save Changes</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const app = new Vue({
            el: '#app',
            data: {
                password_options: 'keep',
                rolesSelected: {!! $user->roles->pluck('id') !!}
            }
        });
    </script>
@endsection