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
                  <form action="" method="POST">
                      <div class="pull-left col-md-3 col-sm-12 col-xs-12">Titolo</div>
                      <div class="pull-left col-md-9 col-sm-12 col-xs-12"><input type="text" name="titolo"></div>
                      <div class="pull-left col-md-3 col-sm-12 col-xs-12">Descrizione</div>
                      <div class="pull-left col-md-9 col-sm-12 col-xs-12"><input type="text" name="descrizione"></div>
                      <div class="pull-left col-md-3 col-sm-12 col-xs-12">Link immagine di copertina</div>
                      <div class="pull-left col-md-9 col-sm-12 col-xs-12"><input type="text" name="imgAddress"></div>
                      <div class="pull-left col-md-3 col-sm-12 col-xs-12">Data inizio</div>
                      <div class="pull-left col-md-9 col-sm-12 col-xs-12"><input type="text"></input></div>
                      <div class="pull-left col-md-3 col-sm-12 col-xs-12">Data fine</div>
                      <div class="pull-left col-md-9 col-sm-12 col-xs-12"><input type="text"></input></div>
                      <div class="pull-left col-md-3 col-sm-12 col-xs-12">Contenuto</div>
                      <div class="pull-left col-md-9 col-sm-12 col-xs-12"><textarea name="contenuto" rows="8"></textarea></div>
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

</body>

</html>
               
