<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashbord</title>

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
        <div class="row">
            <br><br>
            <div class="col-lg-12  align-center">
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="col-xs-12">Dettagli del profilo</div>
                    <div class="col-xs-12">
                        <a href="/admin/profile.php" class="btn btn-default">Profilo</a><br><br>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="col-xs-12">Gestione degli eventi</div>
                    <div class="col-xs-12">
                        <a href="/admin/eventi.php" class="btn btn-default">Eventi</a><br><br>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="col-xs-12">Gestione della fotogallery</div>
                    <div class="col-xs-12">
                        <a href="/admin/fotogallery.php" class="btn btn-default">Fotogallery</a><br><br>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="col-xs-12">Gestione della videogalery</div>
                    <div class="col-xs-12">
                        <a href="/admin/videogallery.php" class="btn btn-default">Videogallery</a><br><br>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="col-xs-12">Gestione della sezione lavoro</div>
                    <div class="col-xs-12">
                        <a href="../lavoro/index.php" class="btn btn-default">Lavoro</a><br><br>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="col-xs-12">Breve descrizione</div>
                    <div class="col-xs-12">
                        <a href="#" class="btn btn-default">Bottone</a><br><br>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="col-xs-12">Logout</div>
                    <div class="col-xs-12">
                        <a href="/admin/logout.php" class="btn btn-default">Logout</a><br><br>
                    </div>
                </div>
                <br><br>
            </div>
            <br>
        </div>
    </div>
<br><br>
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
