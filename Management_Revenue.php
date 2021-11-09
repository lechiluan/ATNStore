<?php
if (!isset($_SESSION['admin']) or $_SESSION['admin'] == 0) {
    echo "<script>alert('You are not administration')</script>";
    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
} else {
?>
<h1>Management Revenue</h1>
<!-- Bootstrap -->
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
    ?>
<div class="form-group">
    <label for="" class="col-sm-2 control-label">Choose branch to statistic </label>
    <div class="col-sm-5">
        <?php bind_branch_List($conn); ?>
    </div>
    <input type="submit" class="btn btn-primary" name="btnStatistic" id="btnStatistic" value="Statistic" />
</div>
</p>
</p>
<link rel="stylesheet" type="text/css" href="style.css" />
<meta charset="utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<form name="frm" method="post" action="">
    <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><strong>Product ID</strong></th>
                <th><strong>Product Name</strong></th>
                <th><strong>Branch Name</strong></th>
                <th><strong>Quality</strong></th>
                <th><strong>Total Price</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php
                include_once("Connection.php");
                if (isset($_POST["btnStatistic"])) {
                    $branch = $_POST['BranchList'];
                    echo $branch;
                // $result = pg_query($conn, "SELECT orderid, orderdate, deliverydate, deliveryloca, username, totalprice, b.paymentname
                // From orders a, payment b WHERE a.paymentid=b.paymentid") or die(pg_errormessage($conn));
                $result = pg_query($conn,"SELECT a.proid, proname, branchname, qty, totalprice FROM product as a, branch as b, orders as c, orderdetail as d
                WHERE d.branchid=b.branchid and a.proid = d.proid and c.orderid = d.orderid and d.branchid ='$branch'") or die(pg_errormessage($conn));
                while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                ?>
            <tr>
                <td><?php echo $row["proid"]; ?></td>
                <td><?php echo $row["proname"] ?></td>
                <td><?php echo $row["branchname"] ?></td>
                <td><?php echo $row["qty"]; ?></td>
                <td><?php echo "$";
                            echo $row["totalprice"] ?></td>
            </tr>
            <?php
                $total += $row['totalprice'];
                }
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