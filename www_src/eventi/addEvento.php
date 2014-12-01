<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aggiungi evento</title>

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
            <h1 class="page-header">Eventi
                <small>Aggiungi evento</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../index.html">Home</a>
                </li>
                <li><a href="listaEventi.html">Eventi</a></li>
                <li class="active">Aggiungi evento</li>
            </ol>
        </div>
    </div>

    <!-- /.row -->

    <div class="row">
        <form action="esito.php" method="POST">
            <fieldset>

                <div class="control-group">
                    <label class="control-label" for="txtTitolo">Titolo</label>

                    <div class="controls">
                        <input id="txtTitolo" name="txtTitolo" placeholder="Titolo dell'evento" class="input-xxlarge"
                               type="text">

                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="txtDescrizione">Descrizione</label>

                    <div class="controls">
                        <input id="txtDescrizione" name="txtDescrizione" placeholder="Breve descrizione dell'evento"
                               class="input-xxlarge" type="text">

                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="txtLinkImmagine">Link immagine</label>

                    <div class="controls">
                        <input id="txtLinkImmagine" name="txtLinkImmagine" placeholder="Link all'immagine di copertina"
                               class="input-xxlarge" type="text">

                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="txtInizio">Inizio</label>

                    <div class="controls">
                        <input id="txtInizio" name="txtInizio" placeholder="Inizio dell'evento" class="input-xlarge"
                               type="text">

                        <p class="help-block">Formato: YYYY-MM-DD hh:mm</p>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="txtFine">Fine</label>

                    <div class="controls">
                        <input id="txtFine" name="txtFine" placeholder="Fine dell'evento" class="input-xlarge"
                               type="text">

                        <p class="help-block">Formato: YYYY-MM-DD hh:mm</p>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="txtProvincia">Provincia</label>

                    <div class="controls">
                        <input id="txtProvincia" name="txtProvincia" placeholder="Provincia dove si tiene l'evento"
                               class="input-xxlarge" type="text">

                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="txtComune">Comune</label>

                    <div class="controls">
                        <input id="txtComune" name="txtComune" placeholder="Comune dove si tiene l'evento"
                               class="input-xxlarge" type="text">

                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="txtIndirizzo">Indirizzo</label>

                    <div class="controls">
                        <input id="txtIndirizzo" name="txtIndirizzo" placeholder="Indirizzo dove si tiene l'evento"
                               class="input-xxlarge" type="text">

                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="txaContenuto">Contenuto</label>

                    <div class="controls">
                        <textarea id="txaContenuto" name="txaContenuto"></textarea>
                    </div>
                </div>

            </fieldset>
        </form>
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

<script>
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>


</body>

</html>
               
