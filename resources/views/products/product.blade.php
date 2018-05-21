@extends('layouts.app')

@section('title', $product->name)

@section('content')

    <div id="prodDIV" class="container">

        <div class="container-fluid">
            <div class="row"><div class="product-title page-title"><h1>{{ $product->name }}</h1></div></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="uploads/product_images/{{$product->logo_path}}" style="width:210px;height: 210px;" class="img-rounded" alt="Cinque Terre" width="400" height="400">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <!-- Product Gallery -->
                            <div class="col-md-3">
                                <img src="res/images/dropbox2.png" style="width:70px;height: 70px;" class="img-rounded" alt="Cinque Terre" width="294" height="172">
                            </div>
                            <div class="col-md-3">
                                <img src="res/images/dropbox3.png" style="width:70px;height: 70px;" class="img-rounded" alt="Cinque Terre" width="960" height="691">
                            </div>
                            <div class="col-md-3">
                                <img src="res/images/dropbox4.png" class="img-rounded" alt="Cinque Terre" width="70" height="70">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <!-- Discount -->
                            <div class="col-md-5">
                                <button type="button">555€ - 20% = 400€</button>
                            </div>

                            <!-- Add to cart function -->
                            <div class="col-md-4">
                                <button type="button">Add to Cart!</button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <br><br><br>
                        <br>
                        <br>
                        <div class="indent-box">
                            <div class="title-descriptor"><b>Developer:</b>{{$product->developer}}</div><br>
                            <div class="product-desc"><b>Publisher:</b>{{$product->publisher}}</div><br>
                            <div class="product-desc"><b>Release Date:</b>{{$product->release_date}}</div><br>

                            <!-- Rating -->
                            <div class="product-desc"><b>Rating:</b>
                                <img src="res/images/star_full.png" style="width:20px;" width="1969">
                                <img src="res/images/star_full.png" style="width:20px;" width="1969">
                            </div><br>

                            <!-- Operating System -->
                            <div class="product-desc">
                                <b>Systems:</b>
                                @if((strpos($products->operating_system, 'w') !== false))
                                    <img src="os/images/windows_logo.png" style="width:20px;" width="420">
                                @elseif((strpos($products->operating_system, 'm') !== false))
                                    <img src="os_images/ios_logo.png" style="width:20px;" width="420">
                                @elseif((strpos($products->operating_system, 'l') !== false))
                                    <img src="os_images/linux_logo.png" style="width:20px;" width="420">
                                @endif

                            </div>
                        </div>
                        <br>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <br><br><br>

                        <!-- Product tags -->
                        <div class="product-title"><b>TAGS</b></div><br>
                        <div class="tag">Audio</div>
                        <div class="tag">Aaw</div>
                        <div class="tag">Ableton</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="title-descriptor"><b>Description:</b></div><br>
                            <div class="title-descriptor indent-box">
                                {{$product->description}}
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <!-- Reviews -->
                    <div class="col-md-4">
                        <ul class="nav nav-tabs nav_tabs">

                            <li class="active"><a href="#" data-toggle="tab">Reviews</a>
                                <br>
                                <div class="col-md-1">
                                    <img src="res/images/profile_picture.png" style="width:20px;" width="256">
                                </div>
                                <div class="col-md-4">Janedoe</div>
                                <div class="col-md-4">
                                    <img src="res/images/star_full.png" style="width:10px;" width="1969">
                                    <img src="res/images/star_full.png" style="width:10px;" width="1969">
                                    <img src="res/images/star_full.png" style="width:10px;" width="1969">
                                </div>
                            </li>
                        </ul>
                        <div class="row">
                            <br>
                            <div class="col-md-12"><p>
                                    Vry good<br>
                                    The product, I mean. Issa good product. <br>
                                    Recommend it vry much to frens and family.<br>

                                    Kthnx
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="col-md-4">
                            <img src="res/images/product.png" class="img-rounded" alt="Cinque Terre" style="width:170px;height: 170px;" width="400" height="400">
                        </div>
                        <div class="col-md-4">
                            <img src="res/images/product.png" class="img-rounded" alt="Cinque Terre" style="width:170px;height: 170px;" width="400" height="400">
                        </div>
                        <div class="col-md-4">
                            <img src="res/images/product.png" class="img-rounded" alt="Cinque Terre" style="width:170px;height: 170px;" width="400" height="400">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection