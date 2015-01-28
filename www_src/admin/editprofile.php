<?php
include_once '../settings.php';
include_once("lib/userscontroller.php");
include_once("lib/admincontroller.php");

session_start();

$user = new UsersController();

if (isset($_SESSION['login'])) {
    $userid = $_SESSION['login'];
    $name = $user->GetName($userid);
    $surname = $user->GetSurname($userid);
    $email = $user->GetEmail($userid);
    $username = $user->GetUsername($userid);
} else {
    header("Location: error.php?error=5");
    die();
}

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

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

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
            <h1 class="page-header">Profilo
                <small>modifica profilo</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../index.html">Home</a>
                </li>
                <li class="active">Modifica profilo</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <h2>Modifica informazioni:</h2>

            <p>In questa pagina puoi modificare le tue informazioni personali.</p>

            <form action="" method="POST">
                <table>
                    <tr>
                        <td><b>Nome:</b></td>
                        <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                    </tr>
                    <tr>
                        <td><b>Cognome:</b></td>
                        <td><input type="text" name="surname" value="<?php echo $surname; ?>"></td>
                    </tr>
                    <tr>
                        <td><b>Email:</b></td>
                        <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
                    </tr>
                    <tr>
                        <td><b>Username:</b></td>
                        <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                    </tr>
                    <tr>
                        <td><p>Modifica la password o lascia i campi vuoti:</p></td>
                    </tr>
                    <tr>
                        <td><b>Password:</b></td>
                        <td><input type="password" name="pass1"></td>
                    </tr>
                    <tr>
                        <td><b>Coferma password:</b></td>
                        <td><input type="password" name="pass2"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="change" value="Modifica"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <div id="footer"></div>
    <!--- Inserimento navbar ---->

    <!-- End Footer -->

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>

</html>





<?php

if (isset($_POST[change])) {
    $user->EditProfile($userid);
    header("Location: profile.php");
    die();
}

?>

