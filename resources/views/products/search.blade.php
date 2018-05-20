@extends('layouts.app')

@section('content')
    <div id="myDIV" class="container">
        <div class="wrapper">
            @include('layouts.tag_sidebar')

            <div class="col-md-10">
                <div class="content">
                    <div class="row" style="margin-top: 10px">
                        <div class="col-xs-12">
                            <table id="grid">
                                <input id="products_json" value="{{$products}}" class="hidden">
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection