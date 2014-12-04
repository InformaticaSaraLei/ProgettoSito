<?php
//ini_set('include_path', '');
include_once "lib/evento.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eventi - Informatica sarÃ  lei!</title>

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
                <small>Tutti gli eventi</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../index.html">Home</a>
                </li>
                <li class="active">Eventi</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="pull-right col-md-1 col-sm-12 col-xs-12"><a href="calendario.php">Calendario</a></div>
    </div>
	<?php
		$loggato=true; //Impostare se loggato o no in qualche modo
		$isAdmin=true;//Impostare se l'utente Ã¨ admin
		if($loggato && $isAdmin){
			echo '<div class="row">
						<div class="pull-left col-md-1 col-sm-12 col-xs-12"><a href="addEvento.php">Aggiungi evento</a></div>
				  </div>';
		}
	?>

    <!-- Content Row -->
    <?php
    $i = 0;
    $em = new EventiManager();
    $eventi = $em->getEventi();
    if(isset($eventi) && count($eventi)!= 0){
        foreach ($eventi as $e) {
            $i = $i +1;
            if($i % 2 != 0) echo '<div class="row">';
            echo '<div class="pull-left col-lg-6 col-md-6 col-sm-12 col-xs-12 panel panel-default">';
                echo '<div class="panel-heading">';
                    echo '<h4><i class="fa fa-fw fa-users"></i>'.($e->titolo).'</h4>';
                echo '</div>';
                echo '<div class="panel-body">';
                    echo '<div class="row">';
                        echo '<div class="pull-left col-md-6 col-lg-6 col-sm-6 col-xs-6">';
                            echo $e->descrizione;
                        echo '</div>';
                        echo '<div class="pull-left col-md-6 col-lg-6 col-sm-6 col-xs-6">';
                            echo '<img src="'.$e->link_img.'" class="img-responsive customer-img" alt="Immagine Evento">';
                        echo '</div>';
                    echo '</div>';
                    echo '<br>';
                    echo '<div class="row">';
                        echo '<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4"></div>';
                        echo '<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">';
                            echo '<a href="paginaEvento.php?id='.$e->id.'" class="btn btn-default text-center">Altre informazioni</a>';
                        echo '</div>';
                        echo '<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4"></div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            if($i % 2 == 0) echo '</div>';
        }
    }else{
        echo '<div class="row"><div class="pull-left col-md-4 col-lg-4"></div>';
        echo '<div class="pull-left col-md-4 col-lg-4">';
        echo '<p>Non evento programmato</p></div>';
        echo '<div class="pull-left col-md-4 col-lg-4"></div></div>';
    }
    
    ?>


    <!-- /.row -->
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
