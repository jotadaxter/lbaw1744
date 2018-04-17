@extends('layouts.page_unregisted');

@section('content')
<div class="container">
    <div class="row">
        <div class="panel-limit-margin col-md-10 col-md-offset-1">
            <h1 class="panel-title">Register</h1>
            <div class="col-md-6 col-lg-6 col-lg-offset-3">
                <form method="POST" action="{{ route('register') }}" id="fileForm" role="form">
                    {{ csrf_field() }}
                    <fieldset>

                        <div class="form-group">    
                            <label for="username"><span class="req">* </span> Username: </label>
                            <input class="form-control" id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>
                            @if ($errors->has('username'))
                            <span class="error">
                                {{ $errors->first('username') }}
                            </span>
                            @endif
                        </div>

                        <div class="form-group">    
                            <label for="fullname"><span class="req">* </span> Full Name: </label>
                            <input class="form-control" id="fullname" type="text" name="fullname" value="{{ old('fullname') }}" required autofocus>
                            @if ($errors->has('fullname'))
                            <span class="error">
                                {{ $errors->first('fullname') }}
                            </span>
                            @endif
                        </div>

                        <div class="form-group">  
                            <label for="email">E-Mail Address</label>
                            <input class="form-control"  id="email" type="email" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                            <span class="error">
                                {{ $errors->first('email') }}
                            </span>
                            @endif
                        </div>

                        <div class="form-group">  
                            <label for="password">Password</label>
                            <input class="form-control" id="password" type="password" name="password" required>
                            @if ($errors->has('password'))
                            <span class="error">
                                {{ $errors->first('password') }}
                            </span>
                            @endif
                        </div>

                        <div class="form-group">  
                            <label for="password-confirm">Confirm Password</label>
                            <input class="form-control" id="password-confirm" type="password" name="password_confirmation" required>
                        </div>

                        <div class="form-group">    
                            <label for="birth_date"><span class="req">* </span> Birth-date: </label>
                            <input class="form-control" id="birth_date" type="text" name="birth_date" value="{{ old('birth_date') }}" required autofocus>
                            @if ($errors->has('birth_date'))
                            <span class="error">
                                {{ $errors->first('birth_date') }}
                            </span>
                            @endif
                        </div>

                        

                        <button class="btn btn-success" type="submit">
                        Register
                        </button>
                        <a class="button button-outline" href="{{ route('login') }}">Login</a>
                    </fieldset>
                </form>                
            </div>
        </div>
    </div>
</div>
@endsection