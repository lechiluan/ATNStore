<title>MobileWorld.com</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/responsive.css">
<script src="js/jquery-3.2.0.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>

<body>
    <?php
    if (isset($_POST['btnCancel'])) {
        echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
    }
    if (isset($_POST['btnLogin'])) {
        $us = $_POST['txtUsername'];
        $us = pg_escape_string($conn, $us);
        $pa = $_POST['txtPass'];
        $err = "";
        if ($us == "") {
            $err .= "Enter user name please <br/>";
        }
        if ($pa == "") {
            $err .= "Enter password please <br/>";
        }
        if ($err != "") {
            echo $err;
        } else {
            /*echo "You are logged in with $us and password $pa";*/
            include_once("Connection.php");
            $pass = md5($pa);
            $res = pg_query($conn, "SELECT username, password, state FROM customer WHERE username='$us' AND password='$pass'") or die(pg_errormessage($conn));
            $row = pg_fetch_array($res, NULL, PGSQL_ASSOC);
            if (pg_num_rows($res) == 1) {
                $_SESSION['us'] = $us;
                $_SESSION['admin'] = $row["state"];
                echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
            } else {
                echo "You are logged in fail";
            }
        }
    }
    ?>
    <div class="row">
        <div class="col-md-12">
            <section id="loginForm">
                <form id="form1" name="form1" method="POST" class="form-horizontal">
                <h2 align="center"><b>Welcome to ATN Store. Login In to Continue.</b></h2>
                    <hr />
                    <div class="form-group">
                        <label for="txtUsername" class="col-md-5 control-label">Username(*): </label>
                        <div class="col-md-7">
                            <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" value="" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="txtPass" class="col-md-5 control-label">Password(*): </label>
                        <div class="col-md-7">
                            <input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="Password" value="" />
                            <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-5 col-md-7">
                            <input type="submit" name="btnLogin" class="btn btn-primary" id="btnLogin" value="Login" />
                            <input type="submit" name="btnCancel" class="btn btn-primary" id="btnLogin" value="Cancel" />
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</body>