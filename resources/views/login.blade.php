@extends('main');

@section('content')
  
<div class="card">
    <div class="card-header">
        <h3>Login Form</h3>
    </div>
    <div class="card-body">
        @if (session('message_Sre'))
          <div class="alert alert-success"> {{ session('message_Sre') }} </div>
        @endif
        <form action="/checkOfdUSER" method="POST">
            @csrf
            <div class="form-group">
                <label for="username" class="form-control-label">UserName:</label>
                <input type="username" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-control-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="text-center">
            <p>Don't have an account? <a href="/register">Register</a></p>
        </div>
    </div>
</div>

@endsection