<?php
	error_reporting(0);
	session_start();
	include "IndeedAPI.php";
	include "db_pariopp_offertelavoro.php";
    
	function buildNationOptions($elenco="",$selectedValue=""){
		// print_r($elenco);
		$options="<option value=\"\" selected>Nazione dell'opportunità di lavoro";
		foreach($elenco as $nazione)
			// print_r($nazione);
			if(($selectedValue==$nazione["ID"])||($selectedValue=="" && $nazione["DESCRIZIONE"]=="Italia")){
				// print $selectedValue."==".$nazione["ID"]."<br>";
				$options.="<option value=\"".$nazione["ID"]."\" selected>".$nazione["DESCRIZIONE"];
				}
			else
				$options.="<option value=\"".$nazione["ID"]."\">".$nazione["DESCRIZIONE"];
		return $options;
	}
	
	function buildStatiOptions($elenco="",$selectedValue=""){

		foreach($elenco as $stato)

			if($selectedValue==$stato["ID"]){
				print $selectedValue."==".$stato["ID"]."<br>";
				$options.="<option value=\"".$stato["ID"]."\" selected>".$stato["STATO"];
				}
			else
				$options.="<option value=\"".$stato["ID"]."\">".$stato["STATO"];
		return $options;
	}	
	
	$pagination_prefix="";
	
	if($_SESSION["odl_class"]=="") $_SESSION["odl_class"]="local";
	
	if(($_GET["odl_from"]=="web")||($_GET["odl_from"]=="local")){
	  $_SESSION["odl_class"]=$_GET["odl_from"];
	}
	$class=array("local"=>"","web"=>"");
	$class[$_SESSION["odl_class"]]="class=\"active\"";  

	/* ------------------ LOCAL -------------------- */
	if($_SESSION["odl_class"]=="local"){

		if($_SESSION["llimit"]=="") $_SESSION["llimit"]=10; 
		if($_SESSION["lstart"]=="") $_SESSION["lstart"]=0; 
		if($_SESSION["q"]==""){ $_SESSION["q"]="Informatica"; $lq_placeholder="Professione, parole chiave o società"; } else {}
		if($_SESSION["l"]==""){ $_SESSION["l"]="Venezia"; $ll_placeholder="città, regione o codice postale";} else {}
		if($_POST["llimit"]) $_SESSION["llimit"]=$_SESSION["llimit"]+0;
		if($_GET["lstart"]!="") $_SESSION["lstart"]=$_GET["lstart"]+0;
		if($_POST["q"]!="") $_SESSION["q"]=$_POST["q"];
		if($_POST["l"]!="") $_SESSION["l"]=$_POST["l"];

		$db=new Database();

		switch($_POST["action"]){
			case "insert"  : // ---- insertOpportunita
			                 $_SESSION["action"]="";
							 $_GET["action"]="";
							 $content.="<b>insert<br>";
							 $db->insertOpportunita($_POST);
							 $offerte= $db->getOfferteLavoro($_SESSION["lstart"],$_SESSION["llimit"],$_SESSION["q"]);
							 $totalResults= $db->total_results;
							 // print_r($_POST);
							 break;
			case "update"  : // ---- updateOpportunita
			                 $_SESSION["action"]="";
							 $_GET["action"]="";
							 $content.="<b>update<br>";
							 // print_r($_POST);
							 break;
		    case "delete"  : // ---- deleteOpportunita
			                 $_SESSION["action"]="";
							 $_GET["action"]="";
							 $content.="<b>delete<br>";
							 break;
		} 
		// print $_GET["action"]; 
		switch($_GET["action"]){
			case "update"  : $_SESSION["action"]="update";
							 $offerta=$db->getOffertaLavoro($_GET["jobkey"]);
							 $action_to_do=true;
							 break;
			case "insert"  : $_SESSION["action"]="insert";
							 $action_to_do=true;
							 
							 break;
			case "delete"  : $_SESSION["action"]="delete";
							 $action_to_do=false;
							 break;
			default        : $action_to_do=false;
			                 $_SESSION["action"]="list";
							 
							 break;
		}

		$offerte= $db->getOfferteLavoro($_SESSION["lstart"],$_SESSION["llimit"],$_SESSION["q"]);
		$totalResults= $db->total_results;
		$nazioni=$db->getNazioni();
		$stati=$db->getStatiOpportunita();		

		
		
		switch($_GET["admin_mode"]){
			case "0" : $_SESSION["admin_mode"]=0;
			           break;
			case "1" : $_SESSION["admin_mode"]=1;
			           break;
					   
		}
		// echo $_SESSION["admin_mode"];
		if($_SESSION["admin_mode"]==0){
			$content.="<a class=\"btn btn-warning\" type=\"button\" href=\"index.php?admin_mode=1\">ENTRA MODALITA' ADMIN</a>";
		}else{
			$content.="<a class=\"btn btn-success\" type=\"button\" href=\"index.php?admin_mode=0\">TORNA MODALITA' UTENTE</a>";
		}			
		
		
		// print "atd:".$action_to_do;
		if(($_SESSION["action"]!="insert")&& $_SESSION["admin_mode"]){
			$content.="<a class=\"btn btn-success pull-right\" type=\"button\" href=\"index.php?action=insert\">+ INSERISCI OPPORTUNITA'</a>";
		}	
	

	
		

		
		switch($_GET["mode"]){
			case "detail" : $content.="detail"; 
							break;
			default 	  :	break;			
							
		}
		
		if($_SESSION["action"]=="list"){
			$jobOpportunity=""; // print_r($offerte);
			/* ----- PAGINATION ----- */
			
			$paginationPages=ceil($totalResults/$_SESSION["llimit"]);
			$currentPage=$_SESSION["lstart"]/$_SESSION["llimit"];
			// print $totalResults."<br>";
			$pagination_prefix="l";
			// print $paginationPages;
			for($page=1;$page<=$paginationPages;$page++){
			// print $page;
				if($currentPage==($page-1))
					$pagination.="<li class=\"active\"><a href=\"index.php?lstart=".(($page-1)*$_SESSION["llimit"])."#navigation_bar\">".$page."</a></li>";
				else	
					$pagination.="<li><a href=\"index.php?lstart=".(($page-1)*$_SESSION["llimit"])."#navigation_bar\">".$page."</a></li>";
			}
			$paginationBlock="
			
			";
			/* ----- /PAGINATION ----- */						
		
			foreach($offerte as $jobOpportunity){
				// print_r($offerte);
				$content.="
				<br><br>
				<div class=\"panel panel-default\">
					<div class=\"panel-heading\">
						<h3 class=\"panel-title\"><b>".$jobOpportunity["TITOLO_LAVORO"]." <small style=\"color: #ffffff;\">(".$jobOpportunity["DATA_INSERIMENTO"].")</small></b></h3>
					</div>
					<div class=\"panel-body\">
						<h4>".strtoupper($jobOpportunity["AZIENDA_CITTA"])."(". $jobOpportunity["AZIENDA_PROVINCIA"].") - ".$jobOpportunity["FK_NAZIONE"]."</h4><br>
						".$jobOpportunity["SNIPPET_ANNUNCIO"]."
						<br>
						 <a href=\"index.php?odl_from=local&action=update&jobkey=".$jobOpportunity["ID"]."\" class=\"btn btn-warning  \" role=\"button\">Modifica Annuncio</a><a href=\"index.php?odl_from=local&mode=detail&jobkey=".$jobOpportunity["ID"]."\" class=\"btn btn-info  pull-right\" role=\"button\">Vedi Dettaglio Annuncio</a>
					</div>
				</div>
				";		
			}
		}
		
			
        if($action_to_do && $_SESSION["admin_mode"]){
			$map_action_string=array("insert"=>"INSERIMENTO","update"=>"MODIFICA");
		    $content.="<br><br>
					<div class=\"panel panel-default\">
						<div class=\"panel-heading\">
							<h3 class=\"panel-title\">".$map_action_string[$_SESSION["action"]]." OPPORTUNITA'</h3>
						</div>
						<div class=\"panel-body\">
								<form id=\"editform\" class=\"form-horizontal\" role=\"form\" method=\"POST\" action=\"index.php\">
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"TITOLO_LAVORO\" class=\"control-label\">TITOLO</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"TITOLO_LAVORO\" type=\"text\" class=\"form-control\" id=\"TITOLO_LAVORO\" placeholder=\"Titolo opportunità\" value=\"".$offerta["TITOLO_LAVORO"]."\">
									</div>
								  </div>
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"TIPO_CONTRATTO\" class=\"control-label\">CONTRATTO</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"TIPO_CONTRATTO\" type=\"text\" class=\"form-control\" id=\"TIPO_CONTRATTO\" placeholder=\"Tipo contratto\" value=\"".$offerta["TIPO_CONTRATTO"]."\">
									</div>
								  </div>
								  
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"AZIENDA_NOME\" class=\"control-label\">AZIENDA</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"AZIENDA_NOME\" type=\"text\" class=\"form-control\" id=\"AZIENDA_NOME\" placeholder=\"Azienda proponente\" value=\"".$offerta["AZIENDA_NOME"]."\">
									</div>
								  </div>								  
								  
								  
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"FK_NAZIONE\" class=\"control-label\">NAZIONE</label>
									</div>
									<div class=\"col-sm-10\">
									  <select name=\"FK_NAZIONE\" class=\"form-control\" id=\"FK_NAZIONE\" placeholder=\"Nazione\">".buildNationOptions($nazioni,$offerta["FK_NAZIONE"])."</select>
									</div>
								  </div>									  
								  
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"AZIENDA_PROVINCIA\" class=\"control-label\">PROVINCIA</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"AZIENDA_PROVINCIA\" type=\"text\" class=\"form-control\" id=\"AZIENDA_PROVINCIA\" placeholder=\"Provincia\" value=\"".$offerta["AZIENDA_PROVINCIA"]."\">
									</div>
								  </div>									  
						
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"AZIENDA_CITTA\" class=\"control-label\">CITTA</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"AZIENDA_CITTA\" type=\"text\" class=\"form-control\" id=\"AZIENDA_CITTA\" placeholder=\"Città\" value=\"".$offerta["AZIENDA_CITTA"]."\">
									</div>
								  </div>	
						
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"AZIENDA_LATITUDINE\" class=\"control-label\">LATITUDINE</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"AZIENDA_LATITUDINE\" type=\"text\" class=\"form-control\" id=\"AZIENDA_LATITUDINE\" placeholder=\"Latitudine\" value=\"".$offerta["AZIENDA_LATITUDINE"]."\">
									</div>
								  </div>						
						
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"AZIENDA_LONGITUDINE\" class=\"control-label\">LONGITUDINE</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"AZIENDA_LONGITUDINE\" type=\"text\" class=\"form-control\" id=\"AZIENDA_LONGITUDINE\" placeholder=\"Longitudine\" value=\"".$offerta["AZIENDA_LONGITUDINE"]."\">
									</div>
								  </div>												
						
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"CONTATTO_TEL\" class=\"control-label\">TELEFONO</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"CONTATTO_TEL\" type=\"tel\" class=\"form-control\" id=\"CONTATTO_TEL\" placeholder=\"Contatto telefonico\" value=\"".$offerta["CONTATTO_TEL"]."\">
									</div>
								  </div>

								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"CONTATTO_FAX\" class=\"control-label\">CONTATTO FAX</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"CONTATTO_FAX\" type=\"text\" class=\"form-control\" id=\"CONTATTO_FAX\" placeholder=\"Contatto fax\" value=\"".$offerta["CONTATTO_FAX"]."\">
									</div>
								  </div>								  
						
								  <div class=\"form-group\">
									<div class=\"col-sm-2\">
									  <label for=\"CONTATTO_EMAIL\" class=\"control-label\">EMAIL</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"CONTATTO_EMAIL\" type=\"email\" class=\"form-control\" id=\"CONTATTO_EMAIL\" placeholder=\"Email di contatto\" value=\"".$offerta["CONTATTO_EMAIL"]."\">
									</div>
								  </div>
								  
								  
								  <div class=\"form-group\">
									<div class=\"col-sm-2\">
									  <label for=\"FONTE_DESCR\" class=\"control-label\">FONTE</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"FONTE_DESCR\" type=\"text\" class=\"form-control\" id=\"FONTE_DESCR\" placeholder=\"Fonte\" value=\"".$offerta["FONTE_DESCR"]."\">
									</div>
								  </div>
								  
								  <div class=\"form-group\">
									<div class=\"col-sm-2\">
									  <label for=\"FONTE_LINK\" class=\"control-label\">LINK ALLA FONTE</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"FONTE_LINK\" type=\"url\" class=\"form-control\" id=\"FONTE_LINK\" placeholder=\"Link alla fonte\" value=\"".$offerta["FONTE_LINK"]."\">
									</div>
								  </div>							  
								  
								  <div class=\"form-group\">
									<div class=\"col-sm-2\">
									  <label for=\"SNIPPET_ANNUNCIO\" class=\"control-label\">ESTRATTO ANNUNCIO</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"SNIPPET_ANNUNCIO\" type=\"text\" class=\"form-control\" id=\"SNIPPET_ANNUNCIO\" placeholder=\"Estratto dell'annuncio\" value=\"".$offerta["SNIPPET_ANNUNCIO"]."\">
									</div>
								  </div>							  
								  
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"FK_STATO_OFFERTA\" class=\"control-label\">STATO OFFERTA</label>
									</div>
									<div class=\"col-sm-10\">
									  <select name=\"FK_STATO_OFFERTA\" id=\"FK_STATO_OFFERTA\" class=\"form-control\" id=\"FK_STATO_OFFERTA\" placeholder=\"Stato offerta\">".buildStatiOptions($stati,$offerta["FK_STATO_OFFERTA"])."</select>
									</div>
								  </div>								  
								  
								  
								  <div class=\"form-group\">
									<div class=\"col-sm-offset-2 col-sm-10\">
									  <button id=\"btnsubmit\" type=\"submit\" class=\"btn btn-warning pull-right\" draggable=\"true\">Salva</button>
									 
									
									</div>
								  </div>
								  
								  
								  <input type=\"hidden\" id=\"action\" name=\"action\" value=\"".$_SESSION["action"]."\">
								  <input type=\"hidden\" id=\"ID\" name=\"ID\" value=\"".$_GET["jobkey"]."\">
								</form>
							</div>
						</div>	

					 			
			";
		
		
		
		
		
		
		}		
		// $content.=print_r($offerte,TRUE);
		
		// print_r($offerte);
	}
	/* ------------------- /LOCAL ------------------ */
	/* -------------------- WEB -------------------- */
	if($_SESSION["odl_class"]=="web"){
		if($_SESSION["limit"]=="") $_SESSION["limit"]=10; 
		if($_SESSION["start"]=="") $_SESSION["start"]=0; 
		if($_SESSION["q"]==""){ $_SESSION["q"]="Informatica"; $q_placeholder="Professione, parole chiave o società"; } else {}
		if($_SESSION["l"]==""){ $_SESSION["l"]="Venezia"; $l_placeholder="città, regione o codice postale";} else {}
		if($_POST["limit"]!="") $_SESSION["limit"]=$_POST["limit"]+0;
		if($_GET["start"]!="") $_SESSION["start"]=$_GET["start"]+0;
		if($_POST["q"]!="") $_SESSION["q"]=$_POST["q"];
		if($_POST["l"]!="") $_SESSION["l"]=$_POST["l"];
		
		switch($_GET["mode"]){
			case "detail";  
							/* ----- INDEED CALL ----- */ 
							$client = new IndeedAPI2("6703735145249700");
							# print_r($client);
							$params = array(
												"jobkeys" => array($_GET["jobkey"])
											);
							$result = $client->jobs($params);
							 # print_r($result);
							/* ----- /INDEED CALL ----- */		
			
							$content="
				<br>
					<div class=\"panel panel-default\">
						<div class=\"panel-heading\">
							<h3 class=\"panel-title\"><b>".$result->jobtitle." <small style=\"color: #ffffff;\">(".$result->formattedRelativeTime.")</small></b></h3>
							
						</div>
						<div class=\"panel-body\"><span class=\"label label-success pull-right\">Offerta pubblicata su ".$result->source."</span>
							<h4>".strtoupper($result->company)."<br>". $result->formattedLocation."</h4><br>
							".$result->snippet."
							<br><br>
							<a href=\"".$result->url."\" class=\"btn btn-info pull-right\" role=\"button\">Vedi Annuncio Originale</a><br><br>
							<div id=\"map-canvas\" class=\"embed-responsive embed-responsive-4by3\"></div>
						</div>
					</div>
								
							";
						   $pagination="";
						   break;
			default:
					/* ------------- INDEED --------------- */	
				$indeedAPI = new IndeedAPI( "6703735145249700" );
				$indeedAPI->setDefaultParams( array(
					'co' => 'it'
				) );
				// print_r($_POST);
				// Pass in more options
				$output = $indeedAPI->query(array(
					'q' => ''.$_SESSION["q"].'',
					'l' => ''.$_SESSION["l"].'',
					'start' => $_SESSION["start"],
					'limit' => $_SESSION["limit"],
					'sort' => 'date'
					 
				));
				// print_r($output);

				/* ----- PAGINATION ----- */
				$totalResults=$output->totalResults;
				$paginationPages=ceil($totalResults/$_SESSION["limit"]);
				$currentPage=$_SESSION["start"]/$_SESSION["limit"];
				
				for($page=1;$page<=$paginationPages;$page++){
					if($currentPage==($page-1))
						$pagination.="<li class=\"active\"><a href=\"index.php?start=".(($page-1)*$_SESSION["limit"])."#navigation_bar\">".$page."</a></li>";
					else	
						$pagination.="<li><a href=\"index.php?start=".(($page-1)*$_SESSION["limit"])."#navigation_bar\">".$page."</a></li>";
				}
				$paginationBlock="
				
				";
				/* ----- /PAGINATION ----- */
				
				
				foreach($output->results as $jobOpportunity){
					$content.="
				<br>
					<div class=\"panel panel-default\">
						<div class=\"panel-heading\">
							<h3 class=\"panel-title\"><b>".$jobOpportunity->jobtitle." <small style=\"color: #ffffff;\">(".$jobOpportunity->formattedRelativeTime.")</small></b></h3>
						</div>
						<div class=\"panel-body\">
							<h4>".strtoupper($jobOpportunity->company)."<br>". $jobOpportunity->formattedLocation."</h4><br>
							".$jobOpportunity->snippet."
							<br><br>
							 <a href=\"index.php?odl_from=web&mode=detail&jobkey=".$jobOpportunity->jobkey."\" class=\"btn btn-info  pull-right\" role=\"button\">Vedi Dettaglio Annuncio</a>
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
          center: new google.maps.LatLng(<?php echo $result->latitude; ?>, <?php echo $result->longitude; ?>),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
		var myLatlng = new google.maps.LatLng(<?php echo $result->latitude; ?>,<?php echo $result->longitude; ?>);
        var map = new google.maps.Map(mapCanvas, mapOptions);
		var image = 'marker.png';
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title:"<?php echo $result->jobtitle; ?>",
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
				<input id="q" name="q" type="text" class="form-control" placeholder="<?php echo $q_placeholder; ?>" value="<?php echo $_SESSION["q"];?>">
				<input id="l" name="l" type="text" class="form-control" placeholder="<?php echo $l_placeholder; ?>" value="<?php echo $_SESSION["l"];?>">
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
				<li role="presentation" <?php echo $class["local"]; ?>><a href="index.php?odl_from=local">Opportunità dalla nostra redazione</a></li>
				<li role="presentation" <?php echo $class["web"]; ?>><a href="index.php?odl_from=web">Opportunità dal web</a></li>
			</ul>
        </div>
    </div>
    <!-- /.row -->
	<!-- Content Row -->
	<div class="row">
        <div  id="pagination"  class="col-lg-12 text-center">		
			<?php if($pagination!="") : ?>
			<ul class="pagination pagination-sm">
			  <li><a href="index.php?<?php echo $pagination_prefix;?>start=0#navigation_bar"><span class="glyphicon glyphicon-fast-backward"></span></a></li>
			  <li><a href="<?php if($currentPage>1) echo "index.php?".$pagination_prefix."start=".($currentPage-1)*$_SESSION[$pagination_prefix."limit"]; ?>"><span class="glyphicon glyphicon-step-backward"></span></a></li>
			  <?php echo $pagination; ?>
			  <li><a href="<?php if($currentPage<($paginationPages-1)) echo "index.php?".$pagination_prefix."start=".($currentPage+1)*$_SESSION[$pagination_prefix."limit"]; ?>#navigation_bar"><span class="glyphicon glyphicon-step-forward"></span></a></li>
			  <li><a href="index.php?<?php echo $pagination_prefix;?>start=<?php echo ($paginationPages-1)*$_SESSION[$pagination_prefix."limit"] ?>#navigation_bar"><span class="glyphicon glyphicon-fast-forward"></span></a></li>
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
    <div  id="pagination2"  class="col-lg-12 text-center">		
			<?php if($pagination!="") : ?>
			<ul class="pagination pagination-sm">
			  <li><a href="index.php?<?php echo $pagination_prefix;?>start=0#navigation_bar"><span class="glyphicon glyphicon-fast-backward"></span></a></li>
			  <li><a href="<?php if($currentPage>1) echo "index.php?".$pagination_prefix."start=".($currentPage-1)*$_SESSION[$pagination_prefix."limit"]; ?>"><span class="glyphicon glyphicon-step-backward"></span></a></li>
			  <?php echo $pagination; ?>
			  <li><a href="<?php if($currentPage<($paginationPages-1)) echo "index.php?".$pagination_prefix."start=".($currentPage+1)*$_SESSION[$pagination_prefix."limit"]; ?>#navigation_bar"><span class="glyphicon glyphicon-step-forward"></span></a></li>
			  <li><a href="index.php?<?php echo $pagination_prefix;?>start=<?php echo ($paginationPages-1)*$_SESSION[$pagination_prefix."limit"] ?>#navigation_bar"><span class="glyphicon glyphicon-fast-forward"></span></a></li>
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

	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "ur-e18a4005-e3c7-d8a0-fb82-de08e68896d1", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
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

<!-- bootbox code -->
<script src="./bootbox.min.js"></script>
<script>


$(function() {
            $("#btnsubmit").on("click", function(e) {
                e.preventDefault();
                var _this = this;
                bootbox.confirm("Sei Sicuro di voler salvare?", function(result) {
                    if (result) {
					    $('#editform').submit();
                        // $(_this).parent().submit();
                    }
                });
            });
        });

</script>

</body>

</html>
