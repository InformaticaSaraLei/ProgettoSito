<?php 
session_start(); 
include '../settings.php';
?>
<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Esito operazione - Informatica sarà lei!</title>

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
            <h1 class="page-header">Esito operazione
                <small>Sottotitolo</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../index.html">Home</a>
                </li>
                <li class="active">Esito operazione</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="container">
        <div class="page-header">
            <?php
            include_once "lib/evento.php";
            function stampaEsito($esito)
            {
                echo '<h1 class="section-heading">';
                if ($esito) {
                    echo 'Azione riuscita';
                    echo '<h3><a href="index.php">Torna agli eventi</a></h3>';
                    echo '<h3><a href="addEvento.php.php">Aggiungi altro evento</a></h3>';
                } else {
                    echo 'Azione Fallita';
                    echo '<h3><a href="index.php">Torna agli eventi</a></h3>';
                }
                echo '</h1>';
            }

            include_once "../admin/lib/userscontroller.php";
            include_once "../admin/lib/database.php";
            include_once "../admin/lib/functions.php";

            $isAdmin = false;
            $loggato = false;

            $user = new UsersController();
            if (isset($_SESSION['login']))
                $loggato = true;

            if ($user->isAdmin($_SESSION['login']))
                $isAdmin = true;

            if ($loggato && $isAdmin) {
                $em = new EventiManager();
                $op = $_GET['op'];
                if ($op == 'add') {
                    // Aggiunta evento
                    $titolo = mysql_escape_string($_POST['txtTitolo']);
                    $descrizione = mysql_escape_string($_POST['txtDescrizione']);
                    $linkImg = mysql_escape_string($_POST['txtLinkImmagine']);
                    $inizio = mysql_escape_string($_POST['txtInizio']);
                    $fine = mysql_escape_string($_POST['txtFine']);
                    $provincia = mysql_escape_string($_POST['txtProvincia']);
                    $comune = mysql_escape_string($_POST['txtComune']);
                    $indirizzo = mysql_escape_string($_POST['txtIndirizzo']);
                    $contenuto = mysql_escape_string($_POST['txaContenuto']);
                    $id_utente = 1; // Salvato da qualche parte in SESSION :D

                    $res = $em->creaEvento($titolo, $descrizione, $contenuto, $inizio, $fine, $provincia, $comune, $indirizzo, $linkImg, $id_utente);
                    stampaEsito($res);
                } elseif ($op == 'canc') {
                    // Cancellazione evento
                    $id = $_GET['id'];
                    $res = $em->cancellaEvento($id);
                    stampaEsito($res);
                }
            } else {
                ?>
                <div class="row alert alert-danger" role="alert">
                    <div class="col-md-12">
                        <H1>Siamo spiacenti ma lei non ha i permessi per accedere a questa pagina.</H1></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Torna agli <a href="index.php">eventi</a></h3></div>
                </div>
            <?php
            }
            ?>


        </div>
    </div>
    <hr>
</div>
<!-- /.container -->

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
