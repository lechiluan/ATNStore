 <!-- Bootstrap -->
 <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>
    <?php
    include_once("Connection.php");
    function bind_Category_List($conn)
    {
        $sqlstring = "SELECT catid, catname FROM category";
        $result = pg_query($conn, $sqlstring);
        echo "<select name='CategoryList' class='form-control'>
		<option value='0'>Chose category</option>";
        while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
            echo "<option value='" . $row['catid'] . "'>" . $row['catname'] . "</option>";
        }
        echo "</select>";
    }
    function bind_supplier_List($conn)
    {
        $sqlstring = "SELECT supid, supname FROM suppliers";
        $result = pg_query($conn, $sqlstring);
        echo "<select name='SupplierList' class='form-control'>
		<option value='0'>Chose supplier</option>";
        while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
            echo "<option value='" . $row['supid'] . "'>" . $row['supname'] . "</option>";
        }
        echo "</select>";
    }
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
    if (isset($_POST["btnAdd"])) {
        $id = $_POST["txtID"];
        $proname = $_POST["txtName"];
        $short = $_POST['txtShort'];
        $detail = $_POST['txtDetail'];
        $price = $_POST['txtPrice'];
        $oldprice = $_POST['txtoldPrice'];
        $qty = $_POST['txtQty'];
        $pic = $_FILES['txtImage'];
        $category = $_POST['CategoryList'];
        $supplier = $_POST['SupplierList'];
        $branch = $_POST['BranchList'];
        $err = "";

        if (trim($id) == "") {
            $err .= "<li>Enter Product ID, please</li>";
        }
        if (trim($proname) == "") {
            $err .= "<li>Enter product name,please</li>";
        }
        if ($category == "0") {
            $err .= "<li>Choose product category,please</li>";
        }
        if ($supplier == "0") {
            $err .= "<li>Choose product supplier,please</li>";
        }
        if ($branch == "0") {
            $err .= "<li>Choose product branch,please</li>";
        }
        if (!is_numeric($price)) {
            $err .= "<li>Product price must be number</li>";
        }
        if (!is_numeric($oldprice)) {
            $err .= "<li>Product price must be number</li>";
        }
        if (!is_numeric($qty)) {
            $err .= "<li>Product quantity must be number</li>";
        }
        if ($err != "") {
            echo "<ul>$err</ul>";
        } else {
            if ($pic['type'] == "image/jpg" || $pic['type'] == "image/jpeg" || $pic['type'] == "image/png" || $pic['type'] == "image/git") {
                if ($pic['size'] <= 614400) {
                    $sq = "SELECT * FROM product WHERE proid='$id' or proname='$proname'";
                    $result = pg_query($conn, $sq);
                    if (pg_num_rows($result) == 0) {
                        copy($pic['tmp_name'], "product-imgs/" . $pic['name']);
                        $filePic = $pic['name'];
                        $sqlstring = "INSERT INTO product
						(proid, proname, price, oldprice, smalldesc, detaildesc, prodate, proqty, proimage, catid, supid, branchid)
						VALUES ('$id','$proname',$price,$oldprice,'$short','$detail','" . date('Y-m-d H:i:s') . "',$qty,'$filePic','$category','$supplier','$branch')";
                        pg_query($conn, $sqlstring) or die(pg_errormessage($conn));
                        echo '<meta http-equiv="Refresh" content="0; URL=?page=product_management"/>';
                    } else {
                        echo "<li>Duplicate productId or Name</li>";
                    }
                } else {
                    echo "Size of image to big";
                }
            } else {
                echo "Image format is not correct";
            }
        }
    }
    ?>
    <div class="container">
        <h2>Adding new Product</h2>

        <form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
            <div class="form-group">
                <label for="txtTen" class="col-sm-2 control-label">Product ID(*): </label>
                <div class="col-sm-10">
                    <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Product ID" value='' />
                </div>
            </div>
            <div class="form-group">
                <label for="txtTen" class="col-sm-2 control-label">Product Name(*): </label>
                <div class="col-sm-10">
                    <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Product Name" value='' />
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">Product category(*): </label>
                <div class="col-sm-10">
                    <?php bind_Category_List($conn); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-sm-2 control-label">Product supplier(*): </label>
                <div class="col-sm-10">
                    <?php bind_supplier_List($conn); ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">Product  branch(*): </label>
                <div class="col-sm-10">
                    <?php bind_branch_List($conn); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="lblGia" class="col-sm-2 control-label">Price(*): </label>
                <div class="col-sm-10">
                    <input type="number" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value='' />
                </div>
            </div>

            <div class="form-group">
                <label for="lblGia" class="col-sm-2 control-label">Old Price(*): </label>
                <div class="col-sm-10">
                    <input type="number" name="txtoldPrice" id="txtoldPrice" class="form-control" placeholder="Old Price" value='' />
                </div>
            </div>

            <div class="form-group">
                <label for="lblShort" class="col-sm-2 control-label">Short description(*): </label>
                <div class="col-sm-10">
                    <input type="text" name="txtShort" id="txtShort" class="form-control" placeholder="Short description" value='' />
                </div>
            </div>

            <div class="form-group">
                <label for="lblDetail" class="col-sm-2 control-label">Detail description(*): </label>
                <div class="col-sm-10">
                    <textarea name="txtDetail" rows="4" class="ckeditor"></textarea>
                    <script language="javascript">
                        CKEDITOR.replace('txtDetail', {
                            skin: 'kama',
                            extraPlugins: 'uicolor',
                            uiColor: '#eeeeee',
                            toolbar: [
                                ['Source', 'DocProps', '-', 'Save', 'NewPage', 'Preview', '-', 'Templates'],
                                ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteWord', '-', 'Print', 'SpellCheck'],
                                ['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],
                                ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button',
                                    'ImageButton', 'HiddenField'
                                ],
                                ['Bold', 'Italic', 'Underline', 'StrikeThrough', '-', 'Subscript',
                                    'Superscript'
                                ],
                                ['OrderedList', 'UnorderedList', '-', 'Outdent', 'Indent', 'Blockquote'],
                                ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyFull'],
                                ['Link', 'Unlink', 'Anchor', 'NumberedList', 'BulletedList', '-', 'Outdent',
                                    'Indent'
                                ],
                                ['Image', 'Flash', 'Table', 'Rule', 'Smiley', 'SpecialChar'],
                                ['Style', 'FontFormat', 'FontName', 'FontSize'],
                                ['TextColor', 'BGColor'],
                                ['UIColor']
                            ]
                        });
                    </script>

                </div>
            </div>

            <div class="form-group">
                <label for="lblSoLuong" class="col-sm-2 control-label">Quantity(*): </label>
                <div class="col-sm-10">
                    <input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Quantity" value="" />
                </div>
            </div>

            <div class="form-group">
                <label for="sphinhanh" class="col-sm-2 control-label">Image(*): </label>
                <div class="col-sm-10">
                    <input type="file" name="txtImage" id="txtImage" class="form-control" value="" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new" />
                    <input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Ignore" onclick="window.location='Management_Product.php'" />

                </div>
            </div>
        </form>
    </div>