     <!-- Bootstrap -->
     <link rel="stylesheet" type="text/css" href="index.css" />
     <meta charset="utf-8" />
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <?php
		include_once("Connection.php");
		if(isset($_GET["id"]))
		{
			$id= $_GET["id"];
			$result = pg_query($conn,"SELECT * FROM branch where branchid='$id'");
			$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
			$cat_id = $row['branchid'];
			$cat_name = $row['branchname'];
			$cat_des = $row['address'];
	?>
     <div class="container">
         <h2>Updating Product Suppliers</h2>
         <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
             <div class="form-group">
                 <label for="txtTen" class="col-sm-2 control-label">Branch ID(*): </label>
                 <div class="col-sm-10">
                     <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Branch ID" readonly
                         value='<?php echo $cat_id ;?>'>
                 </div>
             </div>
             <div class="form-group">
                 <label for="txtTen" class="col-sm-2 control-label">Branch Name(*): </label>
                 <div class="col-sm-10">
                     <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Branch Name"
                         value='<?php echo $cat_name;?>'>
                 </div>
             </div>

             <div class="form-group">
                 <label for="txtMoTa" class="col-sm-2 control-label">Address(*): </label>
                 <div class="col-sm-10">
                     <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description"
                         value='<?php echo $cat_des;?>'>
                 </div>
             </div>

             <div class="form-group">
                 <div class="col-sm-offset-2 col-sm-10">
                     <input type="submit" class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update" />
                     <input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Ignore"
                         onclick="window.location='?page=branch_management'" />

                 </div>
             </div>
         </form>
     </div>
     <?php
		}
		else
        {
			echo '<meta http-equiv="Refresh" content="0; URL=?page=branch_management"/>';
        }
	?>
     <?php
		if(isset($_POST["btnUpdate"]))
		{
			$id= $_POST["txtID"];
			$name= $_POST["txtName"];
			$des = $_POST["txtDes"];
			$err="";
			if($name=="")
			{
				$err .= "<li>Enter Category Name, please</li>";
			}
			if($err!="")
			{
				echo "<ul>$err</ul>";
			}
			else
			{
				$sq = "SELECT * FROM branch WHERE branchid != '$id' and branchname='$name'";
				$result= pg_query($conn, $sq);
				if(pg_num_rows($result)==0)
				{
					pg_query($conn, "UPDATE branch SET branchname ='$name', address='$des' where branchid='$id'");
					echo '<meta http-equiv="Refresh" content="0; URL=?page=branch_management"/>';
				}
				else
				{
					echo "<li>Duplicate Branch Name</li>";
				}
			}
		}
    ?>