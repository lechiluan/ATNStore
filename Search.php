<div class="container">
    <h1><u>Results</u></h1>
</div>
<div class="container">
    <?php
    include_once("Connection.php");
    if (isset($_POST["txtSearch"])) {
        $data = $_POST['txtSearch'];
        $search =strtoupper($data);
          if($data=="")
          {
            echo "<script>alert('Please Enter Data!')</script>";
            echo '<meta http-equiv="refresh" content="0;URL=index.php">';
          }
         else {
      $result = pg_query($conn, "SELECT * FROM product WHERE proid LIKE '%".$search."%' or proname like '%".$search."%'");
if(pg_num_rows($result)==0)
{
echo  "<script>alert('No find data. Please Enter Again!')</script>";
echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}
else {
if (!$result) { //add this check.
die('Invalid query: ' . pg_errormessage($conn));
}
else {
while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
?>
    <!--Display product-->
    <div class="col-sm-3">
        <div class="card">
            <img src="product-imgs/<?php echo $row['proimage']?>" style="width:100%">
            <h4 class="name"><a
                    href="?page=quanly_chitietsanpham&ma=<?php echo  $row['proid']?>"><?php echo  $row['proname']?></a>
            </h4>
            <div class="price"><ins>$ <?php echo  $row['price']?></ins> <del class="oldprice">
                    $<?php echo  $row['oldprice']?></del></div>
            <p><button><a href="?page=cartfuntion&ma=<?php echo  $row['proid']?>">Add to Cart</a></button></p>
        </div>
    </div>
    <?php
				}
      }
    }
  }
}
?>
</div>