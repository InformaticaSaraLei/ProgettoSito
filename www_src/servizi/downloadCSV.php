<?php
include_once '../settings.php';
include("CreateCSV.class.php");
$conn = mysql_connect(SETTINGS_DBHOST, SETTINGS_USERNAME, SETTINGS_PASSWORD); //da completare con con connessione DB
mysql_select_db(SETTINGS_DATABASE);
$sql = "SELECT email FROM newsletterusers";

//To print out the record without column heading and all values are quoted
print CreateCSV::create($sql);

/*
//To print out the record without column heading and all values are NOT quoted
print CreateCSV::create($sql, false, false);

//To print out the record with column heading and all values are quoted
print CreateCSV::create($sql, true);

//To print out the record with column heading and all values are NOT quoted
print CreateCSV::create($sql, true, false); */

?>
