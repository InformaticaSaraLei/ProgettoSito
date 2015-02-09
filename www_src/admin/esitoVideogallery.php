<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Esito operazione - Informatica sarà lei!</title>

    <link rel="icon" href="../img/logo_icona.ico"/>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

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
            function isEmpty($params)// potrebbe non essere suportato (...) da php < 5.6
            {
                foreach ($params as $p) {
                    if (!isset($p) or strlen($p) == 0) {
                        return true;
                    }
                }
                return false;
            }

            function stampaEsito($esito, $conn)
            {
                echo '<h1 class="section-heading">';
                if ($esito) {
                    echo 'Azione riuscita';
                    echo '<h3><a href="../videogallery/">Torna alla videogallery</a></h3>';
                    echo '<h3><a href="videogallery.php">Torna a gestione video</a></h3>';
                } else {
                    echo 'Azione Fallita';
                    echo "<br>" . $conn->error;
                    echo '<h3><a href="../videogallery/">Torna alla videogallery</a></h3>';
                }
                echo '</h1>';
            }

            include_once '../settings.php';
            include_once "./lib/userscontroller.php";
            include_once "./lib/database.php";
            include_once "./lib/functions.php";

            $isAdmin = false;
            $loggato = false;

            $user = new UsersController();
            if (isset($_SESSION['login']))
                $loggato = true;

            if ($user->isAdmin($_SESSION['login']))
                $isAdmin = true;

            if ($loggato && $isAdmin) {
                $servername = SETTINGS_DBHOST;
                $username = SETTINGS_USERNAME;
                $password = SETTINGS_PASSWORD;
                $dbname = SETTINGS_DATABASE;
                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $op = $_GET['op'];
                if ($op == 'add') {
                    // Aggiunta video
                    $titolo = $_POST['txtTitolo'];
                    $link = $_POST['txtLink'];
                    $data = $_POST['txtData'];
                    $durata = $_POST['txtDurata'];
                    $risoluzione = $_POST['txtRisoluzione'];
                    $formato = $_POST['txtFormato'];
                    $longitudine = $_POST['txtLongitudine'];
                    $latitudine = $_POST['txtLatitudine'];

                    if (isEmpty(array($titolo, $link))) {
                        $res = false;
                        /* throw new Exception('Invalid arguments'); */
                    } else {
                        parse_str(parse_url($_POST['txtLink'], PHP_URL_QUERY), $my_array_of_vars); // trasforma link youtube
                        $link = "//www.youtube.com/embed/" . $my_array_of_vars['v'];  //   in codice embed yt per l'iframe
                        $sql = ('INSERT INTO media(NOME, DATA_REALIZZAZIONE, RISOLUZIONE, FORMATO, LINK, LONGITUDINE, LATITUDINE, TIPOMEDIA, DURATA) VALUES("' . $titolo . '" ,"' . $data . '","' . $risoluzione . '","' . $formato . '","' . $link . '","' . $longitudine . '","' . $latitudine . '","Video","' . $durata . '");');
                        $res = $conn->query($sql);

                    }

                    stampaEsito($res, $conn);
                    $conn->close();
                } elseif ($op == 'canc') {
                    // Cancellazione video
                    $titolo = $_POST['txtTitoloDel'];
                    $sql = ('DELETE FROM media WHERE nome="' . $titolo . '" and tipomedia="Video"; ');
                    $conn->query($sql);
                    $res = mysqli_affected_rows($conn);
                    stampaEsito($res, $conn);
                    $conn->close();
                }
            } else {
                ?>
                <div class="row alert alert-danger" role="alert">
                    <div class="col-md-12">
                        <H1>Siamo spiacenti ma lei non ha i permessi per accedere a questa pagina.</H1></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Torna alla <a href="../videogallery/">videogallery</a></h3></div>
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
