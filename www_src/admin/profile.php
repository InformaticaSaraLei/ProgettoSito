<?php
include_once '../settings.php';
require_once("lib/userscontroller.php");

session_start();

if (isset($_SESSION['login'])) {
    $user = new UsersController();
    // prelevo il nome dell'utente
    $name = $user->GetName($_SESSION['login']);
    // prelevo il cognome dell'utente
    $surname = $user->GetSurname($_SESSION['login']);
    // prelevo l'indirizzo dell'utente
    $email = $user->GetEmail($_SESSION['login']);
    // prelevo l'username dell'utente
    $username = $user->GetUsername($_SESSION['login']);
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
            <h2>Benvenuto <?php echo "$name"; ?></h2>

            <p>Qui puoi gestire le tue informazioni personali e modificarle.</p>
            <table>
                <tr>
                    <td><b>Nome:</b></td>
                    <td><?php echo "$name"; ?></td>
                </tr>
                <tr>
                    <td><b>Cognome:</b></td>
                    <td><?php echo "$surname"; ?></td>
                </tr>
                <tr>
                    <td><b>Email:</b></td>
                    <td><?php echo "$email"; ?></td>
                </tr>
                <tr>
                    <td><b>Username:</b></td>
                    <td><?php echo "$username"; ?></td>
                </tr>
            </table>
            <p><a href="editprofile.php">Modifica</a> il tuo prifilo.</p>
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


