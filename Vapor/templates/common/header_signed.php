<!DOCTYPE html>
<html lang="en-US">
<head>
    <title class="vaporTitle">V A P O R</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>

</head>
<body>

<div id="header_box" class="container">
    <!-- Hidden XS Header -->
    <div class="row hidden-xs">
        <div class="col-md-3 col-lg-3 ">
            <!-- Title -->
            <h1 class="vaporTitle">V A P O R</h1>
        </div>
        <div class="col-md-3 col-lg-4">
            <!-- Search Bar -->
            <div class="input-group stylish-input-group" style="margin-top: 20px">
                <input type="text" class="form-control"  placeholder="Search" >
                <span class="input-group-addon">
                    <button type="button" id="search_btn">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </div>

        <div class="col-md-1 col-lg-1 "  style="margin-top: 15px">
            <!-- Notification Icon -->
            <img id="bell" class="img-rounded img-thumbnail" src="res/icons/bell.png" alt="bell_icon">
        </div>
        <div class="col-md-1 col-lg-1 "  style="margin-top: 15px">
            <!-- Cart Icon -->
            <img id="cart" class="img-rounded img-thumbnail" src="res/icons/cart.png" alt="cart_icon">
        </div>
        <div class="col-md-2 col-lg-2"  style="margin-top: 20px">
            <!-- User Dropbox Menu -->
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="usernameOptions dropdown-toggle" data-toggle="dropdown">janedoe69</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">View Profile <span class="glyphicon glyphicon-user pull-right"></span></a></li>
                        <li class="divider"></li>
                        <li><a href="#">My Products <span class="glyphicon glyphicon-th-list pull-right"></span></a></li>
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
        <div class="col-md-1 col-lg-1 "  style="margin-top: 10px;">
            <!-- Profile Picture -->
            <img id="profile_picture" class="img-rounded img-thumbnail" src="res/images/profile_picture.png" alt="profile_picture">
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
                                <li><a id="signOut_btn" href="#">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row visible-xs">
    <br><br><br><br>
</div>



<script src="js/home_page_signed.js"></script>
</body>
</html>
