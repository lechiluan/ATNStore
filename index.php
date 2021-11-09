<!DOCTYPE html>
<html lang="en">

<head>
    <title>ATN Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
session_start();
include_once("Connection.php");
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
?>

<body class="body">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <class class="navbar-brand"></class><a href="index.php"><img src="images/atnlogook.png"
                        alt="MobileWorld Shop" class="logotop"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Product Category<span
                                class="caret"></span></a>
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
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>Management</b><span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="?page=category_management">Category Management</a></li>
                            <li><a href="?page=suppliers_management">Suppliers Management</a></li>
                            <li><a href="?page=branch_management">Branches Management</a></li>
                            <li><a href="?page=product_management">Product Management</a></li>
                            <li><a href="?page=seefeedback">Feedback Management</a></li>
                            <li><a href="?page=seeorder">Orders Management</a></li>
                            <li><a href="?page=seeorderdetail">Order Detail Management</a></li>
                            <li><a href="?page=seeuser">Customer Management</a></li>
                            <li><a href="?page=revenue">Revenue Management</a></li>
                        </ul>
                    </li>
                    <?php

                        } ?>
                    <li><a href="?page=viewcart"><span class="glyphicon glyphicon-shopping-cart"></span> Cart
                            (<?php echo count($cart) ?>)</a></li>
                    <li><a href="?page=update_customer"><span class="glyphicon glyphicon-user"></span> Hi,
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

    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == "login") {
            include_once("Login.php");
        } 
        else if ($page == "register") {
            include_once("Register.php");
        } 
        else if ($page == "product_management") {
            include_once("Management_Product.php");
        } 
        else if ($page == "category_management") {
            include_once("Management_Category.php");
        } 
        else if ($page == "add_category") {
            include_once("Add_Category.php");
        } 
        else if ($page == "update_category") {
            include_once("Update_Category.php");
        } 
        else if ($page == "add_product") {
            include_once("Add_Product.php");
        } 
        else if ($page == "update_product") {
            include_once("Update_Product.php");
        } 
        else if ($page == "logout") {
            include_once("Logout.php");
        } 
        else if ($page == "aboutus") {
            include_once("AboutUs.php");
        } 
        else if ($page == "contactus") {
            include_once("ContactUs.php");
        } 
        else if ($page == "feedback") {
            include_once("Feedback.php");
        }
        else if ($page == "productdetail") {
            include_once("Product_Detail.php");
        } 
        else if ($page == "allproduct") {
            include_once("Allproduct.php");
        } 
        else if ($page == "science") {
            include_once("Science.php");
        } 
        else if ($page == "lego") {
            include_once("Lego.php");
        } 
        else if ($page == "vehicles") {
            include_once("Vehicles.php");
        }
        else if ($page == "ae") {
            include_once("Architects.php");
        } 
        else if ($page == "search") {
            include_once("Search.php");
        } 
        else if ($page == "update_customer") {
            include_once("Update_Customer.php");
        } 
        else if ($page == "viewcart") {
            include_once("view-cart.php");
        } 
        else if ($page == "payment") {
            include_once("Payment.php");
        } 
        else if ($page == "seefeedback") {
            include_once("Management_Feedback.php");
        } 
        else if ($page == "seeorder") {
            include_once("Management_Orders.php");
        } 
        else if ($page == "seeorderdetail") {
            include_once("Management_Orderdetail.php");
        }
        else if ($page == "seeuser") {
            include_once("Management_Customer.php");
        }
        else if($page == "suppliers_management")
        {
            include_once("Management_Suppliers.php");
        }
        else if($page == "add_suppliers")
        {
            include_once("Add_Suppliers.php");
        }
        else if($page == "update_suppliers")
        {
            include_once("Update_Suppliers.php");
        }
        else if($page == "branch_management")
        {
            include_once("Management_Branch.php");
        }
        else if($page == "add_branch")
        {
            include_once("Add_Branch.php");
        }
        else if($page == "update_branch")
        {
            include_once("Update_Branch.php");
        }
        else if($page == "revenue")
        {
            include_once("Management_Revenue.php");
        }
    } else {
        include_once("HomePage.php");
    }
    ?>
</body>
</p>
<?php
    include_once("Footer.php");
?>