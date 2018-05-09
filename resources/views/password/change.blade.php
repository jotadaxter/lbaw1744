@extends('layouts.app')

@section('content')
    <div class="about container panel-limit-margin">
        <h3 class="panel-title">Change Password</h3>
        <div class="container padded">
            <h2 class="terms_title">Change Password</h2>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-6 col-lg-6 col-lg-offset-3">
                        <form method="POST"  action="{{ route('passwordChange') }}" id="pwChangeForm" role="form">
                            {{ csrf_field() }}
                            <fieldset>
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

                                <button class="btn btn-success" type="submit">
                                    Change
                                </button>
                                <a class="button button-outline" href="{{ route('login') }}">Cancel</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection