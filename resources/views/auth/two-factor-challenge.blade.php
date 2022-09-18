@extends('layouts.layout')
@section('content')
<div class="login-box">
    <div class="login-logo">
      <a><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Please confirm access to your account by entering the authentication code provided by your authenticator application.</p>

        <form method="POST" action="{{ route('two-factor.login') }}">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Code" name="code" autofocus x-ref="code" autocomplete="one-time-code">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="flex items-center justify-end mt-4">
                <button type="button" class="btn btn-dark"
                                x-show="! recovery"
                                x-on:click="
                                    recovery = true;
                                    $nextTick(() => { $refs.recovery_code.focus() })
                                ">
                    {{ __('Use a recovery code') }}
                </button>

                <button type="button" class="btn btn-success"
                                x-show="recovery"
                                x-on:click="
                                    recovery = false;
                                    $nextTick(() => { $refs.code.focus() })
                                ">
                    {{ __('Use an authentication code') }}
                </button>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              </div>
        </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection