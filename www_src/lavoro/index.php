﻿<?php
error_reporting(1);
session_start();
include "IndeedAPI.php";
include "db_pariopp_offertelavoro.php";

 
$translations = array(
    "update" => "Modifica",
    "insert" => "Inserisci"
);


function buildNationOptions($elenco = "", $selectedValue = "")
{
    // print_r($elenco);
    $options = "<option value=\"\" selected>Nazione dell'opportunità di lavoro";
    foreach ($elenco as $nazione)
        // print_r($nazione);
        if (($selectedValue == $nazione["ID"]) || ($selectedValue == "" && $nazione["DESCRIZIONE"] == "Italia")) {
            // print $selectedValue."==".$nazione["ID"]."<br>";
            $options .= "<option value=\"" . $nazione["ID"] . "\" selected>" . $nazione["DESCRIZIONE"];
        } else
            $options .= "<option value=\"" . $nazione["ID"] . "\">" . $nazione["DESCRIZIONE"];
    return $options;
}

function buildStatiOptions($elenco = "", $selectedValue = "")
{

    foreach ($elenco as $stato)

        if ($selectedValue == $stato["ID"]) {
            // print $selectedValue."==".$stato["ID"]."<br>";
            $options .= "<option value=\"" . $stato["ID"] . "\" selected>" . $stato["STATO"];
        } else
            $options .= "<option value=\"" . $stato["ID"] . "\">" . $stato["STATO"];
    return $options;
}

function buildProvinceOptions($selectedValue = "")
{

   $province = array ("%"=>"TUTTE","VE"=>"VE","VR"=>"VR","PD"=>"PD","BL"=>"BL","RO"=>"RO","TV"=>"TV","VI"=>"VI");
   while(list($value,$label)=each($province)){

     if($value==$selectedValue)
		$options.="<option selected value=\"".$value."\">".$label;
	 else
      	$options.="<option value=\"".$value."\">".$label;
   }
   
   return $options;

}

$pagination_prefix = "";

if ($_SESSION["odl_class"] == "") $_SESSION["odl_class"] = "local";

if (($_GET["odl_from"] == "web") || ($_GET["odl_from"] == "local")) {
    $_SESSION["odl_class"] = $_GET["odl_from"];
}
$class = array("local" => "", "web" => "");
$class[$_SESSION["odl_class"]] = "class=\"active\"";
$_SESSION["odl_from"] = $_SESSION["odl_class"];

/* ------------------ LOCAL -------------------- */
if ($_SESSION["odl_class"] == "local") {

    if ($_SESSION["llimit"] == "") $_SESSION["llimit"] = 10;
    if ($_SESSION["lstart"] == "") $_SESSION["lstart"] = 0;
    if ($_SESSION["q"] == "") {
        $_SESSION["q"] = "Informatica";
        $lq_placeholder = "Professione, parole chiave o società";
    } else {
    }
    if ($_SESSION["l"] == "") {
        $_SESSION["l"] = "%"; //
        $ll_placeholder = "città, regione o codice postale";
    } else {
    }
    if ($_POST["llimit"]) $_SESSION["llimit"] = $_SESSION["llimit"] + 0;
    if ($_GET["lstart"] != "") $_SESSION["lstart"] = $_GET["lstart"] + 0;
    if ($_POST["q"] != "") $_SESSION["q"] = $_POST["q"];
    if ($_POST["l"] != "") $_SESSION["l"] = $_POST["l"];

    $db = new Database();

    if (isset($_SESSION['login']))
        $loggato = true;

    if ($db->isAdmin($_SESSION['login']) != "") {
        $isAdmin = true;
        $_SESSION["admin_mode"] = true;
    } else unset($_SESSION["admin_mode"]);


    switch ($_POST["action"]) {
        case "insert"  : // ---- insertOpportunita
            $_SESSION["action"] = "";
            $_GET["action"] = "";
            // $content.="<b>insert<br>";
            $db->insertOpportunita($_POST);
            $offerte = $db->getOfferteLavoro($_SESSION["lstart"], $_SESSION["llimit"], $_SESSION["q"], $_SESSION["l"], $isAdmin);
            $totalResults = $db->total_results;
            // print_r($_POST);
            break;
        case "update"  : // ---- updateOpportunita
            $_SESSION["action"] = "";
            $_GET["action"] = "";
            $db->updateOpportunita($_POST);
            // $content.="<b>update<br>";
            // print_r($_POST);
            break;
        case "delete"  : // ---- deleteOpportunita
            $_SESSION["action"] = "";
            $_GET["action"] = "";
            // $content.="<b>delete<br>";
            break;
        case "search"  :
            $_SESSION["odl_from"] = "local";
            $_GET["odl_from"] = "local";
            $_GET["action"] = "";
            $_GET["mode"] = "";
            // $content.="<b>search<br>";
            break;
    }


    // print $_GET["action"];
    switch ($_GET["action"]) {
        case "update"  :
            $_SESSION["action"] = "update";
            $offerta = $db->getOffertaLavoro($_GET["jobkey"]);
            $action_to_do = true;
            break;
        case "insert"  :
            $_SESSION["action"] = "insert";
            $action_to_do = true;
            break;
        case "delete"  :
            $_SESSION["action"] = "delete";
            $action_to_do = false;
            break;
        default        :
            $action_to_do = false;
            $_SESSION["action"] = "list";

            break;
    }


    $offerte = $db->getOfferteLavoro($_SESSION["lstart"], $_SESSION["llimit"], $_SESSION["q"], $_SESSION["l"], $isAdmin);
    $totalResults = $db->total_results;
    $nazioni = $db->getNazioni();
    $stati = $db->getStatiOpportunita();


    if (($_SESSION["action"] != "insert") && $_SESSION["admin_mode"]) {
        $content .= "<br><a class=\"btn btn-success pull-right\" type=\"button\" href=\"index.php?action=insert\">+ INSERISCI OPPORTUNITA'</a><br><br><br>";
    }


    switch ($_GET["mode"]) {
        case "detail" : // $content.="detail";
            $_SESSION["action"] = "detail";
            $action_to_do = 0;
            $offerta = $db->getOffertaLavoro($_GET["jobkey"]);
            $json_string = "{ \"version\" : 2, \"results\" : [ { \"jobtitle\" : \"\", \"company\" : \"\", \"city\" : \"\", \"state\" : \"\", \"country\" : \"\", \"formattedLocation\" : \"\", \"source\" : \"\", \"date\" : \"\", \"snippet\" : \"\", \"url\" : \"\", \"onmousedown\" : \"\", \"latitude\" : 45.46154, \"longitude\" : 9.186813, \"jobkey\" : \"\", \"sponsored\" : false, \"expired\" : false, \"indeedApply\" : false, \"formattedLocationFull\" : \"\", \"formattedRelativeTime\" : \"\", \"recommendations\": [] } ] }";
            $obj_tmp = json_decode($json_string);
            $result = $obj_tmp->results[0];
            $result->jobtitle = $offerta["TITOLO_LAVORO"];

            $result->company = $offerta["AZIENDA_NOME"];
            $result->formattedRelativeTime = $offerta["DATA_INSERIMENTO"];
            $result->formattedLocation = $offerta["AZIENDA_CITTA"] . " (" . $offerta["AZIENDA_PROVINCIA"] . ")";
            $result->snippet = $offerta["SNIPPET_ANNUNCIO"];
            $result->latitude = $offerta["AZIENDA_LATITUDINE"];
            $result->longitude = $offerta["AZIENDA_LONGITUDINE"];
            $result->source = $offerta["FONTE_DESCR"];
			
			$result->source_link = $offerta["FONTE_LINK"];
			$result->contatto_tel = $offerta["CONTATTO_TEL"];
			$result->contatto_fax = $offerta["CONTATTO_FAX"];
			$result->contatto_email = $offerta["CONTATTO_EMAIL"];
								
            $content .= "
				
					<div class=\"panel panel-default\">
						<div class=\"panel-heading\">
							<h3 class=\"panel-title\"><b>" . $result->jobtitle . " <small style=\"color: #ffffff;\">(" . $result->formattedRelativeTime . ")</small></b></h3>
							
						</div>
						<div class=\"panel-body\"><span class=\"label label-success pull-right\">Offerta pubblicata su " . $result->source . "</span>
							<h4>" . strtoupper($result->company) . "<br>" . $result->formattedLocation . "</h4><br>
							" . $result->snippet . "<br><br>";
							
						if($result->contatto_email!="") $content.="
						<div class=\"input-group\">
						  <span class=\"input-group-addon label-detail\" id=\"label-detail1\">CONTATTO EMAIL</span>
						  
						  <a href=\"mailto:".$result->contatto_email."\"><button type=\"button\" class=\"btn btn-default\">".$result->contatto_email."</button></a>
						</div>
						";
						if($result->contatto_tel!="") $content.="
						<div class=\"input-group\">
						  <span class=\"input-group-addon label-detail\" id=\"label-detail2\">CONTATTO TEL.</span>
						  <button type=\"button\" class=\"btn btn-default\">".$result->contatto_tel."</button>
						</div>
						";
						if($result->contatto_fax!="") $content.="
						<div class=\"input-group\">
						  <span class=\"input-group-addon label-detail\" id=\"label-detail3\">CONTATTO FAX</span>
						  <button type=\"button\" class=\"btn btn-default\">".$result->contatto_fax."</button>
						</div>
						";
				
				
				
            if ($_SESSION['admin_mode'])
                $content .= "
						 <br>
						 <a href=\"index.php?odl_from=local&action=update&jobkey=" . $offerta["ID"] . "\" class=\"btn btn-warning  \" role=\"button\">Modifica Annuncio</a>
						 
						 ";
            if ($offerta["FONTE_LINK"] != "")
                $content .= "<a href=\"" . $offerta["FONTE_LINK"] . "\" class=\"btn btn-info pull-right\" role=\"button\" target=\"_blank\">Vedi Annuncio Originale pubblicato da " . $offerta["FONTE_DESCR"] . "</a><br><br>";

            if ($result->latitude != "" && $result->longitude != "")
                $content .= "<div id=\"map-canvas\" class=\"embed-responsive embed-responsive-4by3\"></div>";
            $content .= "
						</div>
					</div>
															
							";
            break;
        default      :
            break;

    }

    if ($_SESSION["action"] == "list") {
        $jobOpportunity = ""; // print_r($offerte);
        /* ----- PAGINATION ----- */

        $paginationPages = ceil($totalResults / $_SESSION["llimit"]);
        $currentPage = $_SESSION["lstart"] / $_SESSION["llimit"];
        // print $totalResults."<br>";
        $pagination_prefix = "l";
        // print $paginationPages;
        for ($page = 1; $page <= $paginationPages; $page++) {
            // print $page;
            if ($currentPage == ($page - 1))
                $pagination .= "<li class=\"active\"><a href=\"index.php?lstart=" . (($page - 1) * $_SESSION["llimit"]) . "#navigation_bar\">" . $page . "</a></li>";
            else
                $pagination .= "<li><a href=\"index.php?lstart=" . (($page - 1) * $_SESSION["llimit"]) . "#navigation_bar\">" . $page . "</a></li>";
        }
        $paginationBlock = "
			
			";
        /* ----- /PAGINATION ----- */

        foreach ($offerte as $jobOpportunity) {
            // print_r($offerte);
            $content .= "
				<div class=\"panel panel-default\">
					<div class=\"panel-heading\">
						<h3 class=\"panel-title\"><b>" . $jobOpportunity["TITOLO_LAVORO"] . " <small style=\"color: #ffffff;\">(" . $jobOpportunity["DATA_INSERIMENTO"] . ")</small></b></h3>
					</div>
					<div class=\"panel-body\">
						<h4>" . strtoupper($jobOpportunity["AZIENDA_CITTA"]) . "(" . $jobOpportunity["AZIENDA_PROVINCIA"] . ") - " . $jobOpportunity["FK_NAZIONE"] . "</h4><br>
						" . str_replace("\n","<br>",$jobOpportunity["SNIPPET_ANNUNCIO"]) . "<br>";
            if ($_SESSION['admin_mode'])
                $content .= "
						<br>
						 <a href=\"index.php?odl_from=local&action=update&jobkey=" . $jobOpportunity["ID"] . "\" class=\"btn btn-warning  \" role=\"button\">Modifica Annuncio</a>
						 ";
            $content .= "<a href=\"index.php?odl_from=local&mode=detail&jobkey=" . $jobOpportunity["ID"] . "\" class=\"btn btn-info  pull-right\" role=\"button\">Vedi Dettaglio Annuncio</a>
						
					</div>
				</div>
				";
        }
		if(!$totalResults){
		  $content.="<br><br><button type=\"button\" class=\"btn btn-warning btn-lg center-block\">
  <span class=\"glyphicon glyphicon-alert\" aria-hidden=\"true\"></span> Spiacenti: la ricerca effettuata non ha prodotto risultati.
</button>";
		}
		
		
    }


    if ($action_to_do && $_SESSION['admin_mode']) {
        $map_action_string = array("insert" => "INSERIMENTO", "update" => "MODIFICA");
        $content .= "
					<div class=\"panel panel-default\">
						<div class=\"panel-heading\">
							<h3 class=\"panel-title\">" . $map_action_string[$_SESSION["action"]] . " OPPORTUNITA'</h3>
						</div>
						<div class=\"panel-body\">
								<form id=\"editform\" class=\"form-horizontal\" role=\"form\" method=\"POST\" action=\"index.php\">
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"TITOLO_LAVORO\" class=\"control-label\">TITOLO</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"TITOLO_LAVORO\" type=\"text\" class=\"form-control\" id=\"TITOLO_LAVORO\" placeholder=\"Titolo opportunità\" value=\"" . htmlentities($offerta["TITOLO_LAVORO"]) . "\">
									</div>
								  </div>
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"TIPO_CONTRATTO\" class=\"control-label\">CONTRATTO</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"TIPO_CONTRATTO\" type=\"text\" class=\"form-control\" id=\"TIPO_CONTRATTO\" placeholder=\"Tipo contratto\" value=\"" . htmlentities($offerta["TIPO_CONTRATTO"]) . "\">
									</div>
								  </div>
								  
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"AZIENDA_NOME\" class=\"control-label\">AZIENDA</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"AZIENDA_NOME\" type=\"text\" class=\"form-control\" id=\"AZIENDA_NOME\" placeholder=\"Azienda proponente\" value=\"" . htmlentities($offerta["AZIENDA_NOME"]) . "\">
									</div>
								  </div>								  
								  
								  
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"FK_NAZIONE\" class=\"control-label\">NAZIONE</label>
									</div>
									<div class=\"col-sm-10\">
									  <select name=\"FK_NAZIONE\" class=\"form-control\" id=\"FK_NAZIONE\" placeholder=\"Nazione\">" . buildNationOptions($nazioni, $offerta["FK_NAZIONE"]) . "</select>
									</div>
								  </div>									  
								  
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"AZIENDA_PROVINCIA\" class=\"control-label\">PROVINCIA</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"AZIENDA_PROVINCIA\" type=\"text\" class=\"form-control\" id=\"AZIENDA_PROVINCIA\" placeholder=\"Provincia\" value=\"" . htmlentities($offerta["AZIENDA_PROVINCIA"]) . "\">
									</div>
								  </div>									  
						
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"AZIENDA_CITTA\" class=\"control-label\">CITTA</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"AZIENDA_CITTA\" type=\"text\" class=\"form-control\" id=\"AZIENDA_CITTA\" placeholder=\"Città\" value=\"" . htmlentities($offerta["AZIENDA_CITTA"]) . "\">
									</div>
								  </div>	
						
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"AZIENDA_LATITUDINE\" class=\"control-label\">LATITUDINE</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"AZIENDA_LATITUDINE\" type=\"text\" class=\"form-control\" id=\"AZIENDA_LATITUDINE\" placeholder=\"Latitudine\" value=\"" . htmlentities($offerta["AZIENDA_LATITUDINE"]) . "\">
									</div>
								  </div>						
						
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"AZIENDA_LONGITUDINE\" class=\"control-label\">LONGITUDINE</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"AZIENDA_LONGITUDINE\" type=\"text\" class=\"form-control\" id=\"AZIENDA_LONGITUDINE\" placeholder=\"Longitudine\" value=\"" . htmlentities($offerta["AZIENDA_LONGITUDINE"]) . "\">
									</div>
								  </div>												
						
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"CONTATTO_TEL\" class=\"control-label\">TELEFONO</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"CONTATTO_TEL\" type=\"tel\" class=\"form-control\" id=\"CONTATTO_TEL\" placeholder=\"Contatto telefonico\" value=\"" . htmlentities($offerta["CONTATTO_TEL"]) . "\">
									</div>
								  </div>

								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"CONTATTO_FAX\" class=\"control-label\">CONTATTO FAX</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"CONTATTO_FAX\" type=\"text\" class=\"form-control\" id=\"CONTATTO_FAX\" placeholder=\"Contatto fax\" value=\"" . htmlentities($offerta["CONTATTO_FAX"]) . "\">
									</div>
								  </div>								  
						
								  <div class=\"form-group\">
									<div class=\"col-sm-2\">
									  <label for=\"CONTATTO_EMAIL\" class=\"control-label\">EMAIL</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"CONTATTO_EMAIL\" type=\"email\" class=\"form-control\" id=\"CONTATTO_EMAIL\" placeholder=\"Email di contatto\" value=\"" . htmlentities($offerta["CONTATTO_EMAIL"]) . "\">
									</div>
								  </div>
								  
								  
								  <div class=\"form-group\">
									<div class=\"col-sm-2\">
									  <label for=\"FONTE_DESCR\" class=\"control-label\">FONTE</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"FONTE_DESCR\" type=\"text\" class=\"form-control\" id=\"FONTE_DESCR\" placeholder=\"Fonte\" value=\"" . htmlentities($offerta["FONTE_DESCR"]) . "\">
									</div>
								  </div>
								  
								  <div class=\"form-group\">
									<div class=\"col-sm-2\">
									  <label for=\"FONTE_LINK\" class=\"control-label\">LINK ALLA FONTE</label>
									</div>
									<div class=\"col-sm-10\">
									  <input name=\"FONTE_LINK\" type=\"url\" class=\"form-control\" id=\"FONTE_LINK\" placeholder=\"Link alla fonte\" value=\"" . htmlentities($offerta["FONTE_LINK"]) . "\">
									</div>
								  </div>							  
								  
								  <div class=\"form-group\">
									<div class=\"col-sm-2\">
									  <label for=\"SNIPPET_ANNUNCIO\" class=\"control-label\">ESTRATTO ANNUNCIO</label>
									</div>
									<div class=\"col-sm-10\">
									   <textarea  name=\"SNIPPET_ANNUNCIO\"  id=\"SNIPPET_ANNUNCIO\"   class=\"form-control\" rows=\"3\">" . htmlentities($offerta["SNIPPET_ANNUNCIO"]) . "</textarea>
									  <!-- <input name=\"SNIPPET_ANNUNCIO\" type=\"text\" class=\"form-control\" id=\"SNIPPET_ANNUNCIO\" placeholder=\"Estratto dell'annuncio\" value=\"" . htmlentities($offerta["SNIPPET_ANNUNCIO"]) . "\"> -->
									</div>
								  </div>							  
								  
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"FK_STATO_OFFERTA\" class=\"control-label\">STATO OFFERTA</label>
									</div>
									<div class=\"col-sm-10\">
									  <select name=\"FK_STATO_OFFERTA\" id=\"FK_STATO_OFFERTA\" class=\"form-control\" id=\"FK_STATO_OFFERTA\" placeholder=\"Stato offerta\">" . buildStatiOptions($stati, $offerta["FK_STATO_OFFERTA"]) . "</select>
									</div>
								  </div>		
								  
								  <div class=\"form-group\" draggable=\"true\">
									<div class=\"col-sm-2\">
									  <label for=\"TAGS_OFFERTA\" class=\"control-label\">TAGS OFFERTA</label>
									</div>
									<div class=\"col-sm-10\">
										<input name=\"TAG_LIST\"  for=\"TAG_LIST\" id=\"TAG_LIST\" class=\"form-control\" type=\"text\"  value=\"" . htmlentities($offerta["TAG_LIST"]) . "\" data-role=\"tagsinput\">
								    </div>
								  </div>	
								  
								  <div class=\"form-group\">
									<div class=\"col-sm-offset-2 col-sm-10\">
									  <button id=\"btnsubmit\" type=\"submit\" class=\"btn btn-warning pull-right\" draggable=\"true\">" . $translations[$_SESSION["action"]] . "</button>
									 
									
									</div>
								  </div>
								  
								  
								  <input type=\"hidden\" id=\"action\" name=\"action\" value=\"" . $_SESSION["action"] . "\">
								  <input type=\"hidden\" id=\"ID\" name=\"ID\" value=\"" . $_GET["jobkey"] . "\">
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
            # print_r($client);
            $params = array(
                "jobkeys" => array($_GET["jobkey"])
            );
            $result = $client->jobs($params);
            # print_r($result);
            /* ----- /INDEED CALL ----- */

            $content = "
				<br>
					<div class=\"panel panel-default\">
						<div class=\"panel-heading\">
							<h3 class=\"panel-title\"><b>" . $result->jobtitle . " <small style=\"color: #ffffff;\">(" . $result->formattedRelativeTime . ")</small></b></h3>
							
						</div>
						<div class=\"panel-body\"><span class=\"label label-success pull-right\">Offerta pubblicata su " . $result->source . "</span>
							<h4>" . strtoupper($result->company) . "<br>" . $result->formattedLocation . "</h4><br>
							" . $result->snippet . "
							<br><br>
							<a href=\"" . $result->url . "\" class=\"btn btn-info pull-right\" role=\"button\" target=\"_blank\">Vedi Annuncio Originale</a><br><br>
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
			if($_SESSION["l"]=="%") $param_l="VENETO"; else $param_l=$_SESSION["l"];
            $output = $indeedAPI->query(array(
                'q' => '' . $_SESSION["q"] . '',
                'l' => '' . $param_l . '',
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
							 <a href=\"index.php?odl_from=web&mode=detail&jobkey=" . $jobOpportunity->jobkey . "\" class=\"btn btn-info  pull-right\" role=\"button\">Vedi Dettaglio Annuncio</a>
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

	<link rel="icon" href="../img/loghi-ufficiali/logo_icona.ico"/>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/informaticasaralei.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Boostrap Tags Input -->
    <link href="../css/lavoro.css" rel="stylesheet">
	
		
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
            var myLatlng = new google.maps.LatLng(<?php echo $result->latitude; ?>, <?php echo $result->longitude; ?>);
            var map = new google.maps.Map(mapCanvas, mapOptions);
            var image = 'img/marker.png';
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: "<?php echo $result->jobtitle; ?>",
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
                <li><a href="../index.html">Home</a></li>
                <?php if ($_SESSION['admin_mode']==true):?>
                <li><a href="../admin/dashboard.php">Dashboard</a></li>
                <?php endif;?>
                <li class="active">Lavoro</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <!-- Content Row -->
    <div class="row">
	
	
	
        <div class="col-lg-12">
            <form class="navbar-form navbar-left" role="search" method="POST" action="index.php">
				<div class="input-group">
				  <span class="input-group-btn"><button class="btn btn-default" ><b>Cerca</b></button></span>
				  <input id="q" name="q" type="text" class="form-control" placeholder="<?php echo $q_placeholder; ?>" value="<?php echo $_SESSION["q"]; ?>">
				  <span class="input-group-btn"><button type="submit"   class="btn btn-default" >nella provincia di </button></span>
				  <select id="l" name="l" class="form-control"><?php echo buildProvinceOptions($_SESSION["l"]);  ?></select>
				  <span class="input-group-btn"><button type="submit"   class="btn btn-default" > <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button></span>
				  <!-- <input id="l" name="l" type="text" class="form-control" placeholder="Provincia" value="<?php echo $_SESSION["l"]; ?>"> -->
				  <input id="action" name="action" type="hidden" value="search" class="form-control">
				  <!-- nella Provincia di <select><option>VE<option>VR<option>VI</select> -->
				</div><!-- /input-group -->			
			
			<!--
                <div class="form-group">
                   <input id="q" name="q" type="text" class="form-control" placeholder="<?php echo $q_placeholder; ?>" value="<?php echo $_SESSION["q"]; ?>">
                    <input id="l" name="l" type="text" class="form-control" placeholder="<?php echo $l_placeholder; ?>" value="<?php echo $_SESSION["l"]; ?>">
                    <input id="action" name="action" type="hidden" value="search" class="form-control">
                </div> 

                <button type="submit" class="btn btn-default">Cerca</button>-->
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
                    <li><a href="index.php?<?php echo $pagination_prefix; ?>start=0#navigation_bar"><span
                                class="glyphicon glyphicon-fast-backward"></span></a></li>
                    <li>
                        <a href="<?php if ($currentPage > 1) echo "index.php?" . $pagination_prefix . "start=" . ($currentPage - 1) * $_SESSION[$pagination_prefix . "limit"]; ?>"><span
                                class="glyphicon glyphicon-step-backward"></span></a></li>
                    <?php echo $pagination; ?>
                    <li>
                        <a href="<?php if ($currentPage < ($paginationPages - 1)) echo "index.php?" . $pagination_prefix . "start=" . ($currentPage + 1) * $_SESSION[$pagination_prefix . "limit"]; ?>#navigation_bar"><span
                                class="glyphicon glyphicon-step-forward"></span></a></li>
                    <li>
                        <a href="index.php?<?php echo $pagination_prefix; ?>start=<?php echo ($paginationPages - 1) * $_SESSION[$pagination_prefix . "limit"] ?>#navigation_bar"><span
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
                    <li><a href="index.php?<?php echo $pagination_prefix; ?>start=0#navigation_bar"><span
                                class="glyphicon glyphicon-fast-backward"></span></a></li>
                    <li>
                        <a href="<?php if ($currentPage > 1) echo "index.php?" . $pagination_prefix . "start=" . ($currentPage - 1) * $_SESSION[$pagination_prefix . "limit"]; ?>"><span
                                class="glyphicon glyphicon-step-backward"></span></a></li>
                    <?php echo $pagination; ?>
                    <li>
                        <a href="<?php if ($currentPage < ($paginationPages - 1)) echo "index.php?" . $pagination_prefix . "start=" . ($currentPage + 1) * $_SESSION[$pagination_prefix . "limit"]; ?>#navigation_bar"><span
                                class="glyphicon glyphicon-step-forward"></span></a></li>
                    <li>
                        <a href="index.php?<?php echo $pagination_prefix; ?>start=<?php echo ($paginationPages - 1) * $_SESSION[$pagination_prefix . "limit"] ?>#navigation_bar"><span
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

<!-- bootbox code -->
<script src="../js/bootbox.min.js"></script>

<!-- bootstrap tagsinput -->
<script src="../js/bootstrap-tagsinput.min.js"></script>





<script>


    $(function () {

            $("#editform").submit(function (event) {
                event.preventDefault();
                bootbox.confirm("Sei sicuro di voler <?php if($_SESSION["action"]=="insert") echo "inserire"; if($_SESSION["action"]=="update") echo "modificare";?> l'offerta?", function (result) {
                    if (result) {
                        $('#editform').unbind('submit').submit();
                    }
                });
            });


        }
    );

	
</script>



</body>

</html>
