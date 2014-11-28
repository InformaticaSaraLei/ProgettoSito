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
              $em = new EventiManager();
              $op = $_POST['op'];
              if($op == 'add') {
                // Aggiunta evento
                $titolo = $_POST['txtTitolo'];
                $descrizione = $_POST['txtDescrizione'];
                $linkImg = $_POST['txtLinkImmagine'];
                $inizio = $_POST['txtInizio'];
                $fine = $_POST['txtFine'];
                $provincia = $_POST['txtProvincia'];
                $comune = $_POST['txtComune'];
                $indirizzo = $_POST['txtIndirizzo'];
                $contenuto = $_POST['txaContenuto'];

                $dataInizio = substr($txtInizio, 0, 10);
                $oraInizio = substr($txtInizio, 12);
                $dataFine = substr($txtFine, 0, 10);
                $oraFine = substr($txtFine, 12);

                $res = $em->creaEvento($titolo,$descrizione,$contenuto,$dataInizio,$oraInizio,$dataFine,$oraFine,$provincia,$comune,$indirizzo,$linkImg,$id_utente);
                stampaEsito($res);
              } elseif($op == 'canc') {
                // Cancellazione evento
                $id = $_POST['id']; 
                $res = $em->cancellaEvento($id);
                stampaEsito($res);
              }


              public function stampaEsito($esito) {
                echo '<h1 class="section-heading">';
                if($esito){
                    echo "Azione riuscita";
                }else{
                    echo "Azione fallita";
                }
                echo '</h1>';
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
