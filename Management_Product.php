<?php
    if(!isset($_SESSION['admin']) or $_SESSION['admin']==0)
    {
        echo "<script>alert('You are not administration')</script>";
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
    else
    {
?>
<h1>Product Management</h1>
<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<script language="JavaScript">
function deleteConfirm() {
    if (confirm("Are you sure to delete!")) {
        return true;
    } else {
        return false;
    }
}
</script>
<?php
        include_once("Connection.php");
        if(isset($_GET["function"])=="del")
        {
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                $sq = "SELECT proimage from product WHERE proid='$id'";
                $res = pg_query($conn,$sq);
                $row = pg_fetch_array($res,PGSQL_ASSOC);
                $filePic = $row['proimage'];
                unlink("product-imgs/".$filePic);
                pg_query($conn,"DELETE FROM product WHERE proid='$id'");
            }
        }
    ?>
<form name="frm" method="post" action="">
    <p>
        <img src="images/add.png" alt="Thêm mới" width="16" height="16" border="0" /><a href="?page=add_product" class ="name"> Add
            new product</a>
    </p>
    <table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><strong>No.</strong></th>
                <th><strong>Product ID</strong></th>
                <th><strong>Product Name</strong></th>
                <th><strong>Price</strong></th>
                <th><strong>Quantity</strong></th>
                <th><strong>Category Name</strong></th>
                <th><strong>Supplier Name</strong></th>
                <th><strong>Branch ID</strong></th>
                <th><strong>Image</strong></th>
                <th><strong>Edit</strong></th>
                <th><strong>Delete</strong></th>
            </tr>
        </thead>

        <tbody>
            <?php
                include_once("Connection.php");
				$No=1;
                $result=pg_query($conn,"SELECT proid, proname, price, proqty, proimage, b.catname, c.branchname, d.supname 
                FROM product a, category b, branch c, suppliers d
                Where a.catid = b.catid AND a.branchid = c.branchid AND a.supid = d.supid
                ORDER BY prodate DESC");

                while($row= pg_fetch_array($result, NULL, PGSQL_ASSOC))
                {
			?>
            <tr>
                <td><?php echo $No; ?></td>
                <td><?php echo $row["proid"]; ?></td>
                <td><?php echo $row["proname"]; ?></td>
                <td><?php  echo $row["price"];?></td>
                <td><?php echo $row["proqty"];?></td>
                <td><?php  echo $row["catname"];?></td>
                <td><?php  echo $row["supname"];?></td>
                <td><?php  echo $row["branchname"];?></td>
                <td align='center' class='cotNutChucNang'>
                    <img src='product-imgs/<?php echo $row['proimage']?>' border='0' width="50" height="50" />
                </td>
                <td align='center' class='cotNutChucNang'><a
                        href="?page=update_product&&id=<?php echo $row["proid"]; ?>">
                        <img src='images/edit.png' border='0' /></a></td>
                <td align='center' class='cotNutChucNang'>
                    <a href="?page=product_management&&function=del&&id=<?php echo $row["proid"]; ?>"
                        onclick="return deleteConfirm()">
                        <img src='images/delete.png' border='0' /></a>
                </td>
            </tr>
            <?php
                    $No++;
                }
			?>
        </tbody>

    </table>
</form>
<?php
    }
 ?>