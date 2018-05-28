<div id="header_box" class="container">

    <!-- Hidden XS Header -->
    <div class="row hidden-xs">
        <div class="col-sm-3 col-md-3 col-lg-3 ">
            <div class="visible-sm">
                <!-- Title SM -->
                <a href="{{route('home')}}" style="text-decoration : none">
                    <h1 class="vaporTitle registed_title_sm">V A P O R</h1>
                </a>
            </div>
            <div class="visible-md">
                <!-- Title MD -->
                <a href="{{route('home')}}" style="text-decoration : none">
                    <h1 class="vaporTitle registed_title_md">V A P O R</h1>
                </a>
            </div>
            <div class="hidden-md hidden-sm hidden-xs" >
                <!-- Title -->
                <a href="{{route('home')}}" style="text-decoration : none">
                    <h1 class="vaporTitle">V A P O R</h1>
                </a>
            </div>

        </div>

        <div class="col-sm-3 col col-md-4 col-lg-4  center">
            <!-- Search Bar -->
            @include('layouts.search_bar')
        </div>

        <div class="shift-down">
            <!-- Cart Button -->
            <div class="col-sm-1 col-md-1 col-lg-1  btn-group">
                <a href="{{route('cart')}}" id="cart_btn" class="cart_btn btn">
                    <img id="cart"  class="cart_not_signed img-rounded thumbnail" src="/icons/cart.png" alt="cart_icon" height="80" width="80">
                </a>
            </div>

            <!-- User Dropbox Menu-->
            <div class="col-sm-3 col-md-2 col-lg-2 btn-group">
                <div class="dropdown ">
                    <button class="register_btn btn button dropdown-toggle btn-block" type="button" data-toggle="dropdown">
                        {{$user->username}}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a id="view_profile" href="{{route('profile', Auth::id())}}">View Profile <span class="glyphicon glyphicon-user pull-right"></span></a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('myProducts', Auth::id())}}">My Products <span class="glyphicon glyphicon-th-list pull-right"></span></a></li>
                        <li class="divider"></li>

                        @if(Auth::user()->admin)
                            <li><a href="{{route('adminPage')}}">Admin Menu <span class="glyphicon glyphicon-user pull-right"></span></a></li>
                            <li class="divider"></li>

                        @endif

                        <li><a href="{{route('wishlist', Auth::id())}}">Wishlist <span class="glyphicon glyphicon-heart pull-right"></span></a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('settings', Auth::id())}}">Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
                        <li class="divider"></li>
                        <li><a id="signOut_btn" href="{{route('logout')}}">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                    </ul>
                </div>


            </div>

            <!-- User Profile Avatar -->
            <div class="col-sm-2 col-md-2 col-lg-2 btn-group shift-up">
                <a class="register_btn btn button">
                    <img id="profile_picture" class="img-rounded img-thumbnail" src="/uploads/profile_images/{{ Auth::user()->img }}" alt="profile_picture" height="60" width="60">
                </a>
            </div>
        </div>
    </div>

</div>

<!-- Visible XS Header -->
<nav class="visible-xs navbar navbar-default btn">
    <div class="container">

        <!-- Header Mobile Navbar -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle navbar-toggle-2 collapsed"
                    data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand vaporTitle vapor_xs" style="color:black" href="{{route('home')}}" >V A P O R</a>
        </div>

        <!-- Dropbox -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <div class="input-group stylish-input-group navbar-left">
                    <input type="text" class="white-box form-control"  placeholder="Search" href="{{url('/products')}}">
                    <span class="input-group-addon btn">
                    <button type="button" id="search_btn">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
                </div>

            <ul class="nav navbar-nav">
                <hr class="hr_header">
                <li class="dropdownbox-element"><a href="{{route('cart')}}" style="color:black;" >Cart </a></li>
                <hr class="hr_header">
                <li class="dropdown">
                    <a class=" active dropdownbox-element" style="color:black;" data-toggle="dropdown"
                       role="button" aria-haspopup="true" aria-expanded="false">{{$user->username}}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item-element" style="color:black;" href="/profile/{{Auth::id()}}">
                                View Profile
                            </a>
                        </li>

                        <hr class="hr_header2">

                        <li><a class="active dropdown-item-element" style="color:black;" href="#">My Products</a></li>

                        <hr class="hr_header">

                        @if(Auth::user()->admin)
                            <li><a class="dropdown-item-element" style="color:black;" href="{{route('adminPage')}}">
                                    Admin Menu
                                </a>
                            </li>
                            <hr class="hr_header2">
                        @endif

                        <li><a class="active dropdown-item-element" style="color:black;" href="#">Wishlist</a></li>

                        <hr class="hr_header2">

                        <li><a class="active dropdown-item-element" style="color:black;" href="#">Settings</a></li>

                        <hr class="hr_header2">

                        <li><a class="dropdown-item-element" style="color:black;" href="{{route('logout')}}">Sign Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="/js/home_page.js"></script>