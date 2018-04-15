@extends('layouts.page');

@section('content')
<div class="container">
    <div class="row">
        <h3 style="color:white; text-align: center">Sign In Via</h3>
        <!-- Facebook Button -->
        <div class="col-xs-6 col-sm-4 col-md-2 col-md-offset-3 col-lg-2 col-lg-offset-3">
            <button id="facebook_button" class="btn btn-lg btn-block generic_login_button">
                <i class="fa fa-facebook"></i> Facebook
            </button>
        </div>
        <!-- Google Button -->
        <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
            <button id="google_button" class="btn btn-lg btn-block generic_login_button">
                <i class="fa fa-google"></i> Google
            </button>
        </div>
        <!-- Twitter Button -->
        <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
            <button id="twitter_button" class="btn btn-lg btn-block generic_login_button">
                <i class="fa fa-twitter"></i> Twitter
            </button>
        </div>
        <!-- Steam Button -->
        <div class="col-xs-6 col-sm-4 col-md-2 col-md-offset-3 col-lg-2 col-lg-offset-3">
            <button id="steam_button" class="btn btn-lg btn-block generic_login_button">
                <i class="fa fa-steam"></i> Steam
            </button>
        </div>
        <!-- LinkedIn Button -->
        <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
            <button id="linkedin_button" class="btn btn-lg btn-block generic_login_button">
                <i class="fa fa-linkedin"></i> LinkedIn
            </button>
        </div>
        <!-- GitHub Button -->
        <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
            <button id="github_button" class="btn btn-lg btn-block generic_login_button">
                <i class="fa fa-github"></i> GitHub
            </button>
        </div>
    </div>
    <h3 style="color:white; text-align: center">or</h3>

    <!-- Credentials Form -->
    <form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <label for="email">E-mail</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
    @if ($errors->has('email'))
        <span class="error">
          {{ $errors->first('email') }}
        </span>
    @endif
    
    <label for="password" >Password</label>
    <input id="password" type="password" name="password" required>
    @if ($errors->has('password'))
        <span class="error">
            {{ $errors->first('password') }}
        </span>
    @endif

    <label>
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
    </label>

    <button type="submit">
        Login
    </button>
    <a class="button button-outline" href="{{ route('register') }}">Register</a>
</form>
    
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
            <form action="{{ route('login') }}" autocomplete="off" method="POST">
            {{ csrf_field() }}
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="username" placeholder="email address">
                </div>
                <span class="help-block"></span>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input  type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <span class="help-block"></span>
                <button id="login_btn" type="button" class="btn btn-lg btn-primary btn-block" >Sign in</button>

            </form>
        </div>
    </div>
</div>

@endsection