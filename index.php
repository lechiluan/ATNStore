include_once("Index/Header.php");
<?php
session_start();
include_once("Connection.php");
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];

?>
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
        include_once("Index/AboutUs.php");
    } 
    else if ($page == "contactus") {
        include_once("Index/ContactUs.php");
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
    else if($page == "reven")
    {
        include_once("manage_revenue.php");
    }
} else {
    include_once("HomePage.php");
}
?>
<?php
include_once("Index/Footer.php");
?>