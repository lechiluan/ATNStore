<script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>
<?php
    include_once("Connection.php");
    
    function bind_payment_List($conn)
    {
        $sqlstring = "SELECT paymentid, paymentname FROM payment";
        $result = pg_query($conn, $sqlstring) or die("Error");
        echo "<select name='PaymentList' class='form-control'>
		<option value='0'>Chose payment</option>";
        while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
            echo "<option value='" . $row['paymentid'] . "'>" . $row['paymentname'] . "</option>";
        }
        echo "</select>";
    }

    if(isset($_GET["btnCancel"]))
    {
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
	if (isset($_POST['btnUpdate'])) 
			{
	if($_POST['txtDeliveryaddress']!="" && $_POST['txtDeliveryDate']!="")
	{
        $deliveryaddress = $_POST['txtDeliveryaddress'];
		$deliverydate =$_POST['txtDeliveryDate'];
        $payment=$_POST['PaymentList'];

        $query = "INSERT INTO orders (orderdate, deliverydate, deliveryloca, username, totalprice, paymentid)
				  VALUES ('".date('Y-m-d H:i:s')."', '".$deliverydate."', '".$deliveryaddress."','".$_SESSION['us']."', $total, '$payment')";
		pg_query($conn, $query) or die(pg_errormessage($conn));

        $result = pg_query($conn,"SELECT LASTVAL()") or die(pg_errormessage($conn));

        while ($row = pg_fetch_row($result)) {
            $Orid = $row[0];
        }

        $result1 = pg_query($conn,"SELECT a.branchid FROM product as a , branch as b WHERE proid= '$key' AND a.branchid = b.branchid") or die(pg_errormessage($conn));
        while ($row = pg_fetch_row($result1)) {
            $branch = $row[0];
        }

		foreach ($_SESSION["cart"] as $key => $row) {
            $a=$row['price'];
            $b=$row['quantity'];
            $total=$a*$b;

		    $query = "INSERT INTO orderdetail (orderid , proid, branchid, price, qty, unitprice)
				VALUES ('$Orid','$key','$branch',".$row['price'].", ".$row['quantity'].",'$total')";
		    pg_query($conn, $query) or die(pg_errormessage($conn));

            $quantity1=$row['quantity'];
		    $queryupdateprice = "UPDATE product SET proqty = proqty-$quantity1 WHERE proid='$key'";
		    pg_query($conn, $queryupdateprice) or die(pg_errormessage($conn));
        }
			unset($_SESSION["cart"]);
			echo "<script>alert('Your order has been acknowledged, we will confirm the payment with you soon!');</script>";
			echo "<script>window.location='index.php';</script>";
	    } 
	else
	{
		echo "Please Enter Enough Information!";
	}
}
?>

<div class="container">
    <h1>ORDER DATA</h1>
    <form id="form1" class="form-horizontal" name="form1" method="POST" action="">

        <div class="form-group">
            <label for="lblDeliveryAddress" class="col-sm-2 control-label">Delivery location(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtDeliveryaddress" id="txtDeliveryaddress" class="form-control"
                    placeholder="Delivery Location" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="lblDeliveryDate" class="col-sm-2 control-label">Delivery Date(*): </label>
            <div class="col-sm-10">
                <input name="txtDeliveryDate" id="txtDeliverylocal" type='date' class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label for="txtTen" class="col-sm-2 control-label">Total Price:</label>
            <div class="col-sm-10">
                <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="" readonly
                    value='<?php echo "$"; echo Number_format($total); ?>' />
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Choose Payment(*): </label>
            <div class="col-sm-10">
                <?php bind_payment_List($conn); ?>
            </div>
        </div>
</div>
<div class="container">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        <input type="submit" name="btnUpdate" class="btn btn-primary" id="btnUpdate" value="ORDER PRODUCT" />
        <input name="btnCancel" type="button" class="btn btn-primary" id="btnBoQua" value="Cancel"
            onclick="window.location='index.php'" />
    </div>
</div>
</form>
</div>
<br>
<br>