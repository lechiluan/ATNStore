<?php
include_once("Index/Header.php");
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
        include_once("Index/Login.php");
    }
    else if ($page == "logout") {
        include_once("Index/Logout.php");
    }  
    else if ($page == "register") {
        include_once("Index/Register.php");
    } 
    else if ($page == "product_management") {
        include_once("Admin/Mageme_Product/Product_Management.php");
    } 
    else if ($page == "category_management") {
        include_once("Admin/Mageme_Category/Management_Category.php");
    } 
    else if ($page == "add_category") {
        include_once("Admin/Mageme_Category/Add_Category.php");
    } 
    else if ($page == "update_category") {
        include_once("Admin/Mageme_Category/Update_Category.php");
    } 
    else if ($page == "add_product") {
        include_once("Admin/Mageme_Product/Add_Product.php");
    } 
    else if ($page == "update_product") {
        include_once("Admin/Mageme_Product/Update_Product.php");
    } 
    else if ($page == "aboutus") {
        include_once("Index/AboutUs.php");
    } 
    else if ($page == "contactus") {
        include_once("Index/ContactUs.php");
    } 
    else if ($page == "feedback") {
        include_once("Index/Feedback.php");
    }
    else if ($page == "productdetail") {
        include_once("Index/Product_Detail.php");
    } 
    else if ($page == "allproduct") {
        include_once("Index/Category/Allproduct.php");
    } 
    else if ($page == "science") {
        include_once("Index/Category/Science.php");
    } 
    else if ($page == "lego") {
        include_once("Index/Category/Lego.php");
    } 
    else if ($page == "vehicles") {
        include_once("Index/Category/Vehicles.php");
    }
    else if ($page == "ae") {
        include_once("Index/Category/Architects.php");
    } 
    else if ($page == "search") {
        include_once("Index/Search.php");
    } 
    else if ($page == "update_information") {
        include_once("Index/Update_Information.php");
    } 
    else if ($page == "viewcart") {
        include_once("Index/ViewCart.php");
    } 
    else if ($page == "payment") {
        include_once("Index/Payment.php");
    } 
    else if ($page == "seefeedback") {
        include_once("Admin/Management_Feedback.php");
    } 
    else if ($page == "seeorder") {
        include_once("Admin/Management_Orders.php");
    } 
    else if ($page == "seeorderdetail") {
        include_once("Admin/Management_Orderdetail.php");
    }
    else if ($page == "seeuser") {
        include_once("Admin/Management_Customer.php");
    }
    else if($page == "suppliers_management")
    {
        include_once("Admin/Mageme_Suppliers/Management_Suppliers.php");
    }
    else if($page == "add_suppliers")
    {
        include_once("Admin/Mageme_Suppliers/Add_Suppliers.php");
    }
    else if($page == "update_suppliers")
    {
        include_once("Admin/Mageme_Suppliers/Update_Suppliers.php");
    }
    else if($page == "branch_management")
    {
        include_once("Admin/Mageme_Branch/Management_Branch.php");
    }
    else if($page == "add_branch")
    {
        include_once("Admin/Mageme_Branch/Add_Branch.php");
    }
    else if($page == "update_branch")
    {
        include_once("Admin/Mageme_Branch/Update_Branch.php");
    }
    else if($page == "revenue")
    {
        include_once("Admin/Management_Revenue.php");
    }
    else if($page == "reven")
    {
        include_once("Manage_Revenue.php");
    }
} 
else {
    include_once("Index/HomePage.php");
}
?>
<?php
include_once("Index/Footer.php");
?>