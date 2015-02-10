<?php
session_start();
include_once '../settings.php';
?>
<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Amministra Eventi</title>

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
    <?php
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

    if ($loggato && $isAdmin){
    ?>
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Eventi
                <small>Aggiungi evento</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../index.html">Home</a>
                </li>
                <li><a href="../eventi/index.php">Eventi</a></li>
                <li class="active">Aggiungi evento</li>
            </ol>
        </div>
    </div>

    <!-- /.row -->


    <form action="../eventi/esito.php?op=add" method="POST">
        <fieldset>
            <div class="row">
                <div class="pull-left col-md-3"></div>
                <div class="pull-left col-md-6 col-sm-12 col-xs-12 panel panel-default input-group">
                    <div class="panel-heading">
                        <label class="control-label" for="txtTitolo">Titolo</label>
                    </div>
                    <div class="panel-body">
                        <div class="controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <input type="text" name="txtTitolo" class="form-control" placeholder="Titolo dell'evento">
                        </div>
                    </div>
                </div>
                <div class="pull-left col-md-3"></div>
            </div>

            <div class="row">
                <div class="pull-left col-md-6 col-sm-12 col-xs-12 panel panel-default input-group">
                    <div class="panel-heading">
                        <label class="control-label" for="txtDescrizione">Descrizione</label>
                    </div>
                    <div class="panel-body">
                        <div class="controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <input id="txtDescrizione" name="txtDescrizione" placeholder="Breve descrizione dell'evento"
                                   class="form-control" type="text" id="txtDescrizione">

                        </div>
                    </div>
                </div>

                <div class="pull-left col-md-6 col-sm-12 col-xs-12 panel panel-default input-group">
                    <div class="panel-heading">
                        <label class="control-label" for="txtLinkImmagine">Link immagine</label>
                    </div>
                    <div class="panel-body">
                        <div class="controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <input id="txtLinkImmagine" name="txtLinkImmagine"
                                   placeholder="Link all'immagine di copertina"
                                   class="form-control" type="text" id="txtLinkImmagine">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="pull-left col-md-6 col-sm-6 col-xs-12 panel panel-default input-group">
                    <div class="panel-heading">
                        <label class="control-label" for="txtInizio">Inizio</label>
                    </div>
                    <div class="panel-body">
                        <div class="controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <input id="txtInizio" name="txtInizio" placeholder="Inizio dell'evento" class="form-control"
                                   type="text" id="txtInizio">

                            <p class="help-block">Formato: YYYY-MM-DD hh:mm</p>
                        </div>
                    </div>
                </div>

                <div class="pull-left col-md-6 col-sm-6 col-xs-12 panel panel-default input-group">
                    <div class="panel-heading">
                        <label class="control-label" for="txtFine">Fine</label>
                    </div>
                    <div class="panel-body">
                        <div class="controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <input id="txtFine" name="txtFine" placeholder="Fine dell'evento" class="form-control"
                                   type="text" id="txtFine">

                            <p class="help-block">Formato: YYYY-MM-DD hh:mm</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="pull-left col-md-4 col-sm-12 col-xs-12 panel panel-default input-group">
                    <div class="panel-heading">
                        <label class="control-label" for="txtProvincia">Provincia</label>
                    </div>
                    <div class="panel-body">
                        <div class="controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <input id="txtProvincia" name="txtProvincia" placeholder="Provincia dove si tiene l'evento"
                                   class="form-control" type="text" id="txtProvincia">
                        </div>
                    </div>
                </div>

                <div class="pull-left col-md-4 col-sm-12 col-xs-12 panel panel-default input-group">
                    <div class="panel-heading">
                        <label class="control-label" for="txtComune">Comune</label>
                    </div>
                    <div class="panel-body">
                        <div class="controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <input id="txtComune" name="txtComune" placeholder="Comune dove si tiene l'evento"
                                   class="form-control" type="text" id="txtComune">
                        </div>
                    </div>
                </div>

                <div class="pull-left col-md-4 col-sm-12 col-xs-12 panel panel-default input-group">
                    <div class="panel-heading">
                        <label class="control-label" for="txtIndirizzo">Indirizzo</label>
                    </div>
                    <div class="panel-body">
                        <div class="controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <input id="txtIndirizzo" name="txtIndirizzo" placeholder="Indirizzo dove si tiene l'evento"
                                   class="form-control" type="text" id="txtIndirizzo">

                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="pull-left col-md-12 col-sm-12 col-xs-12 panel panel-default input-group">
                    <div class="panel-heading">
                        <label class="control-label" for="txaContenuto">Contenuto</label>
                    </div>
                    <div class="panel-body">
                        <div class="center controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <textarea rows="10" id="txaContenuto" name="txaContenuto" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>

        </fieldset>
        <div class="row">
            <div class="pull-left col-md-5 col-sm-5 col-xs-5"></div>
            <div class="pull-left col-md-2 col-sm-2 col-xs-2"><input type="submit" class="btn btn-default" name="op"
                                                                     value="Inserisci"></div>
            <div class="pull-left col-md-5 col-sm-5 col-xs-5"></div>
        </div>
    </form>
</div>
<?php } else { ?>
    <div class="row alert alert-danger" role="alert">
        <div class="col-md-12">
            <H1>Siamo spiacenti ma lei non ha i permessi per accedere a questa pagina.</H1></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Torna agli <a href="../eventi/index.php">eventi</a></h3></div>
    </div>
<?php } ?>

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
               
