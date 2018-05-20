@extends('admin.default')


@section('admin_content')
    <div class="panel-heading">
        <h3 class="panel-title">Users Lists</h3>
    </div>
    <ul class="list-group">


        @foreach($products as $product)
            <li class="list-group-item">
                <div class="row toggle horizontal-scrollbar-window" id="dropdown-detail-1" data-toggle="detail-1">

                    <div class="col-md-2 col-lg-2 col-lg-offset-1">
                        {{$product->name}}
                        <br>
                        {{$product->logo_path}}
                    </div>
                    <div class="col-md-8 col-lg-6">
                        <table class="white-box table table-user-information">
                            <tbody>
                            <tr>
                                <td>Username:</td>
                                <td>{{$product->name}}</td>
                            </tr>
                            <tr>
                                <td>Release Date:</td>
                                <td>{{$product->release_date}}</td>
                            </tr>
                            <tr>
                                <td>Description:</td>
                                <td>{{$product->description}}</td>
                            </tr>
                            <tr>
                                <td>O.S.</td>
                                <td>{{$product->operating_system}}</td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>{{$product->price}}<br></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>


                </div>

            </li>
        @endforeach


    </ul>
@endsection