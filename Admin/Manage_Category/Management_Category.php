<?php
    if(!isset($_SESSION['admin']) or $_SESSION['admin']==0)
    {
        echo "<script>alert('You are not administration')</script>";
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
    else
    {
?>
<h1>Category Management</h1>
<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="index.css" />
<meta charset="utf-8" />
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
                $id= $_GET['id'];
                pg_query($conn,"DELETE FROM category WHERE catid='$id'");
            }
            
        }
    ?>
<form name="frm" method="post" action="">
    <p>
        <img src="images/add.png" alt="Add new" width="16" height="16" border="0" /> <a href="?page=add_category" class ="name"> Add new category</a>
    </p>
    <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><strong>No.</strong></th>
                <th><strong>Category ID</strong></th>
                <th><strong>Category Name</strong></th>
                <th><strong>Description</strong></th>
                <th><strong>Edit</strong></th>
                <th><strong>Delete</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php
                include_once("Connection.php");
                $No=1;
                $result = pg_query($conn,"SELECT * FROM category");
                while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC))
                { 
            ?>
            <tr>
                <td class="cotCheckBox"><?php echo $No; ?></td>
                <td><?php echo $row["catid"]; ?></td>
                <td><?php echo $row["catname"]; ?></td>
                <td><?php echo $row["catdesc"]?></td>
                <td style='text-align:center'><a href="?page=update_category&&id=<?php echo $row["catid"]; ?>">
                        <img src='images/edit.png' border='0' /></a></td>
                <td style='text-align:center'>
                    <a href="?page=category_management&&function=del&&id=<?php echo $row["catid"]; ?>"
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
    <!--Nút Thêm mới , xóa tất cả-->
    <div class="row" style="background-color:#FFF">
        <!--Nút chức nang-->
        <div class="col-md-12">
        </div>
    </div>
    <!--Nút chức nang-->
</form>
<?php
    }
 ?>