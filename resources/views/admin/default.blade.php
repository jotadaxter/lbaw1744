@extends('layouts.app')

@section('content')
    @if(Auth::user()->admin)
    <div class="container-fluid main-container">
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 sidebar">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="{{route('admin_users')}}">Users</a></li>
                <li><a href="{{route('admin_products')}}">Products for Sale</a></li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 content">
            <div class="panel panel-default">
                @yield('admin_content')


            </div>
        </div>
    </div>
    @else
        @include('404')
    @endif

@endsection
