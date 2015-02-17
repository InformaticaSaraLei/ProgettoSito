<?php

include_once '../settings.php';
$servername = SETTINGS_DBHOST; /* da completare con i dati corretti del db */
$username = SETTINGS_USERNAME;
$password = SETTINGS_PASSWORD;
$dbname = SETTINGS_DATABASE;
$emailNE = $_POST["formEmail2"];        /* il form dovrà avere il campo dove l'utente inserisce l'email con name="FormEmail" */

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = mysqli_real_escape_string($conn, $emailNE);
if (!$email) {
    die("impossibile eseguire il parsing della stringa: " . $conn->connect_error);
}
// la query di delete ti restituisce TRUE anche se cancella 0 righe; quindi gestisco 
// la presenza della mail da cancellare..
$sqls = "SELECT COUNT(*) as trovato FROM newsletterusers WHERE email= ('$email')";
$sqld = "DELETE FROM newsletterusers WHERE email= ('$email')";
$trovato = false;
if (($ris = $conn->query($sqls))) {
    $o = $ris->fetch_object();
    if ($o->trovato)
        $trovato = true;
}
if (!$trovato) {
    header("refresh:5;url=newsletter.html");
    echo "Utente non presente in archivio! Tra 5 secondi verrai reindirizzato alla pagina precedente!";
} else {
    if ($conn->query($sqld) === TRUE) {
        header("refresh:5;url=newsletter.html");
        echo "Utente cancellato con successo! Tra 5 secondi verrai reindirizzato alla pagina precedente!";
    } else {
        header("refresh:5;url=newsletter.html");
        echo "errore: controlla di avere inserito correttamente la mail da rimuovere, o di non esserti già cancellato!";
//echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?> 
