@extends('layouts.app')


@if(Auth::check())
@section('content')
    <div class="myProducts container panel-limit-margin">
        <h3 class="panel-title">My Products</h3>
        <div class="container padded">
            <h2 class="terms_title">My Products</h2>     
           
            <div class ="row form-group">
                <div class="col-lg-5">
                    <button class="btn btn-success" onclick="window.location='{{ url('profile/' . $user->user_id . '/products/add') }}'" type="button">Add Product</button>
                    @if ($errors->has('add_product_btn'))
                        <span class="error">
                            {{ $errors->first('add_product_btn') }}
                        </span>
                    @endif
                </div>

            </div>
            <ul class="list-group">
                            @if(isset($products))
                                @foreach($products as $product)
                                    <li class="list-group-item">
                                        <div class="row toggle horizontal-scrollbar-window" id="dropdown-detail-1" data-toggle="detail-1">

                                            <div class="col-sm-4 col-md-2 col-lg-2 col-lg-offset-1">
                                                {{$product->name}}
                                                <br>
                                                <a href="{{route('product', ['product_id' => $product->product_id])}}">
                                                    <img alt="{{$product->name}}" src="/uploads/product_images/{{$product->logo_path}}"
                                                         width="100" class="product_logo">
                                                </a>
                                            </div>
                                            <div class="col-sm-8 col-md-8 col-lg-6">
                                                <table class="white-box table table-user-information">
                                                    <tbody>
                                                    <tr>
                                                        <td>Product Name:</td>
                                                        <td>{{$product->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Release Date:</td>
                                                        <td>{{$product->release_date}}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>O.S.</td>
                                                        <td>{{$product->operating_system}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Price
                                                            <!-- if discount, change this parameter -->
                                                        </td>
                                                        <td>{{$product->price}}<br></td>
                                                    </tr>
                                                    
                                                        
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                    <form method="POST" action="{{ url('profile/' . $user->user_id.'/products/edit/'.$product->product_id) }}" id="fileForm" role="form">
                                                            {{ csrf_field() }}
                                                    <button class="btn btn-success" type="submit">Edit </button>
                                            </div>

                                            <div>
                                                    <form method="POST" action="{{ url('profile/' . $user->user_id.'/products/delete/'.$product->product_id) }}" id="fileForm" role="form">
                                                            {{ csrf_field() }}
                                                    <button class="btn btn-success" type="submit">Remove </button>
                                            </div>

                                        </div>

                                    </li>
                                @endforeach
                            @endif
                        </ul>
        </div>
    </div>
    @else
        @include('404')
    @endif
@endsection

<!--

<button class="btn btn-primary" 

onclick="window.location='{{ url('user/' . $user->username . '/follow') }}'" type="button">
                                            Follow
                                        </button>


                                        -->
