@extends('layouts.app');

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
                            <label for="email"><span class="req">* </span>E-Mail Address</label>
                            <input class="form-control"  id="email" type="email" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                            <span class="error">
                                {{ $errors->first('email') }}
                            </span>
                            @endif
                        </div>

                        <div class="form-group">  
                            <label for="password"><span class="req">* </span>Password</label>
                            <input class="form-control" id="password" type="password" name="password" required>
                            @if ($errors->has('password'))
                            <span class="error">
                                {{ $errors->first('password') }}
                            </span>
                            @endif
                        </div>

                        <div class="form-group">  
                            <label for="password-confirm"><span class="req">* </span>Confirm Password</label>
                            <input class="form-control" id="password-confirm" type="password" name="password_confirmation" required>
                        </div>

                        <div class="form-group">    
                            <label for="birth_date"><span class="req">* </span> Birthday: </label>
                            <input class="form-control" id="birth_date" type="date" name="birth_date" value="{{ old('birth_date') }}" required data-date-format="yyyy/mm/dd" autofocus>
                            @if ($errors->has('birth_date'))
                            <span class="error">
                                {{ $errors->first('birth_date') }}
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone_number"> Phone Number: </label>
                            <input type="tel" name="phone_number" id="phone_number" class="form-control phone"/>
                            @if ($errors->has('phone_number'))
                                <span class="error">
                                {{ $errors->first('phone_number') }}
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="nif">NIF: </label>
                            <input type="number" name="nif" id="nif" class="form-control phone" size="9"/>
                            @if ($errors->has('nif'))
                                <span class="error">
                                {{ $errors->first('nif') }}
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