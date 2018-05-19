<!-- Header Signed -->
<div id="header_box" class="container">
    <div class="row hidden-xs">
        <div class="col-sm-3 col-md-3 col-lg-3 ">
            <div class="visible-sm">
                <!-- Title -->
                <h1 class="vaporTitle registed_title_sm">V A P O R</h1>
            </div>
            <div class="visible-md">
                <!-- Title -->
                <h1 class="vaporTitle registed_title_md">V A P O R</h1>
            </div>
            <div class="hidden-md hidden-sm hidden-xs">
                <!-- Title -->
                <h1 class="vaporTitle">V A P O R</h1>
            </div>

        </div>

        <div class="col-sm-3 col col-md-4 col-lg-4  center">
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

        <div class="shift-down">
            <div class="col-sm-1 col-md-1 col-lg-1  btn-group">
            <!-- Cart Button -->
            <a href="{{route('cart')}}" id="cart_btn" class="cart_btn btn">
                <img id="cart"  class="cart_not_signed img-rounded thumbnail" src="/icons/cart.png" alt="cart_icon" height="80" width="80">
            </a>
            </div>

            <div class="col-sm-3 col-md-2 col-lg-2 btn-group">

                <!-- User Dropbox Menu-->

                    <div class="dropdown ">
                        <button class="register_btn btn button dropdown-toggle btn-block" type="button" data-toggle="dropdown">
                            {{$user->username}}
                            </button>
                        <ul class="dropdown-menu">
                            <li><a id="view_profile" href="/profile/{{Auth::id()}}">View Profile <span class="glyphicon glyphicon-user pull-right"></span></a></li>
                            <li class="divider"></li>
                            <li><a href="#">My Products <span class="glyphicon glyphicon-th-list pull-right"></span></a></li>
                            <li class="divider"></li>

                            @if(Auth::user()->admin)
                                <li><a href="{{route('adminPage')}}">Admin Menu <span class="glyphicon glyphicon-user pull-right"></span></a></li>
                                <li class="divider"></li>

                            @endif

                            <li><a href="#">Wishlist <span class="glyphicon glyphicon-heart pull-right"></span></a></li>
                            <li class="divider"></li>
                            <li><a href="#">Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
                            <li class="divider"></li>
                            <li><a id="signOut_btn" href="/logout">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                        </ul>
                    </div>


            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 btn-group shift-up">
                <a class="register_btn btn button">
                    <img id="profile_picture" class="img-rounded img-thumbnail" src="/uploads/profile_images/{{ Auth::user()->img }}" alt="profile_picture" height="60" width="60">
                </a>
            </div>
        </div>
    </div>

    <div class="row">

    </div>





    <!-- Visible XS Header -->
    <div class="row visible-xs">
        <div class="nav navbar-default navbar-fixed-top visible-xs" style="background-color: grey">
            <div class="container">
                <div class="col-xs-9">
                    <!-- Title -->
                    <h6 class="vaporTitle">V A P O R</h6>
                </div>
                <div class="col-xs-2 col-xs-offset-1" >
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <button style="margin-top:25px;"
                                    data-toggle="dropdown" type="button"
                                    class="dropdown-toggle navbar-toggle pull-left">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#">View Profile <span class="glyphicon glyphicon-user pull-right"></span></a></li>
                                <li class="divider"></li>
                                <li><a href="#">Cart <span class="glyphicon glyphicon-shopping-cart pull-right"></span></a></li>
                                <li class="divider"></li>
                                <li><a href="#">Notifications <span class="glyphicon glyphicon-bell pull-right"></span></a></li>
                                <li class="divider"></li>
                                <li><a href="#">My Products <span class="glyphicon glyphicon-bell pull-right"></span></a></li>
                                <li class="divider"></li>
                                <li><a href="#">Wishlist <span class="glyphicon glyphicon-heart pull-right"></span></a></li>
                                <li class="divider"></li>
                                <li><a href="#">Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
                                <li class="divider"></li>
                                <li><a id="signOut_btn_xs" href="#">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- XS Header Alignment -->
<div class="row visible-xs">
    <br><br><br><br>
</div>

<!-- SM Header Alignment -->
<div class="row visible-sm">
    <br><br>
</div>

<script src="/js/home_page.js"></script>