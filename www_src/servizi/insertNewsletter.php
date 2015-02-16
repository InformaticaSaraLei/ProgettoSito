<?php
include_once '../settings.php';
$servername = SETTINGS_DBHOST;        /*da completare con i dati corretti del db*/
$username = SETTINGS_USERNAME;
$password = SETTINGS_PASSWORD;
$dbname = SETTINGS_DATABASE;
$emailNE = $_POST["formEmail"];        /*il form dovrà avere il campo dove l'utente inserisce l'email con name="FormEmail"*/
$email= mysql_real_escape_string($emailNE);

/*connessione al db, da sistemare*/

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO newsletterusers (email) VALUES ('$email')";

if ($conn->query($sql) === TRUE) {
  header( "refresh:5;url=newsletter.html" );
  echo "Iscrizione effettuata con successo! Tra 5 secondi verrai reindirizzato alla pagina precedente!";
} else {
  header( "refresh:5;url=newsletter.html" );
  echo "errore: controlla di avere inserito correttamente la tua mail, o di non esserti già iscritto!";
//echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?> 
