<!DOCTYPE html>
<html lang="en-US">
<head>
    <title class="vaporTitle">V A P O R</title>
    <meta charset="UTF-8">
    <link rel="icon" href="res/icons/shopping-cart.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

<!-- Header -->
<div id="header_box" class="container">
    <!-- Hidden XS Header -->
    <div class="row hidden-xs">
        <div class="col-sm-3 col-md-3 col-lg-3 ">
            <!-- Title -->
            <h1 class="vaporTitle">V A P O R</h1>
        </div>
        <div class="col-sm-5 col-sm-offset-1 col-md-5 col-md-offset-1 col-lg-5 col-lg-offset-1 center">
            <!-- Search Bar -->
            <div class="input-group stylish-input-group shift-down">
                <input type="text" class="white-box form-control"  placeholder="Search" >
                <span class="input-group-addon btn">
                    <button type="button" id="search_btn">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </div>

        <div class="row shift-down">
            <div class="col-sm-2 col-sm-offset-1 col-md-2 col-md-offset-1 col-lg-2 col-lg-offset-1 btn-group">
                <!-- Cart Icon -->
                <button type="button" id="cart_btn" class="cart_btn btn"><img id="cart" class="cart_not_signed img-rounded thumbnail" src="res/icons/cart.png" alt="cart_icon"></button>
                <button type="button" id="register_btn" class="register_btn btn">Register</button>
                <button type="submit" id="signIn_btn" class="signIn_btn btn">Sign In</button>
            </div>
        </div>
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
                                <li><a href="#">Wishlist <span class="glyphicon glyphicon-heart pull-right"></span></a></li>
                                <li class="divider"></li>
                                <li><a href="#">Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
                                <li class="divider"></li>
                                <li><a id="signOut_btn" href="#">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
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
    <br><br><br>
</div>

@yield('content')


<!-- Footer -->
<footer>
    <div class="container text-center">
        <hr />
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills nav-justified">
                    <li><a class="line" href="home.html">Home</a></li>
                    <li><a class="line" href="about.html">About</a></li>
                    <li><a class="line" href="#">Contact</a></li>
                </ul>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 20px">
                <ul class="nav nav-pills nav-justified">
                    <li><a class="line" href="/"> &copy; 2018 V a p o r</a></li>
                    <li><a class="line" href="#">Terms of Service</a></li>
                    <li><a class="line" href="#">Privacy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="js/home_page.js"></script>
</body>
</html>