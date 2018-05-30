@extends('layouts.app')

@section('content')
    <div class="myProducts container panel-limit-margin">
        <h3 class="panel-title">My Products</h3>
        <div class="container padded">
            <h2 class="terms_title">My Products</h2>

            <br><p>My Products</p><br>        
           
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

        </div>
    </div>
@endsection

<!--

<button class="btn btn-primary" 

onclick="window.location='{{ url('user/' . $user->username . '/follow') }}'" type="button">
                                            Follow
                                        </button>


                                        -->
