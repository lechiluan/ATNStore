<?php
if (!isset($_SESSION['admin']) or $_SESSION['admin'] == 0) {
    echo "<script>alert('You are not administration')</script>";
    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
} else {
?>
    <h1>Management Revenue</h1>
    <!-- Bootstrap -->
    <div class="form-group">
                <label for="" class="col-sm-2 control-label">Product  branch(*): </label>
                <div class="col-sm-10">
                    <?php bind_branch_List($conn); ?>
                </div>
    </div>

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
                function bind_branch_List($conn)
                {
                    $sqlstring = "SELECT branchid, branchname FROM branch";
                    $result = pg_query($conn, $sqlstring);
                    echo "<select name='BranchList' class='form-control'>
                    <option value='0'>Chose Branch</option>";
                    while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                        echo "<option value='" . $row['branchid'] . "'>" . $row['branchname'] . "</option>";
                    }
                    echo "</select>";
                }
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
                $total += $row['totalprice'];
                }
                ?>
                <tr>
                    <td colspan="5" align="right">
                        <h3>TOTAL REVENUE</h3>
                    </td>
                    <td>
                        <h3 class="price"><b>$<?php echo Number_format($total); ?></b></h3>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </form>
<?php
}
?>