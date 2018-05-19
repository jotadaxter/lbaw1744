<div id="header_box" class="container">
    <!-- Hidden XS Header -->
    <div class="row hidden-xs">
        <div class="col-sm-4 col-md-3 col-lg-3 ">
            <!-- Title -->
            <h1 class="vaporTitle">V A P O R</h1>
        </div>
        <div class="col-sm-5 col col-md-4 col-md-offset-1 col-lg-5 col-lg-offset-1 center">
            <!-- Search Bar -->
            <div class="input-group stylish-input-group shift-down">
                <input type="text" class="white-box form-control"  placeholder="Search" href="{{url('/products')}}">
                <span class="input-group-addon btn">
                    <button type="button" id="search_btn">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </div>

        <div class="row shift-down">
            <div class="col-sm-3 col-md-3 col-md-offset-1 col-lg-2 col-lg-offset-1 btn-group">
                <!-- Cart Button -->
                <a href="{{route('cart')}}" id="cart_btn" class="cart_btn btn">
                    <img id="cart"  class="cart_not_signed img-rounded thumbnail" src="/icons/cart.png" alt="cart_icon">
                </a>
                <!-- Register Button -->
                <a class="register_btn btn button" href="{{route('register')}}" id="signIn_btn">Register</a>
                <!-- Login Button -->
                <a class="register_btn btn button" href="{{route('login')}}" id="signIn_btn">Login</a>
            </div>
        </div>
    </div>

</div>

<!-- XS Header Alignment -->
<div class="row visible-xs">
    <br><br><br>
</div>

<script src="/js/home_page.js"></script>