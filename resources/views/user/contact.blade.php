@extends('user.components.modal')
@section('mButton')
    Contact Us
@endsection

@section('mTitle')
    Contact Us
@endsection

@section('mBody')
    
    <form action="{{ route('submitContact') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" required>{{ old('name') }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </div>
        </div>
    </form>

@endsection