<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">


<div class="container">
    <h2 align="center" class="welcome"><b>Welcome to ATN Store. Toy for teenagers</b></h2>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" ></li>
            <li data-target="#myCarousel" data-slide-to="2" ></li>
            <li data-target="#myCarousel" data-slide-to="3" ></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="images/slide1.jpg" alt="Los Angeles" style="width:100%;">
            </div>

            <div class="item">
                <img src="images/slide2.jpg" style="width:100%;">
            </div>
            <div class="item">
                <img src="images/slide3.jpg" style="width:100%;">
            </div>
            <div class="item">
                <img src="images/slide4.jpg" style="width:100%;">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</script>
<?php
include_once("Science.php");
include_once("Lego.php");
include_once("Vehicles.php");
include_once("Architects.php");
?>