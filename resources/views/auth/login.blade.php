@extends('layouts.app');

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
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
    <form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>  
    </div>
        @if ($errors->has('email'))
            <span class="error">
            {{ $errors->first('email') }}
            </span>
        @endif

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        <input class="form-control" id="password" type="password" name="password" required>
    </div>
        @if ($errors->has('password'))
            <span class="error">
                {{ $errors->first('password') }}
            </span>
        @endif

    <button class="btn btn-lg btn-primary btn-block" type="submit">
        Login
    </button>
    <a class="btn btn-lg btn-primary btn-block" href="{{ route('register') }}">Register</a>
    </div>
    </div>
</form>
</div>

@endsection