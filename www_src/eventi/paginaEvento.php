<!DOCTYPE html>


<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dettagli evento</title>

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




  <?php
    require 'lib/evento.php';
    $em = new EventiManager();
    $id = $_GET['id'];
    $e = $em->getEventoById($id);
   ?>

<body>
<div id="navigation_bar"></div>
<!--- Inserimento navbar ---->

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Eventi
                <small><? echo  $e->titolo;?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../index.html">Home</a>
                </li>
                <li><a href="./">Eventi</a></li>
                <li class="active"><? echo $e->titolo;?></li>
            </ol>
        </div>
    </div>

    <!-- /.row -->
    <!-- Content Row -->

    <div class="row">    
	<?php
        include_once "../login/lib/userscontroller.php";
        include_once "../login/lib/database.php";
        include_once "../login/lib/functions.php";
        
        $isAdmin = false;
        $loggato = true;
        
        $user = new UsersController();
        if(!isset($_SESSION['login']))
            $loggato = false;
            
        if($loggato && $user->isAdmin($_SESSION['login']))
            $isAdmin = true;
            
		if($loggato && $isAdmin){
			echo    '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left">
                         <a href="esito.php?op=canc&id='.$e->id.'" onclick="return confirm(\'Sei sicuro di voler cancellare questo evento?\');">Elimina evento</a>
                     </div>';
		}
	?>
        <div class="pull-right col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
            <a href="calendario.php">Calendario</a>
        </div>
    </div>

    <!-- /.row -->
    <br>
  
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><i class="fa fa-fw fa-file-text-o"></i>Descrizione</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="pull-left col-md-6 col-sm-7">
                        <h4>Descrizione dell'evento</h4>

                        <p><?php echo $e->descrizione ?></p>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="pull-left col-md-5 col-sm-5 col-xs-12">
                        <img src="<?php echo $e->link_img ?>" class="img-responsive customer-img" alt="Immagine Evento">
                    </div>
                </div>
            </div>
            <br>
            <div class="panel-heading">
                <h4><i class="fa fa-fw fa-clock-o"></i>Luogo e date</h4>
            </div>
            <div class="panel-body">
                Luogo: <?php echo $e->provincia." ".$e->comune." ".$e->indirizzo; ?>
                <br>
                Data inizio evento: <?php echo substr($e->inizio,0,10); ?> alle ore: <?php  echo substr($e->inizio,10,6); ?>
                <br>
                Data fine evento: <?php echo substr($e->fine,0,10); ?> alle ore: <?php echo substr($e->fine,10,6); ?>
            </div>
            <div class="panel-heading">
                <h4><i class="fa fa-fw fa-question-circle"></i>Contenuto</h4>
            </div>
            <div class="panel-body">
                <?php echo $e->contenuto; ?>
            </div>
        </div>
    </div>

    <hr>


    <!-- End Footer -->

</div>
<!-- /.container -->

<!-- Footer -->
<div id="footer"></div>
<!--- Inserimento navbar ---->

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>

</html>
