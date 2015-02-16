<?php
include_once '../settings.php';
require_once("lib/userscontroller.php");

session_start();

?>


<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Informatica sarà lei!</title>
    <link rel="icon" href="../img/loghi-ufficiali/logo_icona.ico" />
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="icon" href="../img/loghi-ufficiali/logo_icona.ico"/>

    <!-- Custom CSS -->
    <link href="../css/informaticasaralei.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Navigation -->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script>
        $(function () {
            $("#navigation_bar").load("../navigation_bar.html");
            $("#footer").load("../footer.html");
        });
    </script>
</head>
<body>
<div id="navigation_bar"></div>
<!--- Inserimento navbar ---->

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Login
                <small>Sign In</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../index.html">Home</a>
                </li>
                <li class="active">Login</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <?php
            if (!isset($_SESSION['login'])) {
                echo '
            <h2>Effettua il login:</h2>
 
            <form action="login.php" method="POST">
                <table>
                    <tr>
                        <td>Username:&emsp;</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td><br>Password:&emsp;</td>
                        <td><br><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td><br><br><input type="submit" name="login" value="login"></td>
                        <td><br><br><input type="reset" value="reset"></td>
                    </tr>
                </table>
            </form>
            ';
            } else {
                // Redirect al pannello di amministrazione
                header("Location: dashboard.php");
                die();
            }

            ?>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<hr>

<!-- Footer -->
<div id="footer"></div>
<!--- Inserimento navbar ---->

<!-- End Footer -->

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>

</html>


<?php

if (isset($_POST['login'])) {
    $newuser = new UsersController();
    $newuser->LoginUser();
}

?>

