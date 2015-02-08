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
            <h1 class="page-header">Attenzione
                <small>attenzione</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../index.html">Home</a>
                </li>
                <li class="active">Error</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <h2>Attenzione!</h2>
            <?php
            if (isset($_GET['error'])) {
                $error = $_GET['error'];
                if ($error == 1) {
                    echo "<p>Attenzione, non sono stati compilati tutti i campi.</p>";
                } elseif ($error == 2) {
                    echo "<p>Attenzione, Le due password non coincidono.</p>";
                } elseif ($error == 3) {
                    echo "<p>Attenzione, inserire sia Username e password, ritorna al form di <a href='login.php'>login</a>.</p>";
                } elseif ($error == 4) {
                    echo "<p>Attenzione, username o password errati, ritorna alla pagina di <a href='login.php'>login</a>.</p>";
                } elseif ($error == 5) {
                    echo "<p>Attenzione, devi prima aver effettuato il <a href='login.php'>login</a> per accedere a questa pagina.</p>";
                } elseif ($error == 6) {
                    echo "<p>Attenzione, hai già  effettuato il login! Torna alla <a href='index.html'>Home Page</a>.</p>";
                } elseif ($error == 7) {
                    echo "<p>Attenzione, non puoi effettuare il logout, effettua prima il <a href='login.php'>Login</a>.</p>";
                } elseif ($error == 8) {
                    echo "<p>Attenzione, Non sei un utente con privilegi di amministratore, torna alla <a href='index.html'>Home Page</a>.</p>";
                } elseif ($error == 9) {
                    echo "<p>Attenzione, i campi password sono stati compilati in modo errato, torna a <a href='editprofile.php'>Modifica profilo</a>.</p>";
                } else {
                    echo "<p>Errore non definito!</p>";
                }
            } else {
                echo "<p>Errore non definito!</p>";
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

