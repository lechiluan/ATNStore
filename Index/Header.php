<!DOCTYPE html>
<html lang="en">

<head>
    <title>ATN Store</title>
    <link rel="shortcut icon" href="/images/logoGW.jpg" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="body">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <class class="navbar-brand"></class><a href="index.php"><img src="images/atnlogook.png" alt="MobileWorld Shop" class="logotop"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Product Category<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="?page=science">Science</a></li>
                            <li><a href="?page=lego">Lego</a></li>
                            <li><a href="?page=vehicles">Vehicles</a></li>
                            <li><a href="?page=ae">Architects & Engineers</a></li>
                            <li><a href="?page=allproduct">All Product</a></li>
                        </ul>
                    </li>

                    <li><a href="?page=aboutus">About Us</a></li>
                    <li><a href="?page=contactus">Contact Us</a></li>
                    <li><a href="?page=feedback">Feedback</a></li>
                    <form class="navbar-form navbar-left" action="index.php?page=search" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="txtSearch">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (isset($_SESSION['us']) && $_SESSION['us'] != "") {
                        if ($_SESSION['us'] == "admin") {
                    ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>Management</b><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="?page=category_management">Category Management</a></li>
                                    <li><a href="?page=suppliers_management">Suppliers Management</a></li>
                                    <li><a href="?page=branch_management">Branches Management</a></li>
                                    <li><a href="?page=product_management">Product Management</a></li>
                                    <li><a href="?page=seefeedback">Feedback Management</a></li>
                                    <li><a href="?page=seeorder">Orders Management</a></li>
                                    <li><a href="?page=seeorderdetail">Order Detail Management</a></li>
                                    <li><a href="?page=seeuser">Customer Management</a></li>
                                    <li><a href="?page=revenue">Revenue Management by branch</a></li>
                                    <li><a href="?page=reven">Revenue Management by month</a></li>
                                </ul>
                            </li>
                        <?php
                        }
                        ?>
                        <li><a href="?page=viewcart"><span class="glyphicon glyphicon-shopping-cart"></span> Cart
                                (<?php echo count($cart) ?>)</a></li>
                        <li><a href="?page=update_information"><span class="glyphicon glyphicon-user"></span> Hi,
                                <?php echo $_SESSION['us'] ?></a></li>
                        <li><a href="?page=logout"><span class="glyphicon glyphicon-logout"></span> Log out</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a href="?page=viewcart"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                        <li><a href="?page=register"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                        <li><a href="?page=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</body>