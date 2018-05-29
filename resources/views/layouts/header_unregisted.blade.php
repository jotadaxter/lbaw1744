<div id="header_box" class="container">

    <!-- Hidden XS Header -->
    <div class="row hidden-xs">
        <div class="col-sm-4 col-md-3 col-lg-3 ">
            <!-- Title -->
            <a href="{{route('home')}}" style="text-decoration : none">
                <h1 class="vaporTitle">V A P O R</h1>
            </a>
        </div>
        <div class="col-sm-5 col col-md-4 col-md-offset-1 col-lg-5 col-lg-offset-1 center">
            <!-- Search Bar -->
            @include('layouts.search_bar')
        </div>

        <div class="row shift-down">
            <div class="col-sm-3 col-md-3 col-md-offset-1 col-lg-2 col-lg-offset-1 btn-group">
                <!-- Cart Button -->
                <a href="{{route('cart')}}" id="cart_btn" class="cart_btn btn">
                    <img id="cart"  class="cart_not_signed img-rounded thumbnail"
                         src="/icons/cart.png" alt="cart_icon">
                </a>
                <!-- Register Button -->
                <a class="register_btn btn button" href="{{route('register')}}" id="signIn_btn">Register</a>
                <!-- Login Button -->
                <a class="register_btn btn button" href="{{route('login')}}" id="signIn_btn">Login</a>
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

            @include('layouts.search_bar')

            <ul class="nav navbar-nav">
                <hr class="hr_header">
                <li class="dropdownbox-element"><a href="{{route('cart')}}" style="color:black;" >Cart </a></li>
                <hr class="hr_header">
                <li class="dropdownbox-element"><a href="{{route('login')}}" style="color:black;" >Login </a></li>
                <hr class="hr_header">
                <li class="dropdownbox-element"><a href="{{route('register')}}" style="color:black;" >Register </a></li>

            </ul>
        </div>
    </div>
</nav>




<script src="/js/home_page.js"></script>