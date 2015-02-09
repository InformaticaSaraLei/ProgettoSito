<?php
//pagina di aiuto per far puntare il browsere o al login oppure alla pagina amministrativa
//a seconda dello stato di autenticazione
session_start();
if (isset($_SESSION['login'])) {
    header("Location: profile.php");

} else {
    header("Location: login.php");
}
?>