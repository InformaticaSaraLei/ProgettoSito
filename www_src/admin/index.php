<?php
//pagina di aiuto per far puntare il browser o al login oppure alla pagina amministrativa
//a seconda dello stato di autenticazione
session_start();
if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");

} else {
    header("Location: login.php");
}
?>