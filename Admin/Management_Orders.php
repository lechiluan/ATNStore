<?php
if (!isset($_SESSION['admin']) or $_SESSION['admin'] == 0) {
    echo "<script>alert('You are not administration')</script>";
    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
} else {
?>
    <h1>Orders Management</h1>
    <!-- Bootstrap -->
    
    <link rel="stylesheet" type="text/css" href="style.css" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <form name="frm" method="post" action="">
        <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>Order ID</strong></th>
                    <th><strong>Order Date</strong></th>
                    <th><strong>Delivery Date</strong></th>
                    <th><strong>Delivery Location</strong></th>
                    <th><strong>Username</strong></th>
                    <th><strong>Total Price</strong></th>
                    <th><strong>Payment</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once("Connection.php");
                $result = pg_query($conn, "SELECT orderid, orderdate, deliverydate, deliveryloca, username, totalprice, b.paymentname
                From orders a, payment b WHERE a.paymentid=b.paymentid ") or die(pg_errormessage($conn));
                while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $row["orderid"]; ?></td>
                        <td><?php echo $row["orderdate"] ?></td>
                        <td><?php echo $row["deliverydate"] ?></td>
                        <td><?php echo $row["deliveryloca"]; ?></td>
                        <td><?php echo $row["username"] ?></td>
                        <td><?php echo "$";
                            echo $row["totalprice"] ?></td>
                        <td><?php echo $row["paymentname"] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </form>
<?php
}
?>