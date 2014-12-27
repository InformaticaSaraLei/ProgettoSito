<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestione Fotogallery</title>

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
            <h1 class="page-header">Fotogallery
                <small>Gestione Fotogallery</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../index.html">Home</a>
                </li>
                <li><a href="../fotogallery">Fotogallery</a></li>
                <li class="active">Aggiungi foto</li>
            </ol>
        </div>
    </div>

    <!-- /.row -->

	<h3> Inserimento foto </h3> 
    <form action="esitoFotogallery.php?op=add" method="POST">
        <fieldset>
		
            <div class="row">
			
                <div class="pull-left col-md-12 col-sm-12 col-xs-12 panel panel-default input-group">
                    <div class="panel-heading">
                        <label class="control-label" for="txtTitolo">Titolo (obbligatorio)</label>
                    </div>
                    <div class="panel-body">
                        <div class="controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <input type="text" name="txtTitolo" class="form-control" placeholder="Titolo della foto">
                        </div>
                    </div>
                </div>
               
				
            </div>

            <div class="row">
			
				<div class="pull-left col-md-6 col-sm-12 col-xs-12 panel panel-default input-group">
                    <div class="panel-heading">
                        <label class="control-label" for="txtLink">Link foto (obbligatorio)</label>
                    </div>
                    <div class="panel-body">
                        <div class="controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <input id="txtLink" name="txtLink"
                                   placeholder="Link della foto"
                                   class="form-control" type="text" id="txtLink">
							<p class="help-block">Esempio: https://farm9.staticflickr.com/8592/15324272494_ef5d31b465_b.jpg </p>
                        </div>
                    </div>
                </div>
				<div class="pull-left col-md-6 col-sm-12 col-xs-12 panel panel-default input-group">
                    <div class="panel-heading">
                        <label class="control-label" for="txtInizio">Data</label>
                    </div>
                    <div class="panel-body">
                        <div class="controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <input id="txtData" name="txtData" placeholder="Data di realizzazione della foto" class="form-control"
                                   type="text" id="txtData">

                            <p class="help-block">Formato: YYYY-MM-DD hh:mm</p>
                        </div>
                    </div>
                </div>
				
				
            </div>
			
			


            <div class="row">
			
                <div class="pull-left col-md-6 col-sm-12 col-xs-12 panel panel-default input-group">
                    <div class="panel-heading">
                        <label class="control-label" for="txtRisoluzione">Risoluzione</label>
                    </div>
                    <div class="panel-body">
                        <div class="controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <input id="txtRisoluzione" name="txtRisoluzione" placeholder="Risoluzione della foto"
                                   class="form-control" type="text" id="txtRisoluzione">
							<p class="help-block">Raccomandata 1280x720</p>
                        </div>
                    </div>
                </div>
				
				<div class="pull-left col-md-6 col-sm-12 col-xs-12 panel panel-default input-group">
                    <div class="panel-heading">
                        <label class="control-label" for="txtDescrizione">Formato</label>
                    </div>
                    <div class="panel-body">
                        <div class="controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <input id="txtFormato" name="txtFormato" placeholder="Il formato della foto"
                                   class="form-control" type="text" id="txtFormato">

                        </div>
                    </div>
                </div>
				
             </div>  

			            <div class="row">
			
                <div class="pull-left col-md-6 col-sm-12 col-xs-12 panel panel-default input-group">
                    <div class="panel-heading">
                        <label class="control-label" for="txtDescrizione">Longitudine</label>
                    </div>
                    <div class="panel-body">
                        <div class="controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <input id="txtLongitudine" name="txtLongitudine" placeholder="Coordinate longitudinali della foto"
                                   class="form-control" type="text" id="txtLongitudine">

                        </div>
                    </div>
                </div>
				
				<div class="pull-left col-md-6 col-sm-12 col-xs-12 panel panel-default input-group">
                    <div class="panel-heading">
                        <label class="control-label" for="txtDescrizione">Latitudine</label>
                    </div>
                    <div class="panel-body">
                        <div class="controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <input id="txtLatitudine" name="txtLatitudine" placeholder="Coordinate latitudinali della foto"
                                   class="form-control" type="text" id="txtLatitudine">

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
	
	<hr>
	<h3> Elimina foto </h3>
	
	<form action="esitoFotogallery.php?op=canc" method="POST">
	 <fieldset>
	 
	 <div class="row">

		<div class="pull-left col-md-12 col-sm-12 col-xs-12 panel panel-default input-group">
			<div class="panel-heading">
				<label class="control-label" for="txtTitoloDel">Titolo</label>
			</div>
			<div class="panel-body">
				<div class="controls input-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
					<select name="txtTitoloDel" class="form-control" placeholder="Titolo della foto">
					<?php 
					$servername = "localhost";
					$username = "pariopp-owner";
					$password = "pariopp";
					$dbname = "pariopp";

					// Create connection
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					// Check connection
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
					
					$sql = "select nome from media where tipomedia=\"Foto\";";
					$result = mysqli_query($conn, $sql);
					
					while ($row = mysqli_fetch_assoc($result)) {
						echo '<option value="'.$row['nome'].'" > '.$row['nome'].' </option>';
					}
					?>
					</select>
				</div>
			</div>
		</div>
   
	</div>
	 
	  </fieldset>
	  <div class="row">
            <div class="pull-left col-md-5 col-sm-5 col-xs-5"></div>
            <div class="pull-left col-md-2 col-sm-2 col-xs-2"><input type="submit" class="btn btn-default" name="op"
                                                                     value="Elimina foto"></div>
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
            <h3>Torna alla <a href="index.php">videogallery</a></h3></div>
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

<script>
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
</body>

</html>
               
