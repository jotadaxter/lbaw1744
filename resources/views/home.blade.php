@extends('layouts.app')

@section('content')
    <div id="myDIV" class="container">

        <!-- Slideshow -->
        <section class="jk-slider">
            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                <!-- Slide Indicator -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example" data-slide-to="1"></li>
                    <li data-target="#carousel-example" data-slide-to="2"></li>
                </ol>
                <!-- images -->
                <div class="carousel-inner slideshow">
                    <div class="item active">
                        <div class="overlay"></div>
                        <a href="#"><img src="/landscape.png" /></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="/landscape.png" /></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="/landscape.png" /></a>
                    </div>
                </div>
                <!-- Switch Image buttons -->
                <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </section>

        <!-- Image Gallery -->
        <div class="container gallery" >
            <div class="row">
                <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="gallery-title"></h1>
                </div>

                <div align="center">
                    <button class="btn btn-default filter-button" data-filter="trending">Trending</button>
                    <button class="btn btn-default filter-button" data-filter="promo">Promotions</button>
                </div>
                <br/>

                <!-- Most Trending Products -->
                @if(isset($trending_products))
                    @foreach($trending_products as $tprod)
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter trending">
                            <figure>
                                <a href="{{url('products/'. $tprod->product_id)}}">
                                    <img src="/uploads/product_images/{{$tprod->logo_path}}" class="img-responsive slide_image">
                                </a>
                                <figcaption class="figure-caption text-center product-description">
                                    <div> <b style="font-size: 25px;"> {{$tprod->name}}</b>
                                        <p><s>450€</s><b style="color:red;font-size:25px;">300€</b>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>

                    @endforeach
                @endif


                <!-- Promotion Products -->
                @if(isset($promo_products))
                    @foreach($promo_products as $pprod)
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter promo">
                            <figure>
                                <a href="{{url('products/'. $pprod->product_id)}}">
                                    <img src="/uploads/product_images/{{$pprod->logo_path}}" class="img-responsive slide_image">
                                </a>
                                <figcaption class="figure-caption text-center product-description">
                                    <div> <b style="font-size: 25px;"> {{$pprod->name}}</b>
                                        <p><s>450€</s><b style="color:red;font-size:25px;">300€</b>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>

                    @endforeach
                @endif



            </div>
        </div>

    </div>

@endsection

