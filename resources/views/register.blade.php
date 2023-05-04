@extends('main')

@section('content')

<div class="card" id="register">
    <div class="card-header">
        <h3>Register Form</h3>
    </div>
    <div class="card-body">
        <form action="/DRuser" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="form-control-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="username" class="form-control-label">UserName:</label>
                <input type="username" name="username" id="username"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-control-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <div class="text-center">
          <p>I have an account <a href="/login">Login</a></p>
        </div>
    </div>
</div>

@endsection