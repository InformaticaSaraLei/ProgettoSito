<?php
    $page = $_GET['page'];
    $_SESSION['actual-page'] = $page;
?>
<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Erasmus - Informatica sarà lei!</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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
    <script src="../js/jquery.js"></script>
    
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
<div></div>
<!-- Page Content -->
    
<div class="container">
	<div class="row clearfix">
		<div class="col-md-2 column">
            <div class="page-header">
                <ul class="nav nav-pills nav-stacked">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Going Abroad<strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?page=content/going-abroad/why.php">Why?</a></li>
                            <li><a href="index.php?page=content/going-abroad/what-do-I-need.php">What do I need?</a></li>
                            <li><a href="index.php?page=content/going-abroad/what-country.php">What country?</a></li>
                            <li><a href="index.php?page=content/going-abroad/what-about-the-language.php">What about the language?</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?page=content/erasmus-program/erasmus-program.php">Erasmus Program</a>
                    </li>
                    <li>
                        <a href="index.php?page=content/scholarships/scholarships.php">Scholarships</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Experiences<strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?page=content/experiences/experiences-reports.php">Expirences Reports</a></li>
                            <li><a href="index.php?page=content/experiences/gallery.php">Gallery</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?page=content/esn-veneto/esn.php">ESN Veneto</a>
                    </li>
                </ul>
            </div>
		</div>
		<div class="col-md-8 column">
            
            <?php include('content/content-header.php'); ?>
            
            <p>
                <?php
                    if (!empty($page)) {
                        include($page);
                    } 	/* if $page has a value, include it */
                    else {
                        include('content/home.php');
                    } 	/* otherwise, include the default page */
                ?>
            </p>
		</div>
	</div>
    <hr>
</div>    
    

<div class="container">
    <div class="row">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-8">
            
            
        </div>
    </div>
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
