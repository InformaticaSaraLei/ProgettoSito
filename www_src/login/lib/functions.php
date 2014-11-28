<?php

// Funzione che controlla se i campi del form di registrazione sono vuo$
function IsEmptyRegister() {
        if (empty($_POST['name']) OR empty($_POST['surname']) OR empty($_POST['email']) OR empty($_POST['username']) OR empty($_POST['pass1']) OR empty($_POST['pass2'])) {
                return TRUE;
        } else return FALSE;
}

// Funzione che controlla se i campi del form modifica profilo sono tutti compilati correttamente
function IsEmptyEdit() {
        if (empty($_POST['name']) OR empty($_POST['surname']) OR empty($_POST['email']) OR empty($_POST['username'])) {
                return TRUE;
        } else return FALSE;
}

function IsEditPassword() {
        if(empty($_POST['pass1']) AND empty($_POST['$pass2'])) {
                return FALSE;
        } else if (VerifyPassword()) {
                return TRUE;
        }
}

// Funzione che controlla se i campi del form di login sono vuoti o com$
function IsEmptyLogin() {
        if (empty($_POST['username']) OR empty($_POST['password'])) {
                return TRUE;
        } else return FALSE;
}


// Verifica l'immisione delle due pasword
function VerifyPassword()
{
        if($_POST['pass1'] == $_POST['pass2']) {
                return TRUE;
        } else return FALSE;
}

?>
