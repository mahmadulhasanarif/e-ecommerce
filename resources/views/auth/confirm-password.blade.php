@extends('layouts.layout')
@section('content')
<div class="login-box">
    <div class="login-logo">
      <a><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">This is a secure area of the application. Please confirm your password before continuing.</p>
  
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Confirm Password" type="password" name="password" required autocomplete="current-password" autofocus >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block"> Password Confirm</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
@endsection