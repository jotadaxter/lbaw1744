@extends('layouts.app')

@section('content')
    <div class="about container panel-limit-margin">
        <h3 class="panel-title">Reset Password</h3>
        <div class="container padded">
            <h2 class="terms_title">Reset Password</h2>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-6 col-lg-6 col-lg-offset-3">
                        <form method="POST" action="{{ route('passwordReset') }}" id="pwResetForm" role="form">
                            {{ csrf_field() }}
                            <fieldset>

                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input class="form-control"  id="email" type="email" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span><img src="/error_sign.png" alt="error_icon" width="10px" height="10px"></span>
                                        <span class="error">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>

                                <button class="btn btn-success" type="submit">
                                    Send Email
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

