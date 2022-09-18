@extends('layouts.layout')
@section('content')
<div class="login-box">
    <div class="login-logo">
      <a><b>Email Verify</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</p>
        
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-dark btn-block">Resend Verification Email</button>
        </form>

        <div class="row mt-4">
            <div class="col-md-5">
                <a href="{{ route('profile.show') }}" class="btn btn-primary">Edit Profile</a>
            
            </div>

            <div class="col-md-3"></div>
            <div class="col-md-4"><form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf

                <button type="submit" class="btn btn-primary">Logout</button>
            </form></div>
        </div>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection