<div class="container">
    <h3><u><b>Vehicles</b></u></h3>
</div>
<div class="container">
    <?php
		include_once("Connection.php");
		$result = pg_query($conn, "SELECT * FROM product WHERE catid ='C03'");
    	if (!$result) { //add this check.
        die('Invalid query: ' . pg_errormessage($conn));
        }
	    while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
	?>
    <!--Display product-->
    <div class="col-sm-3">
        <div class="card">
            <img src="product-imgs/<?php echo $row['proimage']?>" class="imgcart">
            <h4 class="name"><a
                    href="?page=productdetail&ma=<?php echo  $row['proid']?>"><?php echo  $row['proname']?></a>
            </h4>
            <div class="price"><ins>$<?php echo  $row['price']?></ins> <del class="oldprice">
                    $<?php echo  $row['oldprice']?></del></div>
            <p><button><a href="CartFuntion.php?ma=<?php echo  $row['proid']?>">Add to Cart</a></button></p>
        </div>
    </div>
    <?php
				}
				?>
</div>
