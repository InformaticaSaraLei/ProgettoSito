<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fotogallery - Informatica sarà lei!</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/informaticasaralei.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
            <h1 class="page-header">Fotogallery</h1>
            <ol class="breadcrumb">
                <li><a href="/index.html">Home</a>
                </li>
                <li class="active">Fotogallery</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <h3> Slideshow </h3>
		
        <div class="embed-responsive embed-responsive-16by9">
            <div style='position: relative; padding-bottom: 51%; height: 0; overflow: hidden;'>
				<iframe id='iframe' src='http://flickrit.com/slideshowholder.php?height=50&size=big&userId=128846442@N03&click=true&thumbnails=0&transition=0&layoutType=responsive&sort=0' scrolling='no' frameborder='0'style='width:100%; height:100%; position: absolute; top:0; left:0;' >
				</iframe>
			</div>
        </div>
    </div>
    <hr>
    <!-- /.row -->
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

    $sql = "select * from media where tipomedia=\"foto\";";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($i % 3 == 0)
                echo '<div class="row">';
            echo '<div class="col-md-4 img-portfolio"">';
            echo '<a href="' . $row['LINK'] . '" title="' . $row['NOME'] . '" target="_blank"><img class="img-responsive img-hover" src="' . $row['LINK'] . '" alt="' . $row['NOME'] . '"></a>' . "<h3><a href=\"" . $row['LINK'] . "\" target=\"_blank\" >" . $row['NOME'] . "</a></h3>";
            echo '</div>';
            $i++;
            if ($i % 3 == 0)
                echo '</div>';
        }

    } else {
        echo "0 results";
    }

    mysqli_close($conn);
    ?>

</div>
<!-- /.container -->

<!-- Footer -->
<div id="footer"></div>
<!--- Inserimento navbar ---->

<!-- End Footer -->

<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>

</body>

</html>
