<link rel="stylesheet" href="style.css">
<div class="container">
    <h1><u><b>Product Detail</b></u></h1>
    <?php
    include_once("Connection.php");
    if (isset($_GET['ma'])) {
        $id = $_GET['ma'];
        $result = pg_query($conn, "SELECT * FROM product Where proid='$id'");
        if (!$result) { //add this check.
            die('Invalid query: ' . pg_errormessage($conn));
        }
        while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
    ?>
            <form method="GET" action="index.php?page=cartfunction">
                <div class="col-sm-6">
                    <img src="product-imgs/<?php echo $row['proimage'] ?>" style="width:100%">
                </div>
                <div class="col-sm-6"></div>
                <h2 class="name"><a href="?page=productdetail&ma=<?php echo  $row['proid'] ?>">
                        <?php echo  $row['proname'] ?>
                    </a></h2>
                <div class="price">PRICE: <ins>$<?php echo $row['price'] ?></ins>
                    <del class="oldprice">$<?php echo  $row['oldprice'] ?>
                    </del>
                </div>
                <p>
                <h4>Short Detail:</h4>
                <?php echo $row['smalldesc'] ?>
                </p>
                <div>
                    <input type="number" name="quantity" value="1">
                    <input type="hidden" name='ma' value="<?php echo $row['proid'] ?>">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Add to Cart</button>
</div>
</form>
<div class="container">
    <div class="col-sm-12">
        <h2><b><u>The detail information of product</u></b></h2>
        <h4>
            <?php echo $row['detaildesc'] ?>
        </h4>
    </div>
</div>
</p>
</p>
</p>

<?php
        }
    }
?>