<?php
include_once '../settings.php';
$servername = SETTINGS_DBHOST; /*da completare con i dati corretti del db*/
$username = SETTINGS_USERNAME;
$password = SETTINGS_PASSWORD;
$dbname = SETTINGS_DATABASE;
$emailNE = $_POST["formEmail2"];        /*il form dovrà avere il campo dove l'utente inserisce l'email con name="FormEmail"*/
$email= mysql_real_escape_string($emailNE);

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "DELETE FROM newsletterusers WHERE email= ('$email')";
if ($conn->query($sql) === TRUE) {
  header( "refresh:5;url=newsletter.html" );
  echo "Utente cancellato con successo!";
} else {
  header( "refresh:5;url=newsletter.html" );
  echo "errore: controlla di avere inserito correttamente la mail da rimuovere, o di non esserti già cancellato!";
//echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?> 
