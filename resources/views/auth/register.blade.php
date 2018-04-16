@extends('layouts.page');

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

                        <button type="submit">
                        Register
                        </button>
                        <a class="button button-outline" href="{{ route('login') }}">Login</a>
                    </fieldset>
                </form>                
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="panel-limit-margin col-md-10 col-md-offset-1">
            <h1 class="panel-title">Register</h1>
            <div class="col-md-6 col-lg-6 col-lg-offset-3">
                <form action="" method="post" id="fileForm" role="form">
                    <fieldset>
                        <legend class="text-center">
                            Fill the Form below to register on this website
                        </legend>

                        <div class="form-group">
                            <label for="username"><span class="req">* </span> Username: </label>
                            <input class="form-control" type="text" name="username" id="username" required />
                        </div>

                        <div class="form-group">
                            <label for="password1"><span class="req">* </span> Password: </label>
                            <input required name="password1" type="password" class="form-control inputpass" id="password1" />
                        </div>

                        <div class="form-group">
                            <label for="password2"><span class="req">* </span> Password Confirm: </label>
                            <input required name="password2" type="password" class="form-control inputpass" id="password2" />
                        </div>

                        <div class="form-group">
                            <label for="fullname"><span class="req">* </span> Full name: </label>
                            <input class="form-control" type="text" name="fullname" id="fullname" required />
                        </div>

                        <div class="form-group">
                            <label for="email"><span class="req">* </span> Email Address: </label>
                            <input class="form-control" required type="text" name="email" id="email" />
                        </div>

                        <div class="form-group">
                            <label for="phonenumber"><span class="req">* </span> Phone Number: </label>
                            <input required type="text" name="phonenumber" id="phonenumber" class="form-control phone" maxlength="28"/>
                        </div>

                        <div class="form-group">
                            <hr>
                            <input type="checkbox" required name="terms" id="terms">  
                            <label for="terms">I agree with the
                                <a href="#" title="You may read our terms and conditions by clicking on this link">terms and conditions</a>
                                for Registration.
                            </label>
                            <span class="req">* </span>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-success" type="submit" name="submit_reg" value="Register">
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection