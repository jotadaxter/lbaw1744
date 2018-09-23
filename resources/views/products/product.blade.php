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
                                <img src="/uploads/product_images/{{$product->logo_path}}" alt="product_image" style="width:210px;height: 210px;" class="img-rounded" alt="Cinque Terre" width="400" height="400">
                            </div>
                        </div>
                        <br>

                        <!-- Product Gallery -->

                        <!-- Slideshow -->
                        <section class="jk-slider">
                            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                                <!-- Slide Indicator -->
                                <ol class="carousel-indicators">
                                    <?php $it=0; ?>
                                    @if($images!=null)
                                            @if(sizeof($images)>1)
                                                @foreach($images as $image)
                                                    <li data-target="#carousel-example" data-slide-to="{{$it}}" class="active"></li>
                                                    <?php $it++; ?>
                                                @endforeach
                                            @endif
                                        @endif
                                </ol>
                                <!-- images -->
                                <div class="carousel-inner slideshow ">
                                    @if($images!=null)
                                        <?php $it=0; ?>
                                        @foreach($images as $image)
                                                @if($it==0)
                                                    <div class="item active">
                                                        <div class="overlay"></div>

                                                        <a href="#"><img class="slide_image" alt="img{{$it}}" src="/uploads/product_images/{{$image->img_path}}" /></a>

                                                    </div>
                                                @else
                                                    <div class="item">
                                                        <a href="#"><img class="slide_image" alt="img{{$it}}" src="/uploads/product_images/{{$image->img_path}}" /></a>
                                                    </div>
                                                @endif

                                                <?php $it++; ?>
                                            @endforeach

                                    @endif

                                </div>
                            @if($images!=null)
                                @if(sizeof($images)>1)
                                    <!-- Switch Image buttons -->
                                        <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </section>


                        <br>
                        <div class="row">
                            <!-- Discount -->
                            <div class="col-md-5">
                                <button type="button">555€ - 20% = 400€</button>
                            </div>

                            <!-- Add to Cart function -->
                            <div class="col-md-4">
                                <a href="{{route('addProductToCart', ['' => $product])}}">Add to Cart</a>
                            </div>

                             <!-- Add to Wishlist function -->
                             <div class="col-md-3">
                                <a href="{{route('addProductToWishlist', ['' => $product])}}">Add to Wishlist</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <br><br><br>
                        <br>
                        <br>
                        <div class="indent-box">
                            <div class="title-descriptor"><b>Developer: </b>{{$product->developer}}</div><br>
                            <div class="product-desc"><b>Publisher: </b>{{$product->publisher}}</div><br>
                            <div class="product-desc"><b>Release Date: </b>{{$product->release_date}}</div><br>

                            <!-- Rating -->
                            <div class="product-desc"><b>Rating:</b>
                                <?php $i=$avg_rating; ?>
                                @if($avg_rating>-1)
                                    @while($i>0)
                                        <img src="/star_full.png" alt="star" style="width:20px;" width="1969">
                                        <?php $i--; ?>
                                    @endwhile

                                @else
                                    No rating yet

                                @endif
                            </div><br>

                            <!-- Operating System -->
                            <div class="product-desc">
                                <b>Systems:</b>
                                @if((strpos($product->operating_system, 'w') !== false))
                                    <img src="/os_images/windows_logo.png" alt="windows_logo.png" style="width:20px;" width="420">
                                @endif
                                @if((strpos($product->operating_system, 'm') !== false))
                                    <img src="/os_images/ios_logo.png" alt="ios_logo.png" style="width:20px;" width="420">
                                @endif
                                @if((strpos($product->operating_system, 'l') !== false))
                                    <img src="/os_images/linux_logo.png" alt="linux_logo.png" style="width:20px;" width="420">
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
                        @if(isset($tags))
                            @foreach($tags as $tag)
                                <div class="tag">{{$tag->tag_name}}</div>
                            @endforeach
                        @endif

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
                        @if(isset($reviews))
                            @foreach($reviews as $review)
                                <ul class="nav nav-tabs nav_tabs">
                                    <li class="active"><a href="#" data-toggle="tab">Reviews</a>
                                        <div class="white-box scrollbar-window2">
                                            <br>
                                            <div class="col-md-1">
                                                <img src="/uploads/profile_images/{{$review->img}}"
                                                     alt="{{$review->username}}" style="width:20px;" width="256">
                                            </div>
                                            <div class="col-md-4">{{$review->username}}</div>
                                            <div class="row">
                                                <!-- Rating -->
                                                <div class="product-desc"><b>Rating:</b>
                                                    <?php $i=$review->rating; ?>
                                                    @while($i>0)
                                                        <img src="/star_full.png" alt="star" style="width:10px;" width="1969">
                                                        <?php $i--; ?>
                                                    @endwhile
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                            </div>
                                            <br>
                                            <div class="col-md-12">
                                                <p>
                                                   {{$review->comment}}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            @endforeach
                        @endif
                    </div>

                    <div class="col-md-8">
                        <ul class="nav nav-tabs nav_tabs">
                            <li class="active"><a href="#" data-toggle="tab">Other Products</a>
                            </li>
                        </ul>
                        <div class="col-md-4">
                            <img src="/product.png" class="img-rounded" alt="product" style="width:170px;height: 170px;" width="400" height="400">
                        </div>
                        <div class="col-md-4">
                            <img src="/product.png" class="img-rounded" alt="product" style="width:170px;height: 170px;" width="400" height="400">
                        </div>
                        <div class="col-md-4">
                            <img src="/product.png" class="img-rounded" alt="product" style="width:170px;height: 170px;" width="400" height="400">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
