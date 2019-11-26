@extends('layouts/signin')

@section('content')


  <div class="login-box">
      <div class="logo">
        <div class="item">


              <div class="col-sm-12">

                <a href="javascript:void(0);">Point of Sale</a>
                <small>by Melgisaputra</small>

              </div>

        </div>
  <small>&nbsp;</small>
          <small>&nbsp;</small>
      </div>
      <div class="card">
          <div class="body">
              <form id="sign_in" method="POST">
                  <div class="msg">Sign in to start your session</div>
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                      {{ csrf_field() }}




                  <div class="input-group form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                      <span class="input-group-addon">
                          <i class="material-icons">person</i>
                      </span>
                      <div class="form-line">
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                      </div>
                  </div>


                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="material-icons">lock</i>
                      </span>
                      <div class="form-line">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-xs-8 p-t-5">
                          <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                          <label for="rememberme">Remember Me</label>
                      </div>
                      <div class="col-xs-4">
                          <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                      </div>
                  </div>
                  <div class="row m-t-15 m-b--20">
                      <div class="col-xs-6">
                          <a href="">Register Now!</a>
                      </div>
                      <div class="col-xs-6 align-right">
                          <a href="">Forgot Password?</a>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
@endsection
