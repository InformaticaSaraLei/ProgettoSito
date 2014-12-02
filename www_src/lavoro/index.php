<?php
error_reporting(0);
session_start();

include "IndeedAPI.php";
include "db_pariopp_offertelavoro.php";


if ($_SESSION["odl_class"] == "") $_SESSION["odl_class"] = "local";

if (($_GET["odl_from"] == "web") || ($_GET["odl_from"] == "local")) {
    $_SESSION["odl_class"] = $_GET["odl_from"];
}
$class = array("local" => "", "web" => "");
$class[$_SESSION["odl_class"]] = "class=\"active\"";

/* ------------------ LOCAL -------------------- */
if ($_SESSION["odl_class"] == "local") {

    if ($_SESSION["llimit"] == "") $_SESSION["llimit"] = 10;
    if ($_SESSION["lstart"] == "") $_SESSION["lstart"] = 0;
    if ($_SESSION["lq"] == "") {
        $_SESSION["q"] = "Informatica";
        $lq_placeholder = "Professione, parole chiave o società";
    } else {
    }
    if ($_SESSION["ll"] == "") {
        $_SESSION["l"] = "Venezia";
        $ll_placeholder = "città, regione o codice postale";
    } else {
    }
    if ($_POST["llimit"] != "") $_SESSION["llimit"] = $_SESSION["llimit"] + 0;
    if ($_GET["lstart"] != "") $_SESSION["lstart"] = $_GET["lstart"] + 0;
    if ($_POST["lq"] != "") $_SESSION["lq"] = $_POST["lq"];
    if ($_POST["ll"] != "") $_SESSION["ll"] = $_POST["ll"];
    $db = new Database();
    $offerte = $db->getOfferteLavoro($_SESSION["lstart"], $_SESSION["llimit"]);
    $content = print_r($offerte, TRUE);

    // print_r($offerte);
}
/* ------------------- /LOCAL ------------------ */
/* -------------------- WEB -------------------- */
if ($_SESSION["odl_class"] == "web") {
    if ($_SESSION["limit"] == "") $_SESSION["limit"] = 10;
    if ($_SESSION["start"] == "") $_SESSION["start"] = 0;
    if ($_SESSION["q"] == "") {
        $_SESSION["q"] = "Informatica";
        $q_placeholder = "Professione, parole chiave o società";
    } else {
    }
    if ($_SESSION["l"] == "") {
        $_SESSION["l"] = "Venezia";
        $l_placeholder = "città, regione o codice postale";
    } else {
    }
    if ($_POST["limit"] != "") $_SESSION["limit"] = $_POST["limit"] + 0;
    if ($_GET["start"] != "") $_SESSION["start"] = $_GET["start"] + 0;
    if ($_POST["q"] != "") $_SESSION["q"] = $_POST["q"];
    if ($_POST["l"] != "") $_SESSION["l"] = $_POST["l"];

    switch ($_GET["mode"]) {
        case "detail";
            /* ----- INDEED CALL ----- */
            $client = new IndeedAPI2("6703735145249700");
            $params = array(
                "jobkeys" => array($_GET["jobkey"])
            );
            $result = $client->jobs($params);
            // print_r($result);
            /* ----- /INDEED CALL ----- */

            $content = "
				<br>
					<div class=\"panel panel-default\">
						<div class=\"panel-heading\">
							<h3 class=\"panel-title\"><b>" . $result["results"][0]["jobtitle"] . " <small style=\"color: #ffffff;\">(" . $result["results"][0]["formattedRelativeTime"] . ")</small></b></h3>
							
						</div>
						<div class=\"panel-body\"><span class=\"label label-success pull-right\">Offerta pubblicata su " . $result["results"][0]["source"] . "</span>
							<h4>" . strtoupper($result["results"][0]["company"]) . "<br>" . $result["results"][0]["formattedLocation"] . "</h4><br>
							" . $result["results"][0]["snippet"] . "
							<br><br>
							<a href=\"" . $result["results"][0]["url"] . "\" class=\"btn btn-info pull-right\" role=\"button\">Vedi Annuncio Originale</a><br><br>
							<div id=\"map-canvas\" class=\"embed-responsive embed-responsive-4by3\"></div>
						</div>
					</div>
								
							";
            $pagination = "";
            break;
        default:
            /* ------------- INDEED --------------- */
            $indeedAPI = new IndeedAPI("6703735145249700");
            $indeedAPI->setDefaultParams(array(
                'co' => 'it'
            ));
            // print_r($_POST);
            // Pass in more options
            $output = $indeedAPI->query(array(
                'q' => '' . $_SESSION["q"] . '',
                'l' => '' . $_SESSION["l"] . '',
                'start' => $_SESSION["start"],
                'limit' => $_SESSION["limit"],
                'sort' => 'date'

            ));
            // print_r($output);

            /* ----- PAGINATION ----- */
            $totalResults = $output->totalResults;
            $paginationPages = ceil($totalResults / $_SESSION["limit"]);
            $currentPage = $_SESSION["start"] / $_SESSION["limit"];

            for ($page = 1; $page <= $paginationPages; $page++) {
                if ($currentPage == ($page - 1))
                    $pagination .= "<li class=\"active\"><a href=\"index.php?start=" . (($page - 1) * $_SESSION["limit"]) . "#navigation_bar\">" . $page . "</a></li>";
                else
                    $pagination .= "<li><a href=\"index.php?start=" . (($page - 1) * $_SESSION["limit"]) . "#navigation_bar\">" . $page . "</a></li>";
            }
            $paginationBlock = "
				
				";
            /* ----- /PAGINATION ----- */


            foreach ($output->results as $jobOpportunity) {
                $content .= "
				<br>
					<div class=\"panel panel-default\">
						<div class=\"panel-heading\">
							<h3 class=\"panel-title\"><b>" . $jobOpportunity->jobtitle . " <small style=\"color: #ffffff;\">(" . $jobOpportunity->formattedRelativeTime . ")</small></b></h3>
						</div>
						<div class=\"panel-body\">
							<h4>" . strtoupper($jobOpportunity->company) . "<br>" . $jobOpportunity->formattedLocation . "</h4><br>
							" . $jobOpportunity->snippet . "
							<br><br>
							 <a href=\"index.php?mode=detail&jobkey=" . $jobOpportunity->jobkey . "\" class=\"btn btn-info  pull-right\" role=\"button\">Vedi Dettaglio Annuncio</a><!-- <a href=\"" . $jobOpportunity->url . "\" class=\"btn btn-default pull-right\" role=\"button\">Vedi Annuncio Originale</a> -->
						</div>
						
			
			
					</div>
					";
            }
            break;
    }
    /* ------------- INDEED --------------- */
}
/* -------------------- /WEB -------------------- */

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lavoro - Informatica sarà lei!</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Google Maps -->
    <style>
        #map-canvas {

        }
    </style>

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
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
        function initialize() {
            var mapCanvas = document.getElementById('map-canvas');
            var mapOptions = {
                center: new google.maps.LatLng(<?php echo $result["results"][0]["latitude"] ?>, <?php echo $result["results"][0]["longitude"] ?>),
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var myLatlng = new google.maps.LatLng(<?php echo $result["results"][0]["latitude"] ?>, <?php echo $result["results"][0]["longitude"] ?>);
            var map = new google.maps.Map(mapCanvas, mapOptions);
            var image = 'marker.png';
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: "<?php echo $result["results"][0]["jobtitle"]; ?>",
                icon: image
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
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
            <h1 class="page-header">Lavoro
                <small>Opportunità e annunci a portata di mano ...</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../index.html">Home</a>
                </li>
                <li class="active">Lavoro</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <form class="navbar-form navbar-left" role="search" method="POST">
                <div class="form-group">
                    <input id="q" name="q" type="text" class="form-control" placeholder="<?php echo $q_placeholder; ?>"
                           value="<?php echo $_SESSION["q"]; ?>">
                    <input id="l" name="l" type="text" class="form-control" placeholder="<?php echo $l_placeholder; ?>"
                           value="<?php echo $_SESSION["l"]; ?>">
                </div>
                <button type="submit" class="btn btn-default">Cerca</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-tabs">
                <li role="presentation" <?php echo $class["local"]; ?>><a href="index.php?odl_from=local">Opportunità
                        dalla nostra redazione</a></li>
                <li role="presentation" <?php echo $class["web"]; ?>><a href="index.php?odl_from=web">Opportunità dal
                        web</a></li>
            </ul>
        </div>
    </div>
    <!-- /.row -->
    <!-- Content Row -->
    <div class="row">
        <div id="pagination" class="col-lg-12 text-center">
            <?php if ($pagination != "") : ?>
                <ul class="pagination pagination-sm">
                    <li><a href="index.php?start=0#navigation_bar"><span
                                class="glyphicon glyphicon-fast-backward"></span></a></li>
                    <li>
                        <a href="<?php if ($currentPage > 1) echo "index.php?start=" . ($currentPage - 1) * $_SESSION["limit"]; ?>"><span
                                class="glyphicon glyphicon-step-backward"></span></a></li>
                    <?php echo $pagination; ?>
                    <li>
                        <a href="<?php if ($currentPage < ($paginationPages - 1)) echo "index.php?start=" . ($currentPage + 1) * $_SESSION["limit"]; ?>#navigation_bar"><span
                                class="glyphicon glyphicon-step-forward"></span></a></li>
                    <li>
                        <a href="index.php?start=<?php echo ($paginationPages - 1) * $_SESSION["limit"] ?>#navigation_bar"><span
                                class="glyphicon glyphicon-fast-forward"></span></a></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    <!-- /.row -->
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <?php echo $content; ?>
        </div>
    </div>
    <!-- /.row -->
    <!-- Content Row -->
    <div class="row">
        <div id="pagination2" class="col-lg-12 text-center">
            <?php if ($pagination != "") : ?>
                <ul class="pagination pagination-sm">
                    <li><a href="index.php?start=0#navigation_bar"><span
                                class="glyphicon glyphicon-fast-backward"></span></a></li>
                    <li>
                        <a href="<?php if ($currentPage > 1) echo "index.php?start=" . ($currentPage - 1) * $_SESSION["limit"]; ?>"><span
                                class="glyphicon glyphicon-step-backward"></span></a></li>
                    <?php echo $pagination; ?>
                    <li>
                        <a href="<?php if ($currentPage < ($paginationPages - 1)) echo "index.php?start=" . ($currentPage + 1) * $_SESSION["limit"]; ?>#navigation_bar"><span
                                class="glyphicon glyphicon-step-forward"></span></a></li>
                    <li>
                        <a href="index.php?start=<?php echo ($paginationPages - 1) * $_SESSION["limit"] ?>#navigation_bar"><span
                                class="glyphicon glyphicon-fast-forward"></span></a></li>
                </ul>
            <?php endif; ?>
        </div>

    </div>
    <!-- /.row -->
    <br>
    <!-- .Share Icons -->
    <span class='st_sharethis_large pull-right' displayText='ShareThis'></span>
    <span class='st_facebook_large pull-right' displayText='Facebook'></span>
    <span class='st_twitter_large pull-right' displayText='Tweet'></span>
    <span class='st_linkedin_large pull-right' displayText='LinkedIn'></span>
    <span class='st_pinterest_large pull-right' displayText='Pinterest'></span>
    <span class='st_email_large pull-right' displayText='Email'></span>

    <script type="text/javascript">var switchTo5x = true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({
            publisher: "ur-e18a4005-e3c7-d8a0-fb82-de08e68896d1",
            doNotHash: false,
            doNotCopy: false,
            hashAddressBar: false
        });</script>
    <!-- /.Share Icons -->

    <br>

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