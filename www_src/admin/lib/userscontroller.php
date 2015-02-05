<?php

include_once("database.php");
include_once("functions.php");

class UsersController
{

    private $database;

    // Funzione che verifica il login di un utente
    public function LoginUser()
    {
        if (IsEmptyLogin()) {
            header("Location: error.php?error=3");
            die();
        } else {
            $database = new Database();
            $database->connect();
            $username = $_POST['username'];
            $password = sha1($_POST['password']);

            $count = $database->QueryCountResults("SELECT ID FROM utenti WHERE USERNAME='$username' AND PASSWORD='$password'");
            if ($count != 0) {
                // prendo l'id utente dal database e avvio una SESSIONE
                $query = $database->QuerySingleResults("SELECT ID FROM utenti WHERE USERNAME='$username' AND PASSWORD='$password'");
                $this->SetSession($query);
                header("Location: profile.php");
                die();
            } else {
                header("Location: error.php?error=4");
                die();
            }
            $database->disconnect();
        }
    }

    // Funzione che registra un nuovo utente
    public function AddUser()
    {
        if (IsEmptyRegister()) {
            header("Location: error.php?error=1");
            die();
        } elseif (!(VerifyPassword())) {
            header("Location: error.php?error=2");
            die();
        } else {
            $this->RegisterUser();
        }
    }

    private function RegisterUser()
    {
        $database = new Database();
        $password = sha1($_POST['pass1']);
        foreach (array("name", "surname", "email", "username") as $campoForm) {
            $$campoForm = mysql_escape_string($_POST[$campoForm]);
        }
        $database->connect();
        $query = $database->Query("INSERT INTO utenti (NOME, COGNOME, EMAIL, USERNAME, PASSWORD) " .
            "VALUES ('$name','$surname','$email',$username','$password')");
        $database->disconnect();
    }

    // Funzione che serve per modificare un profilo utente
    public function EditProfile($id)
    {
        if (!IsEmptyEdit()) {
            $database = new Database();
            $database->connect();
            // Le due query possibili modificano i campi utenti nel database, una però non modifica la password
            if (IsEditPassword()) {
                $password = sha1($_POST['pass1']);
                $query = $database->Query("UPDATE utenti SET NOME='" . mysql_escape_string($_POST[name]) .
                    "', COGNOME='" . mysql_escape_string($_POST[surname]) .
                    "', EMAIL='" . mysql_escape_string($_POST[email]) .
                    "', USERNAME='" . mysql_escape_string($_POST[username]) . "', PASSWORD='$password' WHERE ID='$id'");

            } else if (empty($_POST['pass1']) && empty($_POST['pass1'])) {
                $query = $database->Query("UPDATE utenti SET NOME='$_POST[name]', COGNOME='$_POST[surname]', EMAIL='$_POST[email]', USERNAME='$_POST[username]' WHERE ID='$id'");
            } else {
                header("Location: error.php?error=9");
                die();
            }
            $database->disconnect();
        } else {
        }
    }


    // Funzione che avvia la sessione di un utente
    private function SetSession($id)
    {
        session_start();
        $_SESSION['login'] = $id;
    }

    // Funzione che ritorna il nome dell'utente
    public function GetName($id)
    {
        $database = new Database();
        $database->connect();
        // Query che preleva il nome in base all'id
        $query = $database->QuerySingleResults("SELECT NOME FROM utenti WHERE ID='$id'");
        $database->disconnect();
        return $query;
    }

    // Funzione che ritorna il cognome dell'utente
    public function GetSurname($id)
    {
        $database = new Database();
        $database->connect();
        // Query che preleva il cognome in base all'id
        $query = $database->QuerySingleResults("SELECT COGNOME FROM utenti WHERE ID='$id'");
        $database->disconnect();
        return $query;
    }

    // Funzione che ritorna l'indirizzo dell'utente in base all'id
    public function GetEmail($id)
    {
        $database = new Database();
        $database->connect();
        // Query che preleva l'idirizzo in base all'id
        $query = $database->QuerySingleResults("SELECT EMAIL FROM utenti WHERE ID='$id'");
        $database->disconnect();
        return $query;
    }

    // Funzione che ritorna l'username dell'utente utente in base all'id
    public function GetUsername($id)
    {
        $database = new Database();
        $database->connect();
        // Query che preleva l'username in base all'id
        $query = $database->QuerySingleResults("SELECT USERNAME FROM utenti WHERE ID='$id'");
        $database->disconnect();
        return $query;
    }

    // Funzione che verifica i permessi dell'utente, cioè¨ se è¨ un admin o utente normale
    public function IsAdmin($id)
    {
        if (is_numeric($id)) {
            $database = new Database();
            $database->connect();
            // Query che controlla il campo IsAdmin in base all'id
            $query = $database->QuerySingleResults("SELECT ISADMIN FROM utenti WHERE ID='$id'");
            $database->disconnect();
            if ($query) return TRUE;
            else return FALSE;
        }
    }

    // Funzione per effettuare il logout
    public function Logout()
    {
        session_start();
        if (isset($_SESSION['login'])) {
            session_unset();
            session_destroy();
            header('location: ../index.html');
            exit();
        } else {
            header('location: error.php?error=7');
            exit();
        }
    }


}
