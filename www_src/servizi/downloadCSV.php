<?php
include("CreateCSV.class.php");
$conn = mysql_connect("localhost", "root", ""); //da completare con con connessione DB

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
