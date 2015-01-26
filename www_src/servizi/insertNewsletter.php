<?php
include_once '../settings.php';
$servername = SETTINGS_DBHOST;        /*da completare con i dati corretti del db*/
$username = SETTINGS_USERNAME;
$password = SETTINGS_PASSWORD;
$dbname = SETTINGS_DATABASE;
$email = $_GET["formEmail"];        /*il form dovrà avere il campo dove l'utente inserisce l'email con name="FormEmail"*/

/*connessione al db, da sistemare*/

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO newsletterusers (email) VALUES ('$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 
