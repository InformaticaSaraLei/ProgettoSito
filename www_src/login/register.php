<?php

session_start();

if (isset($_SESSION['login'])) {
        header("Location: error.php?error=6");
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
    <link href="../css/modern-business.css" rel="stylesheet">

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
            <h1 class="page-header">Registrati
                <small>Sign up</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../index.html">Home</a>
                </li>
                <li class="active">Registrati</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
        		<form action="register.php" method="POST">
                <table>
                    <tr>
                      <td>Nome:</td><td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                      <td>Cognome:</td><td><input type="text" name="surname"></td>
                    </tr>
                    <tr>
                      <td>Email:</td><td><input type="text" name="email"></td>
                    </tr>
                    <tr>
                      <td>Username:</td><td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                      <td>Password:</td><td><input type="password" name="pass1"></td>
                    </tr>
                    <tr>
                      <td>Conferma password:</td><td><input type="password" name="pass2"></td>
                    </tr>
                    <tr>
                      <td><input type="submit" name="register" value="registrati"></td>
                      <td><input type="reset" value="reset"></td>
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

include_once("./lib/userscontroller.php");

if (isset($_POST['register'])) {
        $newuser=new UsersController();
        $newuser->AddUser();
}

?>
