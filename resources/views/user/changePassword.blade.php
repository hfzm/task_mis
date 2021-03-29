@extends('user.layouts.user')
@section('content')
    <h5 class="text-center">Change Your Password</h5>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('updatePassword') }}">
                @csrf

                <div class="form-group row">
                    <label for="old_password" class="col-md-4 col-form-label text-md-right">Old Password</label>
        
                    <div class="col-md-6">
                        <input id="old_password" type="password" class="form-control" name="old_password" value="{{ old('old_password') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
        
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="confirm_password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
        
                    <div class="col-md-6">
                        <input id="confirm_password" type="password" class="form-control" name="confirm_password" value="{{ old('confirm_password') }}" required>
                    </div>
                </div>
                <br>
                <div class="form-group row justify-content-center">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection